<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CulqiController;
use Doctrine\DBAL\Driver\Middleware;
use App\Models\Product;
use App\Models\Ticket;
use App\Models\Departamento;

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

 Route::get('/', function () {
    $products = Product::all();
    $tickets = Ticket::all();
       return view('home',compact('products','tickets'));   
 });

//  Route::get('/register', function () {
//     $departamentos = Departamento::all();
//        return view('auth.passwords.register',compact('departamentos'));   
//  });



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/home',[AdminController::class, 'index'])->name('index');



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/participar', [AdminController::class, 'participar'])->name('participar');

Route::post('/limpiar', [CartController::class, 'clear'])->name('limpiar');
Route::resource('/cart', CartController::class);

Route::get('/terminos',[AdminController::class, 'terminos'])->name('terminos');
Route::get('/politicas',[AdminController::class, 'politicas'])->name('politicas');

// Route::get('/culqi',[CulqiController::class, 'culqi'])->name('culqi');

Auth::routes(['verify' => true]);
Route::middleware(['auth'])->group(function(){
    
    Route::get('/perfil',[AdminController::class, 'perfil'])->name('perfil');
    Route::get('/codigos',[AdminController::class, 'codigos'])->name('codigos');
    Route::get('/checkout',[AdminController::class, 'checkout'])->name('checkout');
});