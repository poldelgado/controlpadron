<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmpadronadoController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/maquetado','maquetado.index')->name('maquetado');
Route::get('/users/get',[UserController::class,'get'])->name('users.get');
Route::post('/users/change_status/{user_id}',[UserController::class,'changeStatus'])->name('users.changeStatus');
Route::resource('/users',UserController::class);
Route::resource('/padron',EmpadronadoController::class);
