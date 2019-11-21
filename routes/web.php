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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('dd', function () {
    $prices = array('Tires' => 100, 'Oil' => 10, 'Spark Plugs' => 4);
    dd($prices, $prices['Tires']);
});

Route::get('boleto', 'PagSeguroController@index')->name('pagseguro.index');
Route::get('gerar-boleto', 'PagSeguroController@boleto')->name('gerar.boleto');