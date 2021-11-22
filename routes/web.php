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


Route::GET('/acessar', function () {
    return view('auth.login');
});

Route::GET('/cadastro', function () {
    return view('auth.register');
});


// USUARIO DEVE ESTAR LOGADO
Route::group(['middleware' => 'auth'], function () {

    Route::GET('/', function () {
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
    Route::GET('/caixa', [FinanceiroController::class, 'index']);
    Route::GET('/relatorio', [FinanceiroController::class, 'relatorio']);
    
    //CONFIGURAÇÕES DE PERFIL
    Route::GET('/configuracao-perfil', [ConfiguracaoController::class, 'configuracoesPerfil']);

    //PET
    Route::GET('/pets', [PetDadosController::class, 'index']);
    Route::GET('/cadastro-pet', [PetDadosController::class, 'cadastroPetView']);
    Route::POST('/add-novo-pet', [PetDadosController::class, 'create']);

    // AGENDAMENTO
    Route::GET('/agendamento', [AgendamentoController::class, 'index']);
    Route::get('calendar-event', [CalenderController::class, 'index']);
    Route::post('calendar-crud-ajax', [CalenderController::class, 'calendarEvents']);
});
