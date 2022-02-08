@component('dashboard.componentes.header')@endcomponent
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">
                    @if (isset($cliente))
                        {{ $titulo }}
                    @else
                        Cadastro Novo Cliente
                    @endif
                </h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="col md-12">
            <div class="container">

            </div>
        </div>
@component('dashboard.componentes.footer')@endcomponent
