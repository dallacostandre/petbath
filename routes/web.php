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
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PacotesEPromocoesController;
use App\Http\Controllers\ProdutoController;
use App\Models\Servicos;

Route::GET('/acessar', function () {
    return view('auth.login');
})->name('acessar');

Route::GET('/cadastro', function () {
    return view('auth.register');
});

// USUARIO DEVE ESTAR LOGADO
Route::group(['middleware' => 'auth'], function () {

    // SERVIÇOS
    Route::GET('/produtos-e-servicos', [DashboardController::class, 'produtosEServicosIndex']);
    Route::GET('/pacotes-e-promocoes', [DashboardController::class, 'pacotesEPromocoes']);
    

    // CONFIGURAÇÃO
    Route::GET('/configuracoes', [ConfiguracaoController::class, 'index']);
    Route::GET('/editar-perfil', [ConfiguracaoController::class, 'editarPerfil']);
    
    //PET
    Route::GET('/pets', [PetDadosController::class, 'index']);

    // AGENDAMENTO
    Route::GET('/agendamento', [AgendamentoController::class, 'index']);

    //------------------------ NOVAS ROTAS

    Route::GET('/', function () {return view('dashboard.index');})->name('dashboard');
    Route::GET('/planos-e-assinaturas', [ConfiguracaoController::class, 'planosAssinaturas']);
    Route::GET('/fluxo-de-caixa', [FinanceiroController::class, 'fluxoDeCaixa']);
    Route::GET('/financeiro', [FinanceiroController::class, 'index']);
    
    //CLIENTE
    Route::GET('/clientes', [ClienteController::class, 'index'])->name('clientes');
    Route::GET('/cadastro-cliente', [ClienteController::class, 'create']);
    Route::POST('/cadastrar-novo-cliente', [ClienteController::class, 'store'])->name('cadastrarNovoCliente');
    Route::GET('/editar-cliente/{id}', [ClienteController::class, 'edit']);
    Route::POST('/update-cliente/{id}', [ClienteController::class, 'update'])->name('updateCliente');
    Route::GET('/excluir-cliente/{id}', [ClienteController::class, 'destroy']);
    Route::GET('/historico-cliente/{id}', [ClienteController::class, 'historicoView']);
    Route::GET('/visualizar-cliente/{id}', [ClienteController::class, 'viewCliente'])->name('viewCliente');
    
    // PRODUTO
    Route::POST('/cadastraProduto', [ProdutoController::class, 'store'])->name('cadastroProduto');
    Route::DELETE('/removerProduto', [ProdutoController::class, 'destroy'])->name('removerProduto');
    
    // SERVICO
    Route::POST('/cadastraServico',[ServicosController::class, 'create'])->name('cadastrarServico');
    Route::DELETE('/removerServico', [ServicosController::class, 'destroy'])->name('removerServico');

    //PACOTES
    Route::GET('/getServicoPreco', [ServicosController::class, 'getServicoPreco'])->name('getServicoPreco');
    Route::POST('/cadastroPacote', []);


});
