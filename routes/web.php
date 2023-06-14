<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::get('register', 'App\Http\Controllers\LoginController@register_form');
Route::post('register', 'App\Http\Controllers\LoginController@do_register');

Route::get('', 'App\Http\Controllers\LoginController@redirect_login');

Route::post('login', 'App\Http\Controllers\LoginController@do_login');
Route::get('login', 'App\Http\Controllers\LoginController@login');
Route::get('logout', 'App\Http\Controllers\LoginController@logout');

Route::get('signup/check/{field}', 'App\Http\Controllers\LoginController@check');

Route::get('home', 'App\Http\Controllers\HomeController@home');

Route::get('visualizza_gallery', 'App\Http\Controllers\GalleryController@gallery');
Route::get('pictures', 'App\Http\Controllers\GalleryController@get_pictures');

Route::get('visualizza_profilo', 'App\Http\Controllers\ProfiloController@profilo');
Route::get('informazioni', 'App\Http\Controllers\ProfiloController@get_informazioni');

Route::get('cortina', 'App\Http\Controllers\CityController@visualizza_cortina');
Route::get('corvara', 'App\Http\Controllers\CityController@visualizza_corvara');
Route::get('moena', 'App\Http\Controllers\CityController@visualizza_moena');

Route::get('prenotazione', 'App\Http\Controllers\PrenotazioneController@form_prenotazione');
Route::get('elimina_prenotazione', 'App\Http\Controllers\PrenotazioneController@elimina_prenotazione');
Route::post('prenotazione', 'App\Http\Controllers\PrenotazioneController@post_prenotazione');

Route::get('visualizza_meteo', 'App\Http\Controllers\HomeController@visualizza_weather');
Route::get('meteo', 'App\Http\Controllers\HomeController@weather');




