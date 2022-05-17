@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 align-self-center">
                    <div style="justify-content:space-between;display: flex;">
                        <h4 class="page-title" id="name_title">
                            Permissões
                        </h4>
                        <a type="button" aria-hidden="true" class="btn btn-success botao-padrao" data-bs-toggle="modal"
                            data-bs-target="#modalCadastroServico">
                            Adicionar Grupo
                        </a>
                    </div>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('configuracoes.index') }}">Configurações</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Permissões</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Cod. Permissão</th>
                                        <th scope="col">Grupo Usuário</th>
                                        <th scope="col">Descrição</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Administrador</td>
                                        <td>Administrador Geral</td>
                                        <td>INTEGRAL</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Funcionariário</td>
                                        <td>Cadastros Geral</td>
                                        <td>PARCIAL</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Financeiro</td>
                                        <td>Caixa Geral</td>
                                        <td>PARCIAL</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        {{-- {{ $permissoes->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptExtras')
    <script></script>
@endsection
