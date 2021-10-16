<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

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

    // DEVE ESTAR LOGADO
    Route::post('/create-new-client', [ClienteController::class, 'create']);
});
