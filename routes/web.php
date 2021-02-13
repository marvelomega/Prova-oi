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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/clientes', 'ClienteController@index')->name('cliente.index');
Route::get('/clientes/novo', 'ClienteController@create')->name('cliente.novo');
Route::post('/clientes/salvar', 'ClienteController@store')->name('cliente.salvar');
Route::get('/clientes/editar/{id}', 'ClienteController@edit')->name('cliente.editar');
Route::patch('/clientes/{id}', 'ClienteController@update')->name('cliente.atualizar');
Route::get('/clientes/{id}', 'ClienteController@show')->name('cliente.mostrar');
Route::delete('/clientes/{id}', 'ClienteController@delete')->name('cliente.excluir');
Route::get('/clientes/ativar/{id}', 'ClienteController@ativar')->name('cliente.ativar');
Route::get('/clientes/desativar/{id}', 'ClienteController@desativar')->name('cliente.desativar');

Route::get('/clientes-ativos', 'ClienteController@ativos')->name('cliente.ativos');
Route::get('/clientes-exportacao-excel', 'ClienteController@exportarExcel')->name('cliente.excel');
Route::get('/clientes-exportacao-pdf', 'ClienteController@exportarPDF')->name('cliente.pdf');
