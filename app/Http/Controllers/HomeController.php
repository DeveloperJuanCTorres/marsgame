<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Notification;
use App\Models\Product;
use App\Models\Store;
use App\Models\Term;
use App\Models\Policy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Reclamos;
use App\Mail\Sugerencia;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        if (Auth::user()) {
            $products = Product::all();
            $tickets = Ticket::all();        
            $notificaciones = Notification::where('user_id_original',Auth::user()->id)->where('estado',0)->get();
            $noticount = $notificaciones->count();
            $cuenta = Account::where('user_id',Auth::user()->id)->first();
            if ($cuenta == null) {
                $saldo = 0.00;
            }
            else{
                $saldo = $cuenta->saldo;
            }

            return view('home',compact('products','tickets','notificaciones','noticount','saldo'));
        }
        else
        {
            $products = Product::all();
            $tickets = Ticket::all();
            $notificaciones = null;
            $noticount = 0;
            $saldo = 0.00;
            return view('home',compact('products','tickets','notificaciones','noticount','saldo'));
        }        
        
    }

    public function enviarsugerencia(Request $request)
    {
        try {
            $correo = new Sugerencia($request);
            if (Auth::user()) {
                $user_id = Auth::user()->id;
                $user_name = Auth::user()->name;
                $user_las_name = Auth::user()->last_name;
            }else{
                $user_id = '-';
                $user_name = 'No';
                $user_las_name = 'registrado';
            }
            Mail::to('soporte@marsgame.pe')->send($correo);
            
            return response()->json(['status' => true, 'msg' => 'Tu sugerencia se envió con Éxito']);

        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => $th->getMessage()]);
        }
       
    }

    public function tienda()
    {
        if (Auth::user()) {
            $store = Store::all();
            $notificaciones = Notification::where('user_id_original',Auth::user()->id)->where('estado',0)->get();
            $noticount = $notificaciones->count();
            $cuenta = Account::where('user_id',Auth::user()->id)->first();
            if ($cuenta == null) {
                $saldo = 0.00;
            }
            else{
                $saldo = $cuenta->saldo;
            }

            return view('tienda',compact('notificaciones','noticount','saldo','store'));
        }
        else
        {
            $store = Store::all();
            $notificaciones = null;
            $noticount = 0;
            $saldo = 0.00;

            return view('tienda',compact('notificaciones','noticount','saldo','store'));
        }  
    }

    public function reclamos()
    {     
        if (Auth::user()) {
            $terminos = Term::first();
            $notificaciones = Notification::where('user_id_original',Auth::user()->id)->where('estado',0)->get();
            $noticount = $notificaciones->count();
            $cuenta = Account::where('user_id',Auth::user()->id)->first();
            if ($cuenta == null) {
                $saldo = 0.00;
            }
            else{
                $saldo = $cuenta->saldo;
            }

            return view('reclamos',compact('notificaciones','noticount','saldo'));
        }
        else
        {
            $terminos = Term::first();
            $notificaciones = null;
            $noticount = 0;
            $saldo = 0.00;

            return view('reclamos',compact('notificaciones','noticount','saldo'));
        }  
        
    }

    public function enviar(Request $request)
    {
        
        $correo = new Reclamos($request);
        try {
            Mail::to('soporte@marsgame.pe')->send($correo);
            return "<script>
                    alert('Su pedido fue enviado');
                    window.location.href = '/';
                </script>";
        } catch (\Exception $e) {
            return "<script>
                    alert('Algo salió mal, vuelve a intentarlo');
                    window.location.href = '/reclamos';
                </script>";
        }
        
    }

    public function terminos()
    {
        if (Auth::user()) {
            $terminos = Term::first();
            $notificaciones = Notification::where('user_id_original',Auth::user()->id)->where('estado',0)->get();
            $noticount = $notificaciones->count();
            $cuenta = Account::where('user_id',Auth::user()->id)->first();
            if ($cuenta == null) {
                $saldo = 0.00;
            }
            else{
                $saldo = $cuenta->saldo;
            }

            return view('terminos',compact('terminos','notificaciones','noticount','saldo'));
        }
        else
        {
            $terminos = Term::first();
            $notificaciones = null;
            $noticount = 0;
            $saldo = 0.00;

            return view('terminos',compact('terminos','notificaciones','noticount','saldo'));
        }
        
    }

    public function politicas()
    {
        if (Auth::user()) {
            $politicas = Policy::first();
            $notificaciones = Notification::where('user_id_original',Auth::user()->id)->where('estado',0)->get();
            $noticount = $notificaciones->count();
            $cuenta = Account::where('user_id',Auth::user()->id)->first();
            $saldo = $cuenta->saldo;

            return view('politicas',compact('politicas','notificaciones','noticount','saldo'));
        }
        else
        {
            $politicas = Policy::first();
            $notificaciones = null;
            $noticount = 0;
            $saldo = 0.00;

            return view('politicas',compact('politicas','notificaciones','noticount','saldo'));
        }
    }
}
