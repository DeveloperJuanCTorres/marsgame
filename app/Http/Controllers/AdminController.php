<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SorteoSimple;
use App\Models\SorteoSmash;
use App\Models\Code;
use App\Models\Order;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Payment;
use App\Models\Suscription;
use App\Models\Suscriptions;
use App\Models\Notification;
use App\Models\Wallet;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Message;
use Hamcrest\Core\HasToString;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Nette\Utils\Random;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Cart;
use culqi;

class AdminController extends Controller
{
    public function __construct()
     {
         $this->middleware(['auth','verified']);
    }

    

    public function perfil(){
        $smash = SorteoSmash::where('user_id',Auth::user()->id)->count();
        $simple = SorteoSimple::where('user_id',Auth::user()->id)->count();
        $notificaciones = Notification::where('user_id_original',Auth::user()->id)->where('estado',0)->get();
        $movimientos = Payment::where('user_id',Auth::user()->id)->get();
        $noticount = $notificaciones->count();
        $cuenta = Account::where('user_id',Auth::user()->id)->first();
        if ($cuenta == null) {
            $saldo = 0.00;
        }
        else{
            $saldo = $cuenta->saldo;
        }
        
        return view('profile',compact('smash','simple','notificaciones','noticount','saldo','movimientos'));
    }

    public function billeteras()
    {
        if (Auth::user()->id==1) {
            $notificaciones = Notification::where('user_id_original',Auth::user()->id)->where('estado',0)->get();
            $noticount = $notificaciones->count();
            $orders = Wallet::where('estado',0)->get();
            $cuenta = Account::where('user_id',Auth::user()->id)->first();
            if ($cuenta == null) {
                $saldo = 0.00;
            }
            else{
                $saldo = $cuenta->saldo;
            }
            return view('billeteras',compact('orders','notificaciones','noticount','saldo'));
        }
        else
        {
            return redirect()->route('login');  
        }
       
    }

    public function rechazarvaucher(Request $request)
    {
        try {
            $vaucher = Wallet::where("id",$request->id)->first();
            $vaucher->estado = 2;
            $vaucher->save();
            return response()->json(['status' => true, 'msg' => 'El comprobante ha sido aceptado']); 
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => $th->getMessage()]); 
        }        
    }

    public function aceptarvaucher(Request $request)
    {
        $order = json_decode($request->order);
        $date_now = Carbon::now();
        $user_id = $request->userid;
        $vaucher = Wallet::where("id",$request->id)->first();
        $limit = 6;
        try {
            $pay = Payment::create([
                'user_id' => $user_id,
                'transaction_id' => $request->tipo,
                'monto' => $request->monto,
                'estado' => 'pagado',
                'fecha_pago' => $date_now,
                'tipo_pago' => $request->tipo,
                'carrito' => json_encode($order)
            ]);

            foreach ($order as $item)
            {
                if ($item->attributes->imagen==0) {
                    if ($item->attributes->mensual == 0) {  // El tipo NO es suscripcion mensual
                        for ($i=0; $i < $item->quantity; $i++) { 
                            for ($j=0; $j < $item->attributes->cantidadticket; $j++) { 
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
                }
                else
                {
                    Order::create([
                        'user_id' => $user_id,
                        'store_id' => $item->attributes->productid,
                        'cantidad' => $item->quantity,
                        'precio' => $item->price,
                        'total' => $item->quantity*$item->price
                    ]);
                }
                
            }
            $vaucher->estado = 1;
            $vaucher->save();
            return response()->json(['status' => true, 'msg' => 'El comprobante ha sido aceptado']); 
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => $th->getMessage()]); 
        }
        
    }

    public function yape(Request $request)
    {
        try {
            $imagen=$request->file("file"); 
            $extension = $imagen->getClientOriginalExtension();
            $filename  = 'yape-' . str::random(32) . '.' . $extension;
            $paths = Storage::putFileAs('public/yape',$imagen,$filename);
            $ruta = "/yape/".$filename;

            Wallet::create([
                'order' => json_encode(Cart::getContent()),
                'monto' => Cart::getTotal(),
                'vaucher' => $ruta,
                'estado' => 0,
                'type' => 'YAPE',
                'user_id' => Auth::user()->id
            ]);

            Cart::clear();

            return response()->json(['status' => true, 'msg' => 'Tu pago se envió con éxito, dentro de las 24 se validará la conformidad']); 

        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => $th->getMessage()]); 
        }
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

        $authorization = base64_encode('56249706' . ':' . 'prodpassword_3dNR01csdddnAxOiWBlkwdLhd60JiRgsHE14OPEg5LrvF');

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

            $authorization = base64_encode('56249706' . ':' . 'prodpassword_3dNR01csdddnAxOiWBlkwdLhd60JiRgsHE14OPEg5LrvF');

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
            $pay = Payment::create([
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
                        
             return redirect()->route('login');  
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

            if ($notificacion->estado==0) {
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
            }
            else
            {
                return response()->json(['status' => false, 'msg' => 'Este código ya ha sido aceptado anteriormente']);
            }           

            
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
                $pay = Payment::create([
                    'user_id' => $user_id,
                    'transaction_id' => $answer->shopId,
                    'monto' => ($answer->transactions[0]->amount/100),
                    'estado' => 'pagado',
                    'fecha_pago' => $date_now,
                    'tipo_pago' => $answer->transactions[0]->operationType,
                    'carrito' => json_encode(Cart::getContent())
                ]);

                foreach (Cart::getContent() as $item)
                {
                    if ($item->attributes->imagen==0) {
                        if ($item->attributes->mensual == 0) {  // El tipo NO es suscripcion mensual
                            for ($i=0; $i < $item->quantity; $i++) { 
                                for ($j=0; $j < $item->attributes->cantidadticket; $j++) { 
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
                    }
                    else
                    {
                        Order::create([
                            'user_id' => $user_id,
                            'store_id' => $item->attributes->productid,
                            'cantidad' => $item->quantity,
                            'precio' => $item->price,
                            'total' => $item->quantity*$item->price
                        ]);
                    }
                    
                }
                Cart::clear();
            
                return redirect()->route('codigos');  
            } catch (\Throwable $th) {
                return redirect()->route('checkout');
            }      
                        
        }else{
            dd('El pago no procede, comunicate con soporte');
            // return abort(404);
            echo '<script>alert("Sucedió un problema al procesar tu pago, por favor verifica que tienes habilitada la opcion de pagos online de tu tarjeta y/o cuentes con saldo")</script>';
            //response()->json(['status' => false, 'msg' => 'Sucedió un problema al procesar tu pago, por favor verifica que tienes habilitada la opcion de pagos online de tu tarjeta y/o cuentes con saldo']);
        }
    }

    public function pagarsaldo(Request $request)
    {

    $user_id = Auth::user()->id;
    $date_now = Carbon::now();
    $keyOrder = Str::random(9);
    $limit = 6;
    $cuenta = Account::where('user_id',Auth::user()->id)->first();

    if ($cuenta->saldo >= Cart::getTotal()) {      
        try {
            $pay = Payment::create([
                'user_id' => $user_id,
                'transaction_id' => $keyOrder,
                'monto' => Cart::getTotal(),
                'estado' => 'pagado',
                'fecha_pago' => $date_now,
                'tipo_pago' => 'CUENTA SALDO',
                'carrito' => json_encode(Cart::getContent())
            ]);

            $cuenta->saldo -= Cart::getTotal();
            $cuenta->save();

            foreach (Cart::getContent() as $item)
                {
                    if ($item->attributes->imagen==0) {
                        if ($item->attributes->mensual == 0) {  // El tipo NO es suscripcion mensual
                            for ($i=0; $i < $item->quantity; $i++) { 
                                for ($j=0; $j < $item->attributes->cantidadticket; $j++) { 
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
                    }
                    else
                    {
                        Order::create([
                            'user_id' => $user_id,
                            'store_id' => $item->attributes->productid,
                            'cantidad' => $item->quantity,
                            'precio' => $item->price,
                            'total' => $item->quantity*$item->price
                        ]);
                    }
                    
                }

            // foreach (Cart::getContent() as $item)
            // {
            //     if ($item->attributes->mensual == 0) { 
            //         for ($i=0; $i < $item->quantity; $i++) { 
            //             SorteoSimple::create([
            //                 'user_id' => $user_id,
            //                 'fecha_registro' => $date_now
            //             ]);
            //             SorteoSmash::create([
            //                 'user_id' => $user_id,
            //                 'fecha_registro' => $date_now
            //             ]);
            //         }
            //     }
            //     elseif ($item->attributes->mensual == 1) {  
            //         $dias = $item->attributes->cantidadmeses*30+7;
            //         $sumarfecha= Carbon::now()->addDays($dias);
            //         $suscripcion = Suscription::create([
            //             'user_id' => $user_id,
            //             'pay_id' => $pay->id,
            //             'fecha_inicio' => $date_now,
            //             'fecha_fin' => $sumarfecha,
            //             'estado' => 1,
            //             'fecha' => $date_now
            //         ]);
            //     }

            //     $multiplicador = $item->associatedModel*$item->quantity;
            //      for ($i=0; $i < $multiplicador; $i++) { 
            //         $random = $user_id . date("mYd") . random_int(10 ** ($limit - 1), (10 ** $limit) - 1);
            //          Code::create([
            //             'user_id' => $user_id,
            //             'product_id' => $item->attributes->productid,
            //             'codigo' => $random,
            //             'estado' => 0
            //          ]);
            //      }
                 
            // }

            Cart::clear();
            //return redirect()->route('codigos'); 
            return response()->json(['status' => true, 'msg' => 'Su compra se realizó con exito']); 
        } catch (\Throwable $th) {
            //return redirect()->route('checkout');
            return response()->json(['status' => false, 'msg' => $th->getMessage()]);
        }      
                        
        }else{
            return response()->json(['status' => false, 'msg' => 'No cuentas con saldo suficiente para esta transacción']);
        }
    }

    public function avatar(Request $request)
    { 
        $usuario = User::where('id',Auth::user()->id)->first();
        try {    
            $imagen=$request->file("file"); 
            $extension = $imagen->getClientOriginalExtension();
            $filename  = 'avatar-' . str::random(32) . '.' . $extension;
            $paths = Storage::putFileAs('public/avatar',$imagen,$filename);
            $ruta = "/avatar/".$filename;
         
            $usuario->avatar = $ruta;
            $usuario->save();
            return response()->json(['status' => true, 'msg' => 'Se actualizó correctamente tu avatar']); 
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => 'Error:'.$th->getMessage()]);
        }    
    }

    public function culqi(Request $request)
    {
        $SECRET_KEY = "sk_test_475ccb7171e14916";
        $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));
        $charge = $culqi->Charges->create(
            array(
              "amount" => 1000,
              "capture" => true,
              "currency_code" => "PEN",
              "description" => "Venta de prueba",
              "email" => "jctorresdelcastillo@gmail.com",
              "installments" => 0,
              "antifraud_details" => array(
                  "address" => "Av. Lima 123",
                  "address_city" => "LIMA",
                  "country_code" => "PE",
                  "first_name" => "Test_Nombre",
                  "last_name" => "Test_apellido",
                  "phone_number" => "9889678986",
              ),
              "source_id" => $request->token
            )
        );
        return response()->json($charge);        
    }
}
