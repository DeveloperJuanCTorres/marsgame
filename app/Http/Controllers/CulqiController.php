<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Http\Controllers\Requests;
use Culqi\Culqi;
// use Requests as GlobalRequests;

// require 'vendor/autoload.php';
require __DIR__.'/../../../vendor/autoload.php';
// require __DIR__.'\../../vendor/autoload.php';
// require __DIR__ . '/vendor/autoload.php';
// require_once "vendor/autoload.php";
// include_once dirname(__FILE__).'/Requests/library/Requests.php';
//         include_once dirname(__FILE__).'/culqi-php/lib/culqi.php';  
//  Requests::register_autoloader();
class CulqiController extends Controller
{   
    public function index()
    {
        // Requests::register_autoloader();
    }

    public function store(Request $request)
    {      
        
        // Requests::register_autoloader(); 

        // Configurar tu API Key y autenticación
        $SECRET_KEY = "sk_test_70af522ab336bbda";
        $culqi = new Culqi(array('api_key' => $SECRET_KEY));
        // $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

        $charge = $culqi->Charges->create(
            array(
              "amount" => 1000,
              "capture" => true,
              "currency_code" => "PEN",
              "description" => "Venta de prueba",
              "email" => $request->email,
              "source_id" => $request->token
            )
        );
        
        echo "exitoso";
        //Respuesta
        // print_r($charge);

        // return response()->json(['status' => true, 'msg' => 'Éxito']); 
    }
    
}