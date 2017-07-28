<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','videocontroller@index');/*, function () {
    return view('welcome');
});*/
Route::get('/lista','videocontroller@lista');
Route::post('/subir','videocontroller@subir2');
Route::get('/visto/{id}','videocontroller@visto');
Route::get('/listacc/{id}','videocontroller@listacomentario');
Route::post('/comentario/{id}','videocontroller@addcomentario');

Route::auth();
Route::get('/video','videocontroller@index');
Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');