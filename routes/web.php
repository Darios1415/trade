<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\ProductosController;
use  App\Http\Controllers\PaymentController;
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
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');

Route::resource('categorias','App\Http\Controllers\CategoriasController');

Route::resource('productos','App\Http\Controllers\ProductosController');
Route::get ('desactivaproducto/{idpr}',[ProductosController::class,'desactivaproducto'])->name('desactivaproducto');
Route::get ('activarproducto/{idpr}',[ProductosController::class,'activarproducto'])->name('activarproducto');


Route::get('/paypal', [App\Http\Controllers\PaymentController::class, 'payWithpaypal'])->name('paypal');
Route::get('/status', [App\Http\Controllers\PaymentController::class, 'getPaymentStatus'])->name('status');