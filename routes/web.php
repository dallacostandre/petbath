<?php

use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\CaixaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ConfiguracaoController;
use App\Http\Controllers\FinanceiroController;
use App\Http\Controllers\PetDadosController;
use App\Http\Controllers\ServicosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificacoesController;
use App\Http\Controllers\PacotePromocionalController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PermissoesController;
use App\Http\Controllers\PlanosAssinaturasController;
use App\Http\Controllers\ProdutoController;

Route::GET('/acessar', function () {
    return view('auth.login');
})->name('acessar');

Route::GET('/cadastro', function () {
    return view('auth.register');
});

// USUARIO DEVE ESTAR LOGADO
Route::group(['middleware' => 'auth'], function () {
    // DASHBOARD
    Route::GET('/', [DashboardController::class, 'index'])->name('dashboard.index');
     
    // CLIENTE (Lista todos os clientes do usuário)
    Route::GET('/clientes', [ClienteController::class, 'index'])->name('cliente.index');
    Route::GET('/dados-cliente', [ClienteController::class, 'create'])->name('cliente.create');
    Route::POST('/cadastrar-novo-cliente', [ClienteController::class, 'store'])->name('cliente.store');
    Route::GET('/dados-cliente/{id}', [ClienteController::class, 'edit'])->name('cliente.edit');
    Route::POST('/atualizar-cliente', [ClienteController::class, 'update'])->name('cliente.update');
    Route::POST('/excluir-cliente', [ClienteController::class, 'destroy'])->name('cliente.destroy');
    Route::GET('/historico/{id}', [ClienteController::class, 'history'])->name('cliente.history');
    
    // PET (Cadastra os dados do pet)
    Route::GET('/pets/{uniqueIdCliente}', [PetDadosController::class, 'index'])->name('pet.index');
    Route::POST('/cadastrar-novo-pet', [PetDadosController::class, 'store'])->name('pet.store');
    Route::DELETE('/excluir-pet', [PetDadosController::class, 'destroy'])->name('excluirPet');
    Route::POST('/visualizar-dados-pet', [PetDadosController::class, 'show'])->name('pet.show');
    Route::POST('/atualizar-pet', [PetDadosController::class, 'update'])->name('pet.update');
    
    // NOTIFICAÇÕES
    Route::POST('/cadastrar-notificacao', [NotificacoesController::class, 'store'])->name('notificacao.store');
    Route::DELETE('/excluir-notificacao', [NotificacoesController::class, 'destroy'])->name('notificacao.destroy');
    
    // PRODUTOS
    Route::GET('/produtos', [ProdutoController::class, 'index'])->name('produto.index');
    Route::POST('/cadastrar-produto', [ProdutoController::class, 'store'])->name('cadastro.produto');
    Route::POST('/atualizar-produto', [ProdutoController::class, 'update'])->name('atualizar.produto');
    Route::GET('/visualizar-dados-produto', [ProdutoController::class, 'edit'])->name('edit.produto');
    Route::DELETE('/excluir-produto', [ProdutoController::class, 'destroy'])->name('removerProduto');
    
    // SERVICO
    Route::GET('/servicos', [ServicosController::class, 'index'])->name('servico.index');
    Route::POST('/cadastrar-servico', [ServicosController::class, 'store'])->name('servico.store');
    Route::POST('/atualizar-servico', [ServicosController::class, 'update'])->name('servico.update');
    Route::DELETE('/excluir-servico', [ServicosController::class, 'destroy'])->name('servico.destroy');
    Route::GET('/visualizar-dados-servico', [ServicosController::class, 'edit'])->name('servico.edit');
    
    // PROMOCAO E PACOTE
    Route::GET('/pacotes-promocionais', [PacotePromocionalController::class, 'index'])->name('pacotes.promocionais.index');
    Route::GET('/adicionar-pacote-promocional', [PacotePromocionalController::class, 'create'])->name('pacotes.promocionais.create');
    Route::POST('/cadastrar-pacote-promocional', [PacotePromocionalController::class, 'store'])->name('pacotes.promocionais.store');
    Route::DELETE('/excluir-pacote-promocional', [PacotePromocionalController::class, 'destroy'])->name('pacotes.promocionais.destroy');
    Route::POST('/desativar-pacote-promocional', [PacotePromocionalController::class, 'enabledisable'])->name('pacotes.promocionais.enabledisable');
    
    // RETORNA TODOS OS SERVICOE E PRODUTOS DO CLIENTE (Captura todos os servicos e produtos do cliente)
    Route::POST('/getAllServicosProdutos', [PacotePromocionalController::class, 'getAllServicosProdutos']);

    // AGENDAMENTO
    Route::GET('/agendamento', [AgendamentoController::class, 'index'])->name('agendamento.index');

    // FINANCEIRO
    Route::GET('/financeiro', [FinanceiroController::class, 'index'])->name('financeiro.index');

    // CONFIGURAÇÕES
    Route::GET('/configuracoes', [ConfiguracaoController::class, 'index'])->name('configuracoes.index');

    // PLANOS E ASSINATURAS
    Route::GET('/planos-e-assinaturas', [PlanosAssinaturasController::class, 'index'])->name('planos.assinaturas.index');

    // PERFIL
    Route::GET('/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index');

    // FLUXO DE CAIXA
    Route::GET('/fluxo-de-caixa', [CaixaController::class, 'index'])->name('caixa.index');
    
    // PERMISSÕES
    Route::GET('/permissao', [PermissoesController::class, 'index'])->name('permissao.index');

});
