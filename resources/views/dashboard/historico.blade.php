@component('dashboard.componentes.header')
@endcomponent
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title" id="name_title">
                    {{ isset($objCliente) ? 'Cadastro de ' . $objCliente->cliente_nome : 'Cadastro Novo Cliente' }}
                </h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                    type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                    Dados
                </button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="nav-home-tab" id="nav-home">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="whatsapp">Whats App</label>
                                    <input required type="text" class="form-control whatsApp" name="cliente_whatsapp"
                                        id="cliente_whatsapp"
                                        value="@if (isset($objCliente)) {{ $objCliente->cliente_whatsapp }} @endif">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="telefone">Telefone</label>
                                    <input required type="text" class="form-control phone" name="cliente_telefone"
                                        id="cliente_telefone"
                                        value="@if (isset($objCliente)) {{ $objCliente->cliente_telefone }} @endif">
                                    <small id="emailHelp" class="form-text text-muted">Este campo é obrigatório</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nome Completo</label>
                                    <input required type="text" class="form-control" name="cliente_nome"
                                        id="cliente_nome"
                                        value="@if (isset($objCliente)) {{ $objCliente->cliente_nome }} @endif">
                                    <small id="emailHelp" class="form-text text-muted">Este campo é obrigatório</small>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input required type="text" class="form-control" id="cliente_email"
                                        name="cliente_email"
                                        value="@if (isset($objCliente)) {{ $objCliente->cliente_email }} @endif">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input required type="text" class="form-control" id="cliente_instagram"
                                        name="cliente_instagram"
                                        value="@if (isset($objCliente)) {{ $objCliente->cliente_instagram }} @endif">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @component('dashboard.componentes.footer')
        @endcomponent

        <script>
            $('.phone').mask('00 0 0000-0000');
            $('.whatsApp').mask('00 0 0000-0000');
            $('.numero').mask('00000');
            $('.cep').mask('00.000-000');
            $('.uf').mask('AA');
        </script>
