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

Route::get('/home', function () {
    return view('welcome');
});

Route::get('verify', function () {
    return view('auth.verify');
    // Only verified users may enter...
});

Auth::routes();
Auth::routes(['verify' => true]);

Route::resource('historia', 'HistoriaController')->shallow()->middleware(['auth','isverified']);
Route::resource('perfil', 'PerfilController')->except('show','edit')->middleware(['auth','isverified']);
Route::get('perfil/{user}', 'PerfilController@show')->name('perfil')->middleware(['auth','isverified']);
Route::get('/perfil/{user}/edit', 'PerfilController@edit')->name('editPerfil')->middleware(['auth','isverified']);


Route::resource('imagen', 'ImagenController');

Route::resource('comentario', 'ComentarioController')->middleware(['auth','isverified']);
Route::get('verificationEmail/{api_token?}{user_id?}', 'Auth\VerificationController@verification')->middleware('auth');
Route::post('verificationEmail', 'Auth\VerificationController@resent')->middleware('auth');
Route::get('navigation', 'HistoriaController@index')->name('navigation')->middleware(['auth','isverified']);
