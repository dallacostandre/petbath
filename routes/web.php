<?php

use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ConfiguracaoController;
use App\Http\Controllers\FinanceiroController;
use App\Http\Controllers\LevaTrasController;
use App\Http\Controllers\PetDadosController;
use App\Http\Controllers\ServicosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\PacotesEPromocoesController;


Route::GET('/acessar', function () {
    return view('auth.login');
})->name('acessar');

Route::GET('/cadastro', function () {
    return view('auth.register');
});

// USUARIO DEVE ESTAR LOGADO
Route::group(['middleware' => 'auth'], function () {

    // CLIENTE
    Route::GET('/clientes', [ClienteController::class, 'index']);
    Route::GET('/cadastro-cliente', [ClienteController::class, 'cadastroView']);

    // SERVIÇOS
    Route::GET('/produtos-e-servicos', [ServicosController::class, 'index']);
    
    // PACOTES E PROMOÇÕES    
    Route::get('/pacotes-e-promocoes', [PacotesEPromocoesController::class, 'index']);

    // HISTÓRICO

    // CONFIGURAÇÃO
    Route::GET('/configuracoes', [ConfiguracaoController::class, 'index']);
    Route::GET('/editar-perfil', [ConfiguracaoController::class, 'editarPerfil']);

    //FLUXO DE CAIXA
    

    //PET
    Route::GET('/pets', [PetDadosController::class, 'index']);

    // AGENDAMENTO
    Route::GET('/agendamento', [AgendamentoController::class, 'index']);

    //------------------------ NOVAS ROTAS

    Route::GET('/', function () {return view('dashboard.index');})->name('dashboard');

    Route::GET('/planos-e-assinaturas', [ConfiguracaoController::class, 'planosAssinaturas']);

    Route::GET('/fluxo-de-caixa', [FinanceiroController::class, 'fluxoDeCaixa']);

    Route::GET('/financeiro', [FinanceiroController::class, 'index']);

    

    
});
