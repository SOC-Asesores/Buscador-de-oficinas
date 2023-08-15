<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\micrositiosController;

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

Route::get('/ubica_asesor',[micrositiosController::class, 'ubica_asesor']);
Route::get('/',[micrositiosController::class, 'ubica_oficina']);

// clear application cache
Route::get('/clear-app-cache', function () {
    Artisan::call('cache:clear');
    return 'Application cache has clear successfully!';
});

Route::post('/micrositios/all','App\Http\Controllers\micrositiosController@getAll')->name('getAllMicrositios');
Route::post('/micrositios/search','App\Http\Controllers\micrositiosController@search')->name('searchMicrositios');
Route::post('/asesores/all','App\Http\Controllers\micrositiosAsesoresController@getAll')->name('getAllAsesores');
Route::post('/asesores/search','App\Http\Controllers\micrositiosAsesoresController@searchAsesores')->name('searchAsesores');
Route::get('/estado-de-mexico/tultepec/worldwide-financial-b', function () {
    return redirect('/estado-de-mexico/tultepec/worldwide-financial-b&c');
});
Route::get('/{estado}/{ciudad}/{oficina}','App\Http\Controllers\micrositiosController@oficina');
Route::post('/sendmail','App\Http\Controllers\micrositiosController@sendMail')->name('sendMail');
Route::post('/sendmail2','App\Http\Controllers\micrositiosController@sendMail2')->name('sendMail2');
Route::get('/lista_oficinas','App\Http\Controllers\micrositiosController@lista_oficinas')->name('lista_oficinas');
Route::post('/search','App\Http\Controllers\micrositiosController@searchAll')->name('searchAll');