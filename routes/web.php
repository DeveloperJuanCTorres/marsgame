<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CulqiController;
use App\Http\Controllers\HomeController;
use Doctrine\DBAL\Driver\Middleware;
use App\Models\Product;
use App\Models\Ticket;
use App\Models\Notification;
use App\Models\Departamento;
use TCG\Voyager\Commands\AdminCommand;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//  Route::get('/', function () {
//     $products = Product::all();
//     $tickets = Ticket::all();

//        return view('home',compact('products','tickets'));   
//  });

//  Route::get('/register', function () {
//     $departamentos = Departamento::all();
//        return view('auth.passwords.register',compact('departamentos'));   
//  });



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();    

});

Route::get('/',[HomeController::class, 'index'])->name('index');



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/participar', [AdminController::class, 'participar'])->name('participar');

Route::post('/limpiar', [CartController::class, 'clear'])->name('limpiar');
Route::resource('/cart', CartController::class);

Route::get('/terminos',[HomeController::class, 'terminos'])->name('terminos');
Route::get('/politicas',[HomeController::class, 'politicas'])->name('politicas');

Route::resource('/culqi',CulqiController::class);


Auth::routes(['verify' => true]);
Route::middleware(['auth'])->group(function(){
    Route::post('/aceptarcodigo', [AdminController::class, 'aceptarcodigo'])->name('aceptarcodigo');
    Route::post('/rechazarcodigo', [AdminController::class, 'rechazarcodigo'])->name('rechazarcodigo');
    Route::post('/pasarelapagos', [AdminController::class, 'pasarelapagos'])->name('pasarelapagos');

    Route::get('/depositar/{monto}',[AdminController::class, 'depositar'])->name('depositar');
    Route::post('/pasareladeposito', [AdminController::class, 'pasareladeposito'])->name('pasareladeposito');

    Route::post('/enviarcodigo', [AdminController::class, 'enviarcodigo'])->name('enviarcodigo');
    Route::get('/thanks',[AdminController::class, 'thanks'])->name('thanks');
    Route::get('/perfil',[AdminController::class, 'perfil'])->name('perfil');
    Route::get('/codigos',[AdminController::class, 'codigos'])->name('codigos');
    Route::get('/checkout',[AdminController::class, 'checkout'])->name('checkout');
    Route::post('/pagarsaldo',[AdminController::class, 'pagarsaldo'])->name('chepagarsaldockout');
});