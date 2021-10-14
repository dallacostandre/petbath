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

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/clientes', function () {
    return view('lista_clientes');
});

Route::get('/cadastro-cliente', function () {
    return view('cadastro_cliente');
});

Route::get('/servicos', function () {
    return view('lista_servicos');
});
Route::get('/cadastro-servico', function () {
    return view('cadastro_servico');
});
