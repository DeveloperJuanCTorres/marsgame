<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Departamento;

class AdminController extends Controller
{
    public function __construct()
     {
         $this->middleware(['auth','verified']);
    }

    public function index(){
        $products = Product::all();
        dd($products);
        return view('home',compact('products'));
    }

    public function perfil(){
        return view('profile');
    }

    public function register(){
        $departamentos = Departamento::all();
        return view('auth.passwords.register',compact('departamentos'));
    }
}
