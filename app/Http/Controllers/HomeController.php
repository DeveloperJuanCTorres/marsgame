<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Notification;
use App\Models\Product;
use App\Models\Term;
use App\Models\Policy;
use Illuminate\Support\Facades\Auth;

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

            return view('home',compact('products','tickets','notificaciones','noticount'));
        }
        else
        {
            $products = Product::all();
            $tickets = Ticket::all();
            $notificaciones = null;
            $noticount = 0;
            return view('home',compact('products','tickets','notificaciones','noticount'));
        }        
        
    }

    public function terminos()
    {
        if (Auth::user()) {
            $terminos = Term::first();
            $notificaciones = Notification::where('user_id_original',Auth::user()->id)->where('estado',0)->get();
            $noticount = $notificaciones->count();

            return view('terminos',compact('terminos','notificaciones','noticount'));
        }
        else
        {
            $terminos = Term::first();
            $notificaciones = null;
            $noticount = 0;

            return view('terminos',compact('terminos','notificaciones','noticount'));
        }
        
    }

    public function politicas()
    {
        if (Auth::user()) {
            $politicas = Policy::first();
            $notificaciones = Notification::where('user_id_original',Auth::user()->id)->where('estado',0)->get();
            $noticount = $notificaciones->count();

            return view('politicas',compact('politicas','notificaciones','noticount'));
        }
        else
        {
            $politicas = Policy::first();
            $notificaciones = null;
            $noticount = 0;

            return view('politicas',compact('politicas','notificaciones','noticount'));
        }
    }
}
