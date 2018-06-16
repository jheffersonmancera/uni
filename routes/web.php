<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'ImagenesController@index');


// Auth::routes();

// Route::get('/app', 'HomeController@index')->name('/');
// Route::any('/home', function(){
// 	return view('/');
// });

Route::post('loginn', 'UserController@index');
Route::post('registroo', 'UserController@create');

Route::post('like', 'ImagenesController@like');


// rutas para login con facebook
Route::get('/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');
// FIN rutas para login con facebook


// rutas para subir imagenes y guardarlas
Route::resource('upload', 'ImagenesController')->only([
    'store'
]);
// Route::post('/product', 'UploadController@postProduct');
// FIN rutas para subir imagenes y guardarlas

