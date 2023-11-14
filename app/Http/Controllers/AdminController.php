<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $nav = 'Inicio';
        return view('home',compact('nav'));
    }
}
