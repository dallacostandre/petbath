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
use App\Http\Controllers\NotificacoesController;
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

    
    // DASHBOARD
    Route::GET('/configuracoes', [ConfiguracaoController::class, 'index']);
    Route::GET('/editar-perfil', [ConfiguracaoController::class, 'editarPerfil']);
    Route::GET('/agendamento', [AgendamentoController::class, 'index']);
    Route::GET('/', function () {return view('dashboard.index');})->name('dashboard');
    Route::GET('/planos-e-assinaturas', [ConfiguracaoController::class, 'planosAssinaturas']);
    Route::GET('/fluxo-de-caixa', [FinanceiroController::class, 'fluxoDeCaixa']);
    Route::GET('/financeiro', [FinanceiroController::class, 'index']);

    // CLIENTE (Lista todos os clientes do usuário)
    Route::GET('/clientes', [ClienteController::class, 'index'])->name('clientes');
    // CLIENTE(Tela de cadastro do cliente)
    Route::GET('/dados-cliente', [ClienteController::class, 'create'])->name('cadastroCliente');
    // CLIENTE(Tela de edição do cliente)
    Route::GET('/dados-cliente/{id}', [ClienteController::class, 'edit'])->name('editarDadosCliente');
    // CLIENTE(Cadastra os dados do cliente)
    Route::POST('/cadastrar-novo-cliente', [ClienteController::class, 'store'])->name('cadastrarNovoCliente');
    // CLIENTE(Atualiza os dados do cliente)
    Route::POST('/atualizar-cliente', [ClienteController::class, 'update'])->name('updateCliente');
   // CLIENTE(Exclui os dados do cliente)
    Route::POST('/excluir-cliente', [ClienteController::class, 'destroy']);
    // CLIENTE (Histórico do Cliente)
    Route::GET('/historico/{id}', [ClienteController::class, 'history'])->name('historico');

    // PET (Cadastra os dados do pet)
    Route::POST('/cadastrar-novo-pet', [PetDadosController::class, 'store'])->name('cadastrarNovoPet');
    // PET (Exclui os dados do pet)
    Route::DELETE('/excluir-pet', [PetDadosController::class, 'destroy'])->name('excluirPet');
    // PET (Lista os pets do Cliente)
    Route::GET('/pets/{uniqueIdCliente}', [PetDadosController::class, 'index'])->name('listaPets');
    // PET (Busca os dados do pet e recebe no modal)
    Route::POST('/visualizar-dados-pet', [PetDadosController::class, 'show'])->name('visualizarPet');
    // PET (Atualiza os dados do pet)
    Route::POST('/atualizar-pet', [PetDadosController::class, 'update'])->name('atualizarPet');

    // NOTIFICAÇÕES
    Route::POST('/cadastrar-notificacao', [NotificacoesController::class, 'store'])->name('adicionar.notificacao');
    Route::DELETE('/excluir-notificacao', [NotificacoesController::class, 'destroy'])->name('remover.notificacao');

    // PRODUTOS
    Route::GET('/produtos', [ProdutoController::class, 'index'])->name('index.produto');
    Route::POST('/cadastrar-produto', [ProdutoController::class, 'store'])->name('cadastro.produto');
    Route::POST('/atualizar-produto', [ProdutoController::class, 'update'])->name('atualizar.produto');
    Route::GET('/visualizar-dados-produto', [ProdutoController::class, 'edit'])->name('edit.produto');
    Route::DELETE('/excluir-produto', [ProdutoController::class, 'destroy'])->name('removerProduto');
    
    // SERVICO
    Route::GET('/servicos', [ServicosController::class, 'index'])->name('index.servico');
    Route::POST('/cadastrar-servico', [ServicosController::class, 'store'])->name('cadastrar.servico');
    Route::POST('/atualizar-servico', [ServicosController::class, 'update'])->name('atualizar.servico');
    Route::DELETE('/excluir-servico', [ServicosController::class, 'destroy'])->name('excluir.servico');
    Route::GET('/visualizar-dados-servico', [ServicosController::class, 'edit'])->name('edit.servico');


    //PACOTES
    Route::GET('/pacotes-e-promocoes', [DashboardController::class, 'pacotesEPromocoes']);
});
