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

Route::get('/', function () {
    return view('main');
});

Route::get('/reservaciones', function () {
    return view('reservaciones');
});

Route::get('/login', function () {
    if(Session::get('usuario')){
        return view('logout');
    }else{
        return view('login');
    }
});

Route::get('/mesas', function () {
    return view('mesas');
});

Route::get('/referencia', function () {
    return view('referencia');
});

Route::get('/copia', function () {
    return view('copia');
});

Route::get('/inicio', function () {
    return view('main');
});

Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/registrarMesaSilla', 'MesasSillasController@registrarMesaSilla')->name('registrarMesaSilla');
Route::get('/mesas', 'MesasSillasController@getMesasSillas')->name('getMesasSillas');
Route::post('/validarReferencia', 'Controller@validarReferencia')->name('validarReferencia');