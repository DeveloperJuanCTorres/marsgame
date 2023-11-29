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
            Cart::add(array(
                'id' => $request->id?$request->id:'1', // inique row ID
                'name' => $request->name?$request->name:'example',
                'price' =>$request->price?$request->price:20.20,
                'associatedModel' => $request->codigos?$request->codigos:3,
                'quantity' => $request->quantity?$request->quantity:1,
                
                
                'attributes' => array(
                    'mensual' => $request->mensual,
                    'cantidadmeses' => $request->cantidadmeses
                    //  'codigos' => $request->codigos?$request->codigos:3,
                    //  'size' => $request->size?$request->size:0,
                )
            ));
         } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => 'Error']); 
         }        

         

        return response()->json(['status' => true, 'msg' => 'Éxito', 
                'count' => Cart::getContent()->count(),
                'listcart' => view('layouts.offcanvas')]); 
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function clear()
    {
        Cart::clear();
        return back();
    }

    

    
}
