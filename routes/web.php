<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmpadronadoController;
use App\Http\Controllers\ListaController;

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



Auth::routes();
Route::get('/',[EmpadronadoController::class,'index'])->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/maquetado','maquetado.index')->name('maquetado');
Route::get('/users/get',[UserController::class,'get'])->name('users.get');
Route::post('/users/change_status/{user_id}',[UserController::class,'changeStatus'])->name('users.changeStatus')->middleware('auth');
Route::resource('/users',UserController::class)->middleware('auth');
Route::get('/padron/get/{nombre_dni?}',[EmpadronadoController::class,'get'])->name('padron.get')->middleware('auth');
Route::get('/padron/getNumeros',[EmpadronadoController::class,'getNumeros'])->name('padron.getNumeros')->middleware('auth');
Route::post('/padron/llamado/{id}',[EmpadronadoController::class,'setLlamado'])->name('padron.setLlamada')->middleware('auth');
Route::post('/padron/iv/{id}',[EmpadronadoController::class,'setIV'])->name('padron.setIV')->middleware('auth');
Route::resource('/padron',EmpadronadoController::class)->middleware('auth');
Route::resource('/lista',ListaController::class);
