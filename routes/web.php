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

//Route::get('/home', function () {
//    return view('home');
//});
Auth::routes();

Route::resource('historia', 'HistoriaController');
Route::get('/perfil/{user}', 'PerfilController@show')->name('perfil');
Route::get('/perfil/{user}/edit', 'PerfilController@edit')->name('editPerfil');
Route::resource('perfil', 'PerfilController')->except('show','edit');
/*
Route::patch('/perfil/update', 'PerfilController@update')->name('updatePerfil');
*/
Route::get('/navigation', 'HistoriaController@index')->name('navigation');
