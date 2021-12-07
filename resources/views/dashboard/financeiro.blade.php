@component('dashboard.componentes.header')@endcomponent
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Financeiro</h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Financeiro</h5>
                        <p class="card-text">Realizar Lançamento e Verificar Saldo</p>
                        <a href="{{url('/fluxo-de-caixa')}}" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Caixa</h5>
                        <p class="card-text">Fluxo de Caixa</p>
                        <a href="{{url('/fluxo-de-caixa')}}" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>
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
        </div>
    </div>
    @component('dashboard.componentes.footer')@endcomponent
