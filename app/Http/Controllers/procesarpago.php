<?php
// namespace App\Http\Controllers;
// Cargamos Requests y Culqi PHP
include_once dirname(__FILE__).'/Requests/library/Requests.php';
Requests::register_autoloader();
include_once dirname(__FILE__).'/Culqiphp/lib/culqi.php';

// Configurar tu API Key y autenticación
$SECRET_KEY = "sk_test_70af522ab336bbda";
$culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

$charge = $culqi->Charges->create(
    array(
      "amount" => 1000,
      "capture" => true,
      "currency_code" => "PEN",
      "description" => "Venta de prueba",
      "email" => $_POST["email"],
      "source_id" => $_POST["token"]
    )
);

//Respuesta
echo 'exito';
// return response()->json(['status' => true, 'msg' => 'Éxito']); 
// print_r($charge);