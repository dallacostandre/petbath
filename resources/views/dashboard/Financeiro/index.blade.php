@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Financeiro</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard.index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Financeiro</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Relatórios</h5>
                            <p class="card-text">Relatórios Personalizados
                            </p>
                            <a href="#" class="btn btn-primary">Entrar</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Lançamentos</h5>
                            <p class="card-text">Lançamentos Personalizados</p>
                            <a href="{{ route('lancamentos.index') }}" class="btn btn-primary">Entrar</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Contas a pagar</h5>
                            <p class="card-text">Contas a pagar
                            </p>
                            <a href="{{ route('contaspagar.index') }}" class="btn btn-primary">Entrar</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">DRE - Demonstrativo Geral</h5>
                            <p class="card-text">Demonstrativo
                            </p>
                            <a href="{{route('demonstrativo.index')}}" class="btn btn-primary">Entrar</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection
