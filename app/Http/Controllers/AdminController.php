<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SorteoSimple;
use App\Models\SorteoSmash;
use App\Models\Code;
use App\Models\Ticket;
use App\Models\Pay;
use App\Models\Suscription;
use App\Models\Suscriptions;
use App\Models\Notification;
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

    

    public function perfil(){
        $smash = SorteoSmash::where('user_id',Auth::user()->id)->count();
        $notificaciones = Notification::where('user_id_original',Auth::user()->id)->where('estado',0)->get();
        $noticount = $notificaciones->count();
        $cuenta = Account::where('user_id',Auth::user()->id)->first();
        if ($cuenta == null) {
            $saldo = 0.00;
        }
        else{
            $saldo = $cuenta->saldo;
        }
        
        return view('profile',compact('smash','notificaciones','noticount','saldo'));
    }

    public function codigos()
    {
        $codigos = Code::where('user_id',Auth::user()->id)->where('estado',0)->get();
        $notificaciones = Notification::where('user_id_original',Auth::user()->id)->where('estado',0)->get();
        $noticount = $notificaciones->count();
        $cuenta = Account::where('user_id',Auth::user()->id)->first();
        if ($cuenta == null) {
            $saldo = 0.00;
        }
        else{
            $saldo = $cuenta->saldo;
        }
        return view('codigos',compact('codigos','notificaciones','noticount','saldo'));
    }

    public function thanks()
    {
        Cart::clear();
        $notificaciones = Notification::where('user_id_original',Auth::user()->id)->where('estado',0)->get();
        $noticount = $notificaciones->count();
        $cuenta = Account::where('user_id',Auth::user()->id)->first();
        if ($cuenta == null) {
            $saldo = 0.00;
        }
        else{
            $saldo = $cuenta->saldo;
        }
        return view('thanks',compact('notificaciones','noticount','saldo'));
    }

    public function checkout()
    {
        $amount = intval(Cart::getTotal() *100);
        $keyOrder = Str::random(9);
        $notificaciones = Notification::where('user_id_original',Auth::user()->id)->where('estado',0)->get();
        $noticount = $notificaciones->count();
        $cuenta = Account::where('user_id',Auth::user()->id)->first();
        if ($cuenta == null) {
            $saldo = 0.00;
        }
        else{
            $saldo = $cuenta->saldo;
        }
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

        if (Cart::getContent()->count() > 0) {
            $response = Http::withHeaders([
                'Authorization' => 'Basic ' . $authorization,
                'Content-Type' => 'application/json'
            ])->post('https://api.micuentaweb.pe/api-payment/V4/Charge/CreatePayment',$store);
            
            $formToken = $response["answer"]["formToken"];
    
            return view('checkout',compact('formToken','notificaciones','noticount','saldo'));
        }
        else
        {
            return view('checkout',compact('notificaciones','noticount','saldo'));
        }
        
        
    }

    public function depositar($monto)
    {
        try {
            $amount = intval($monto *100);
            $keyOrder = Str::random(9);
            $notificaciones = Notification::where('user_id_original',Auth::user()->id)->where('estado',0)->get();
            $noticount = $notificaciones->count();
            $cuenta = Account::where('user_id',Auth::user()->id)->first();
            if ($cuenta == null) {
                $saldo = 0.00;
            }
            else{
                $saldo = $cuenta->saldo;
            }
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
                // dd($formToken);
            return view('depositar',compact('formToken','notificaciones','noticount','monto','saldo'));  
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => $th->getMessage()]);
        }            
        
    }

    public function pasareladeposito(Request $request)
    {

    $user_id = Auth::user()->id;
    $date_now = Carbon::now();
    $limit = 6;
    $answer = json_decode($request->get("kr-answer"));

    if ($answer->orderStatus == "PAID") {      
        try {
            $cuenta = Account::where('user_id',$user_id)->first();
            $pay = Pay::create([
                'user_id' => $user_id,
                'transaction_id' => $answer->shopId,
                'monto' => ($answer->transactions[0]->amount/100),
                'estado' => 'pagado',
                'fecha_pago' => $date_now,
                'tipo_pago' => $answer->transactions[0]->operationType
            ]);

            if ($cuenta == null) {
                Account::create([
                    'user_id' => $user_id,
                    'saldo' => ($answer->transactions[0]->amount/100)
                ]);                
            }
            else{
                $cuenta->saldo += ($answer->transactions[0]->amount/100);
                $cuenta->save();
            }
                        
             return redirect()->route('codigos');  
        } catch (\Throwable $th) {
             return redirect()->route('checkout');
        }      
                        
    }else{
        dd('El pago no procede, comunicate con soporte');
        return abort(404);
    }
    }

    public function aceptarcodigo(Request $request)
    {
        try {
            $notificacion = Notification::where('id',$request->id)->first();
            $fecha_registro = Carbon::now();

            SorteoSmash::create([
                'user_id' => $notificacion->user_id,
                'fecha_registro' => $fecha_registro
            ]);
            SorteoSmash::create([
                'user_id' => $notificacion->user_id_original,
                'fecha_registro' => $fecha_registro
            ]);

            $notificacion->estado = 1;
            $notificacion->save();

            return response()->json(['status' => true, 'msg' => 'Aceptaste el código smash con éxito']);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => $th->getMessage()]);
        }   
    }

    public function rechazarcodigo(Request $request)
    {
        try {
            $notificacion = Notification::where('id',$request->id)->first();
            $codigo = Code::where('id',$notificacion->codigo_id)->first();
            $notificacion->delete();
            $codigo->estado = 0;
            $codigo->save();
            return response()->json(['status' => true, 'msg' => 'Rechazaste el código smash con éxito']); 
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => $th->getMessage()]); 
        }        
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

    public function enviarcodigo(Request $request)
    {
        try {
            $codigo = Code::where('codigo',$request->code)->first();
            
            $user_id = Auth::user()->id;

            if ($codigo) {
                $user_original = $codigo->user_id;
                if ($codigo->user_id == $user_id) {
                    return response()->json(['status' => false, 'msg' => 'No puedes usar un código generado por tí.']);
                }
                else{
                    if ($codigo->estado==1) {
                        return response()->json(['status' => false, 'msg' => 'Éste código ya está en uso, ingrese otro código.']);
                    }
                    elseif($codigo->estado==0){                    
                        Notification::create([
                            'user_id' => $user_id,
                            'codigo_id' => $codigo->id,
                            'estado' => 0,
                            'user_id_original' => $user_original
                        ]);
                        $codigo->estado = 1;
                        $codigo->save();
                        return response()->json(['status' => true, 'msg' => 'Tu solicitud fue enviada con éxito']);
                    } 
                }                               
            }
            else{
                return response()->json(['status' => false, 'msg' => 'No se encontro el código o ya se encuentra vencido']);
            }

        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => $th->getMessage()]);
        }
       
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
                        'product_id' => $item->attributes->productid,
                        'codigo' => $random,
                        'estado' => 0
                     ]);
                 }
                 Cart::clear();
            }
            
             return redirect()->route('codigos');  
        } catch (\Throwable $th) {
             return redirect()->route('checkout');
        }      
                        
    }else{
        dd('El pago no procede, comunicate con soporte');
        return abort(404);
    }
    }
}
