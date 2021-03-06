<?php

use Illuminate\Support\Facades\Route;

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
   return redirect()->route('home');
});

Auth::routes();

Route::get('register',function(){ abort(404); });
Route::post('register',function(){ abort(404); });
Route::get('password/reset',function(){ abort(404); });
Route::post('password/email',function(){ abort(404); });


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){

	Route::resource('/categorias',App\Http\Controllers\CategoriasController::class);
	Route::resource('/articulos', App\Http\Controllers\ArticulosController::class);
	Route::resource('/usuarios',  App\Http\Controllers\UsersController::class);
	Route::resource('/ingresos',  App\Http\Controllers\IngresosController::class);
	
});
