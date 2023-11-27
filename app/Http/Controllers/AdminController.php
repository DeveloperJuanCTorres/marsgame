<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SorteoSimple;
use App\Models\SorteoSmash;
use App\Models\Code;
use App\Models\Ticket;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Message;
use Hamcrest\Core\HasToString;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Random;
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

    public function checkout()
    {
        return view('checkout');
    }

    public function participar(Request $request){
        try {
            $user_id = Auth::user()->id;
            $fecha_registro = Carbon::now();
            $limit = 6;
            // $random1 = $user_id . date("mYd") . random_int(10 ** ($limit - 1), (10 ** $limit) - 1);
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
}
