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
        if (Auth::user()->id==3875) {
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
            return response()->json(['status' => false, 'msg' => $request->id]); 
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

    public function plin(Request $request)
    {
        try {
            $imagen=$request->file("file"); 
            $extension = $imagen->getClientOriginalExtension();
            $filename  = 'plin-' . str::random(32) . '.' . $extension;
            $paths = Storage::putFileAs('public/plin',$imagen,$filename);
            $ruta = "/yape/".$filename;

            Wallet::create([
                'order' => json_encode(Cart::getContent()),
                'monto' => Cart::getTotal(),
                'vaucher' => $ruta,
                'estado' => 0,
                'type' => 'PLIN',
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

    public function enviarsunat(Request $request)
    {        
         try {
             $id = $request->id;
            //  $tipo_nota_value = $request->motivo_id;
            //  $transaction = Transaction::find($id);
            //  $invoice = $transaction->invoice_no;
            //  $invoice_sus = intval(substr($invoice, 6, 3));
            //  $serie = substr($invoice, 0, 4);
            //  $tipo_comprobante = 0;
            //  $tipo_documento_modifica = "";
            //  $serie_modifica = "";
            //  $numero_modifica = "";
            //  $tipo_nota_credito = "";

            //  $products = [];
            //  $total_gravada = 0;
            //  $total_igv = 0;

            //  foreach ($query->sell_lines as $key => $value) {
            //      $product = array(
            //          "unidad_de_medida"=> $value->product->unit->short_name,
            //          "codigo"=> "001",
            //          "codigo_producto_sunat"=> "10000000",
            //          "descripcion"=> $value->product->name,
            //          "cantidad"=> $value->quantity_returned,
            //          "valor_unitario"=> number_format($value->unit_price,10),
            //          "precio_unitario"=> number_format(($value->unit_price*1.18),10),
            //          "descuento"=> "",
            //          "subtotal"=> number_format(($value->unit_price*$value->quantity_returned),2),
            //          "tipo_de_igv"=> 1,
            //          "igv"=> number_format(($value->unit_price*0.18*$value->quantity_returned),2),
            //          "total"=> number_format(($value->unit_price*1.18*$value->quantity_returned),2),
            //          "anticipo_regularizacion"=> false,
            //          "anticipo_documento_serie"=> "",
            //          "anticipo_documento_numero"=> ""
            //      );
            //      array_push($products, $product);
            //      $total_gravada = ($value->unit_price*$value->quantity_returned) + $total_gravada;
            //  }   
            
            //  $total_igv = $total_gravada*0.18;
             $date_now = Carbon::now()->format('d-m-Y');
             $store = array(
                "ublVersion"=> "2.1",
                "tipoOperacion"=> "0101",
                "tipoDoc"=> "03",
                "serie"=> "B001",
                "correlativo"=> "1",
                "fechaEmision"=> $date_now,
                "formaPago"=> array(
                    "moneda"=> "PEN",
                    "tipo"=> "Contado"
                    ),
                "tipoMoneda"=> "PEN",
                "client"=> array(
                    "tipoDoc"=> "1",
                    "numDoc"=> 70539890,
                    "rznSocial"=> "JUAN CARLOS TORRES DEL CASTILLO",
                    "address"=> array(
                    "direccion"=> "JR VARELA 1733",
                    "provincia"=> "LIMA",
                    "departamento"=> "LIMA",
                    "distrito"=> "BREÑA",
                    "ubigueo"=> "150101"
                    )
                ),
                "company"=> array(
                    "ruc"=> 20611806401,
                    "razonSocial"=> "MARS INVESTMENTS S.A.C.",
                    "nombreComercial"=> "MARSGAME",
                    "address"=> array(
                    "direccion"=> "AV. LOS NOGALES NRO. 251 DPTO. 1404 CND. NUEVO NOGALES",
                    "provincia"=> "LIMA",
                    "departamento"=> "LIMA",
                    "distrito"=> "EL AGUSTINO",
                    "ubigueo"=> "150111"
                    )
                ),
                "mtoOperGravadas"=> 12.71,
                "mtoIGV"=> 2.29,
                "valorVenta"=> 15,
                "totalImpuestos"=> 2.29,
                "subTotal"=> 12.71,
                "mtoImpVenta"=> 15,
                "details"=> array([
                      "codProducto"=> "P001",
                      "unidad"=> "NIU",
                      "descripcion"=> "TICKET PREMIUM",
                      "cantidad"=> 1,
                      "mtoValorUnitario"=> 12.71,
                      "mtoValorVenta"=> 12.71,
                      "mtoBaseIgv"=> 12.71,
                      "porcentajeIgv"=> 18,
                      "igv"=> 2.29,
                      "tipAfeIgv"=> 10,
                      "totalImpuestos"=> 2.29,
                      "mtoPrecioUnitario"=> 15
                    ]
                ),
                  "legends"=> array([
                      "code"=> "1000",
                      "value"=> "SON QUINCE CON 00/100 SOLES"
                      ]
                  )
                //  "operacion"=> "generar_comprobante",
                //  "tipo_de_comprobante"=> $tipo_comprobante,
                //  "serie"=> $serie,
                //  "numero"=> $invoice_sus,
                //  "sunat_transaction"=> 1,
                //  "cliente_tipo_de_documento"=> 6,
                //  "cliente_numero_de_documento"=> "20600695771",
                //  "cliente_denominacion"=> "NUBEFACT SA",
                //  "cliente_direccion"=> "CALLE LIBERTAD 116 MIRAFLORES - LIMA - PERU",
                //  "cliente_email"=> "tucliente@gmail.com",
                //  "cliente_email_1"=> "",
                //  "cliente_email_2"=> "",
                //  "fecha_de_emision"=> $date_now,
                //  "fecha_de_vencimiento"=> "",
                //  "moneda"=> 1,
                //  "tipo_de_cambio"=> "",
                //  "porcentaje_de_igv"=> 18.00,
                //  "descuento_global"=> "",
                //  "total_descuento"=> "",
                //  "total_anticipo"=> "",
                //  "total_gravada"=> number_format($total_gravada,2),
                //  "total_inafecta"=> "",
                //  "total_exonerada"=> "",
                //  "total_igv"=> number_format($total_igv,2),
                //  "total_gratuita"=> "",
                //  "total_otros_cargos"=> "",
                //  "total"=> number_format(($total_gravada + $total_igv),2),
                //  "percepcion_tipo"=> "",
                //  "percepcion_base_imponible"=> "",
                //  "total_percepcion"=> "",
                //  "total_incluido_percepcion"=> "",
                //  "retencion_tipo"=> "",
                //  "retencion_base_imponible"=> "",
                //  "total_retencion"=> "",
                //  "total_impuestos_bolsas"=> "",
                //  "detraccion"=> false,
                //  "observaciones"=> "",
                //  "documento_que_se_modifica_tipo"=> $tipo_documento_modifica,
                //  "documento_que_se_modifica_serie"=> $serie_modifica,
                //  "documento_que_se_modifica_numero"=> $numero_modifica,
                //  "tipo_de_nota_de_credito"=> $tipo_nota_credito,
                //  "tipo_de_nota_de_debito"=> "",
                //  "enviar_automaticamente_a_la_sunat"=> true,
                //  "enviar_automaticamente_al_cliente"=> false,
                //  "condiciones_de_pago"=> "",
                //  "medio_de_pago"=> "",
                //  "placa_vehiculo"=> "",
                //  "orden_compra_servicio"=> "",  
                //  "formato_de_pdf"=> "",
                //  "generado_por_contingencia"=> "",
                //  "bienes_region_selva"=> "",
                //  "servicios_region_selva"=> "",
                //  "items" => $products
                
             );
             $resp = json_encode($store);
             $respuesta = Http::withHeaders(
                 ['Authorization' => 'aeyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE3MDM2OTYxNzcsImV4cCI6NDg1NzI5NjE3NywidXNlcm5hbWUiOiJqdWFua3Jsb3N0YyIsImNvbXBhbnkiOiIyMDYxMTgwNjQwMSJ9.QZvW62Mlg16knLCOkYWjXqz5DmqwqgPYm9rvdICp9mORWZt-7TgiZCMWWXlKiM49acHnWsEP-y31XEluRqflVvoMxVuCck0KyBOnyM7DozrizC3djBt6HWieei0jGh1TNDetM9XUo3RoYvZX_1ik6HXX2ER3_dJtyH7jEqMOXbIeTDD7c4cG3znUXMxe7yuQqCwTPLDe_SBRmSnlYMTM4AoV1Uaf_dPz9hPnOElKHmtRHkYNNgFfLazNRd6V3OTzWmAZZokWZbNWJxePH4RHKTax8cAAGWPNIbBstsCzWUXs3m17HHYcNzmfp2agAExHEmlkfwmtJnvhRoulVOYE8HwqLiCSlyD8vgNfKYIJgVPhtXdnVfzCy8L1dHo9H9sUAOF3B6ISA63tPqEl-x0SfcBzpXqyk5ED91Frf_yY_ZG9igwAk7xaPvZfd7-c33wGJjMxBpbJsrLIIeLSptCV5xvAr6iBBimR_Q0_WLaycFC222m2oVEzi7XgZK_guMyOvy57HyQKh8YFbnfSk14mjpaN7PrVUmgDtTvuRnIG20gVD-bRgRvZ2DoV0GvvR2C-hEQPZqTb-haDEoWDlMx4jqa0vTWJUxPigtIqz_tN1KJcRE7k2zn7_6FvhcLz5Oo558S-DtzN7lu0wxzDzvqn_0tRt2grFsuF1p4T34Nq29U'])
             ->post('https://facturacion.apisperu.com/api/v1/invoice/pdf', $resp);   


             if ($respuesta->status()==200) {
                //  $transaction->response_sunat = $respuesta;
                //  $transaction->status_sunat = 1;
                //  $resp = json_decode($respuesta);
                //  $transaction->save();

                return response()->json(['status' => true, 'msg' => $respuesta]);
                // return $respuesta;
             }
             else
             {
                $resp = json_encode($store);
                 return response()->json(['status' => false, 'msg' => $respuesta->status()]);
             }


         } catch (\Throwable $th) {
            
             return response()->json(['status' => false, 'msg' => "Error!!, Try again later"]);
         }
       
    }
}
