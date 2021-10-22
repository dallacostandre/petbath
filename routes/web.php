<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PetDadosController;
use App\Http\Controllers\ServicosController;
use App\Models\Cliente;
use Illuminate\Support\Facades\Route;


/* Route::GET('/', function () {
    return view('auth.login');
}); */

Route::GET('/', function () {
    return view('landing_page');
});


Route::group(['middleware' => 'auth'], function () {

    Route::GET('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // CLIENTE
    Route::GET('/clientes', [ClienteController::class, 'index']);
    Route::GET('/cadastro-cliente', [ClienteController::class, 'cadastroView']);
    Route::ANY('editar-cliente/{id}', [ClienteController::class, 'editarView']);
    Route::ANY('excluir-cliente/{id}', [ClienteController::class, 'destroy']);
    Route::POST('/create-new-client', [ClienteController::class, 'create']);
    Route::POST('/atualizar-cliente', [ClienteController::class, 'update']);
    Route::GET('visualizar-cliente/{id}', [ClienteController::class, 'visualizarCliente']);
    Route::ANY('historico-cliente/{id}', [ClienteController::class,'historicoCliente']);

    // SERVIÇOs
    Route::GET('/servicos', [ServicosController::class, 'index']);
    Route::GET('/cadastro-servico', [ServicosController::class,'cadastroServicoView']);
    Route::POST('/add-novo-servico', [ServicosController::class,'create']);
    
    // HISTÓRICO

    //PET
    Route::GET('/pets', [PetDadosController::class, 'index']);
     Route::GET('/cadastro-pet', [PetDadosController::class, 'cadastroPetView']);
     Route::POST('/add-novo-pet', [PetDadosController::class, 'create']);
});
