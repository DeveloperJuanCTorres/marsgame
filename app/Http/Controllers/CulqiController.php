<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Culqi\Culqi;

// require __DIR__.'/../../../vendor/autoload.php';

class CulqiController extends Controller
{   
    public function index()
    {
    }

    public function store(Request $request)
    {   
        
        // try {
        //     $SECRET_KEY = "sk_test_70af522ab336bbda";
        //     $culqi = new Culqi(array('api_key' => $SECRET_KEY));
        //     $charge = $culqi->Charges->create(
        //         array(
        //           "amount" => 1000,
        //           "capture" => true,
        //           "currency_code" => "PEN",
        //           "description" => "Venta de prueba",
        //           "email" => $request->email,
        //           "source_id" => $request->token
        //         )
        //     );
        // } catch (\Throwable $th) {
        //     return response()->json(['status' => false, 'msg' => $th->getMessage()  ]); 
        // }     

        // return response()->json(['status' => true, 'msg' => 'Éxito']); 
    }
    
}
