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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('mapa','App\Http\Controllers\ControladorMapa@mapa')->name('mapa');

//Acciones del CRUD
Route::post('mapa','App\Http\Controllers\ControladorMapa@nuevoMapa')->name('mapa.nuevoMapa');
Route::get('mapa/{id}','App\Http\Controllers\ControladorMapa@detalleMapa')->name('mapa.detalleMapa');
Route::get('mapa/editar/{id}','App\Http\Controllers\ControladorMapa@editarMapa')->name('mapa.editarMapa');
Route::put('mapa/editar/{id}','App\Http\Controllers\ControladorMapa@actualizarMapa')->name('mapa.actualizarMapa');
Route::delete('mapa/eliminar/{id}','App\Http\Controllers\ControladorMapa@eliminarMapa')->name('mapa.eliminarMapa');



