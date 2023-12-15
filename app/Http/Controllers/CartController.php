<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Console\View\Components\Alert;
use League\CommonMark\Extension\CommonMark\Node\Block\HtmlBlock;
use PhpParser\Node\Stmt\InlineHTML;
use lluminate\Routing\Redirector;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Cart::clear();
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         try {
            $plan = 0;
            foreach (Cart::getContent() as $item) {
                if ($item->attributes->mensual == 1) {
                    $plan = 1;
                }
            }
            if ($request->mensual == 0 || $plan == 0) {
                Cart::add(array(
                    'id' => $request->id?$request->id:'1', // inique row ID
                    'name' => $request->name?$request->name:'example',
                    'price' =>$request->price?$request->price:20.20,
                    'associatedModel' => $request->codigos?$request->codigos:3,
                    'quantity' => $request->quantity?$request->quantity:1,                                
                    'attributes' => array(
                        'mensual' => $request->mensual,
                        'cantidadmeses' => $request->cantidadmeses,
                        'cantidadticket' => $request->cantidadticket,
                        'productid' => $request->productid,
                        'imagen' => $request->imagen?$request->imagen:0
                    )
                ));

                return response()->json(['status' => true, 'msg' => 'Se agregó el artículo a su carrito de compras', 
                'count' => Cart::getContent()->count(),
                'listcart' => view('layouts.offcanvas')]);
            }
            else{
                $plan = 0;
                return response()->json(['status' => false, 'msg' => 'Ya tienes un plan agregado a tu carrito de compras, para agregar otro tipo de plan deberas eliminar el plan anterior de tu carrito.']); 
            }
            
         } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => 'Algo salió mal, por favor intentelo más tarde.']); 
         }       
         
        //return view('home');
        //return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            if ($request->tipo == 'suma') {
                Cart::update($id, array(
                    'quantity' => +1
                  ));
                  return response()->json(['status' => true, 'subtotal' => Cart::getSubTotal(), 'total' => Cart::getTotal()]);
            }
            if ($request->tipo == 'resta') {
                Cart::update($id, array(
                    'quantity' => -1,
                  ));
                  return response()->json(['status' => true, 'subtotal' => Cart::getSubTotal(), 'total' => Cart::getTotal()]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => $th->getMessage()]);
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Cart::remove($id);
            return response()->json(['status' => true, 'subtotal' => Cart::getSubTotal(), 'total' => Cart::getTotal(), 'carcount' => Cart::getContent()->count()]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => $th->getMessage()]);
        }
        
    }

    public function clear()
    {
        Cart::clear();
        return back();
    }

    

    
}
