<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Doctrine\DBAL\Driver\Middleware;
use App\Models\Product;

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
       return view('home',compact('products'));   
 });



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/home',[AdminController::class, 'index'])->name('index');


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes(['verify' => true]);
Route::middleware(['auth'])->group(function(){
    
    Route::get('/perfil',[AdminController::class, 'perfil'])->name('perfil');
});