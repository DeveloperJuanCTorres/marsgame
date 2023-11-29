<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SorteoSimple;
use App\Models\SorteoSmash;
use App\Models\Code;
use App\Models\Term;
use App\Models\Policy;
use App\Models\Ticket;
use App\Models\Pay;
use App\Models\Suscription;
use App\Models\Suscriptions;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Message;
use Hamcrest\Core\HasToString;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Nette\Utils\Random;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Cart;

class AdminController extends Controller
{
    public function __construct()
     {
         $this->middleware(['auth','verified']);
    }

    public function index(){
        $products = Product::all();
        $tickets = Ticket::all();
        return view('home',compact('products','tickets'));
    }

    public function perfil(){
        $smash = SorteoSmash::where('user_id',Auth::user()->id)->count();
        return view('profile',compact('smash'));
    }

    public function codigos()
    {
        $codigos = Code::where('user_id',Auth::user()->id)->get();
        return view('codigos',compact('codigos'));
    }

    public function thanks()
    {
        return view('thanks');
    }

    public function checkout()
    {
        $amount = intval(Cart::getTotal() *100);
        $keyOrder = Str::random(9);
        $store = array(
            "amount"=>  $amount,
            "currency"=> "PEN",
            "transactionId"=>  "myOrderId-".$keyOrder,
            "orderId"=> $keyOrder,
            "customer"=> array(
                "email"=> Auth::user()->email,
            )
        );

        $authorization = base64_encode('56249706' . ':' . 'testpassword_PQo7foKLFDEin3YPNDeP8e8A7AhF7pYCjB64O3KRYvn02');
       
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . $authorization,
            'Content-Type' => 'application/json'
        ])->post('https://api.micuentaweb.pe/api-payment/V4/Charge/CreatePayment',$store);
        $formToken = $response["answer"]["formToken"];



        return view('checkout',compact('formToken'));
    }

    public function participar(Request $request){
        try {
            $user_id = Auth::user()->id;
            $fecha_registro = Carbon::now();
            $limit = 6;
            foreach (Cart::getContent() as $item) {
                for ($i=0; $i < $item->quantity; $i++) { 
                    SorteoSimple::create([
                        'user_id' => $user_id,
                        'fecha_registro' => $fecha_registro
                    ]);
                    SorteoSmash::create([
                        'user_id' => $user_id,
                        'fecha_registro' => $fecha_registro
                    ]);
                }
                
            }
            
            foreach (Cart::getContent() as $item) {
                $multiplicador = $item->associatedModel*$item->quantity;
                 for ($i=0; $i < $multiplicador; $i++) { 
                     $random = $user_id . date("mYd") . random_int(10 ** ($limit - 1), (10 ** $limit) - 1);
                     Code::create([
                        'user_id' => $user_id,
                        'product_id' => $item->id,
                        'codigo' => $random,
                        'estado' => 0,
                     ]);
                 }
             }
            
             Cart::clear();
            return response()->json(['status' => true, 'msg' => 'Éxito']); 
            

        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => 'Error:'.$th->getMessage()]);
        }
    }

    public function clear()
    {
        Cart::clear();
        return back();
    }

    public function terminos()
    {
       $terminos = Term::first();

       return view('terminos',compact('terminos'));
    }

    public function politicas()
    {
       $politicas = Policy::first();

       return view('politicas',compact('politicas'));
    }

    public function pasarelapagos(Request $request)
    {

    $user_id = Auth::user()->id;
    $date_now = Carbon::now();
    $limit = 6;
    $answer = json_decode($request->get("kr-answer"));

    if ($answer->orderStatus == "PAID") {      
        try {
            $pay = Pay::create([
                'user_id' => $user_id,
                'transaction_id' => $answer->shopId,
                'monto' => ($answer->transactions[0]->amount/100),
                'estado' => 'pagado',
                'fecha_pago' => $date_now,
                'tipo_pago' => $answer->transactions[0]->operationType
            ]);

            foreach (Cart::getContent() as $item)
            {
                if ($item->attributes->mensual == 0) {  // El tipo NO es suscripcion mensual
                    for ($i=0; $i < $item->quantity; $i++) { 
                        SorteoSimple::create([
                            'user_id' => $user_id,
                            'fecha_registro' => $date_now
                        ]);
                        SorteoSmash::create([
                            'user_id' => $user_id,
                            'fecha_registro' => $date_now
                        ]);
                    }
                }
                elseif ($item->attributes->mensual == 1) {  // El tipo SI es suscripcion mensual
                    $dias = $item->attributes->cantidadmeses*30;
                    $sumarfecha= Carbon::now()->addDays($dias);
                    $suscripcion = Suscription::create([
                        'user_id' => $user_id,
                        'pay_id' => $pay->id,
                        'fecha_inicio' => $date_now,
                        'fecha_fin' => $sumarfecha,
                        // 'fecha_fin' => strtotime('+'.$dias.'day',strtotime($date_now)),
                        'estado' => 1,
                        'fecha' => $date_now
                    ]);
                }

                $multiplicador = $item->associatedModel*$item->quantity;
                 for ($i=0; $i < $multiplicador; $i++) { 
                     $random = $user_id . date("mYd") . random_int(10 ** ($limit - 1), (10 ** $limit) - 1);
                     Code::create([
                        'user_id' => $user_id,
                        'product_id' => $item->id,
                        'codigo' => $random,
                        'estado' => 0,
                     ]);
                 }
            }

            
             return redirect()->route('thanks');  
        } catch (\Throwable $th) {
             return redirect()->route('perfil');
        }      
                        
    }else{
        dd('El pago no procede, comunicate con soporte');
        return abort(404);
    }
    }
}
