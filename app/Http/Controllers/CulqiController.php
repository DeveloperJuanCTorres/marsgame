<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

include_once dirname(__FILE__).'/Requests/library/Requests.php';
Requests::register_autoloader();
include_once dirname(__FILE__).'/culqiphp/lib/culqi.php';

use App\Http\Controllers\Requests\library\Requests;
use App\Http\Controllers\Culqiphp\lib\culqi;


// Cargamos Requests y Culqi PHP





class CulqiController extends Controller
{
    
    public function culqi(Request $request)
    {
       
        // Configurar tu API Key y autenticación
        $SECRET_KEY = "sk_test_70af522ab336bbda";
        $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

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
        
        //Respuesta
        print_r($charge);

        return response()->json(['status' => true, 'msg' => 'Éxito']); 
    }
    
}
