<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ConfiguracaoController;
use App\Http\Controllers\FinanceiroController;
use App\Http\Controllers\LevaTrasController;
use App\Http\Controllers\PetDadosController;
use App\Http\Controllers\ServicosController;
use Illuminate\Support\Facades\Route;


Route::GET('/acessar', function () {
    return view('auth.login');
});

Route::GET('/cadastro', function () {
    return view('auth.register');
});


Route::GET('/', function () {
    return view('landing_page');
});


// USUARIO DEVE ESTAR LOGADO
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
    Route::ANY('historico-cliente/{id}', [ClienteController::class, 'historicoCliente']);

    // SERVIÇOs
    Route::GET('/servicos-e-produtos', [ServicosController::class, 'index']);
    Route::GET('/cadastro-servico', [ServicosController::class, 'cadastroServicoView']);
    Route::POST('/add-novo-servico', [ServicosController::class, 'create']);
    
    // HISTÓRICO
    
    // CONFIGURAÇÃO
    Route::GET('/configuracoes', [ConfiguracaoController::class, 'index']);
    
    // LEVA & TRAS
    Route::GET('/leva-e-tras', [LevaTrasController::class, 'index']);
    
    //FLUXO DE CAIXA
    Route::GET('/fluxo-de-caixa', [FinanceiroController::class, 'index']);


    //PET
    Route::GET('/pets', [PetDadosController::class, 'index']);
    Route::GET('/cadastro-pet', [PetDadosController::class, 'cadastroPetView']);
    Route::POST('/add-novo-pet', [PetDadosController::class, 'create']);
});
