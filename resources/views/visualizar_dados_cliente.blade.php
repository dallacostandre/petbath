@component('componentes.header')@endcomponent

<style>
    .sidebar,
    .main-panel {
        height: auto;
    }

</style>
<!-- End Navbar -->
<div class="content" style="padding-bottom:0px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><i class="fas fa-user"></i>&nbsp;{{ $cliente->cliente_nome }}
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label>Nome Cliente </label><br>
                                    <span>@if (isset($cliente)) {{ $cliente->cliente_nome . ' ' . $cliente->cliente_sobrenome }} @endif</span>
                                </div>
                            </div>
                            <div class="col-md-3 pr-1">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telefone de Contato</label><br>
                                    <span class="phone">@if (isset($cliente)) {{ $cliente->cliente_telefone }} @endif</span>
                                </div>
                            </div>
                            <div class="col-md-3 pl-1">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telefone de Whats App</label><br>
                                    <span class="phone">@if (isset($cliente)) {{ $cliente->cliente_whatsapp }} @endif</span>
                                </div>
                            </div>
                            <div class="col-md-3 pr-1">
                                <div class="form-group">
                                    <label>Email</label><br>
                                    <span>@if (isset($cliente)) {{ $cliente->cliente_email }} @endif</span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label>Endereço</label><br>
                                    <span>@if (isset($endereco)) {{ $endereco[0]->cliente_rua . ', ' . $endereco[0]->cliente_numero }} @endif</span>
                                </div>
                            </div>
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label>CEP</label><br>
                                    <span>@if (isset($endereco)) {{ $endereco[0]->cliente_cep }} @endif</span>
                                </div>
                            </div>
                            <div class="col-md-2 pl-1">
                                <div class="form-group">
                                    <label>Complemento</label><br>
                                    <span>@if (isset($endereco)) {{ $endereco[0]->cliente_complemento }} @endif</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label>Cidade</label><br>
                                    <span>@if (isset($endereco)) {{ $endereco[0]->cliente_cidade }} @endif</span>
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label>Bairro</label><br>
                                    <span>@if (isset($endereco)) {{ $endereco[0]->cliente_bairro }} @endif</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Estado</label><br>
                                        <span>@if (isset($endereco)) {{ $endereco[0]->cliente_estado }} @endif</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>
            {{-- <div class="col-md-4">
                <div class="card card-user">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between">
                            @if (isset($cliente))
                                <h4 class="card-title">Pets de {{ $cliente->cliente_nome }}</h4>
                                <a class="btn btn-success" href="#">Cadastrar Pet</a>
                            @else
                                <h4 class="card-title"><i class="fas fa-dog"></i>&nbsp; Sem Pets </h4>
                            @endif
                        </div>
                    </div>
                    <div class="row-md-12 pr-1" style="padding-bottom: 20px;">
                        <div class="accordion" id="accordionExample">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        @Petonome
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p><strong>Nome:</strong> @nomePet</p>
                                    <p><strong>Porte:</strong> @portePet</p>
                                    <p><strong>Raça:</strong> @raçaPet</p>
                                    <p><strong>Espécie: </strong>@especiePet</p>
                                    <p><strong>Sexo:</strong> @sexoPet</p>
                                    <p><strong>Pelagem:</strong> @sexoPet</p>
                                    <p><strong>Castrado:</strong> @castradoPet</p>
                                    <hr>
                                    <div style="direction: ltr">
                                        <a href="#" style="color: red">
                                            <i class="fal fa-ban fa-lg"></i>
                                            Excluir
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<div class="content" style="padding-top:0px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between;padding-bottom:15px;">
                        <h4 class="card-title"><i class="fas fa-dog"></i>&nbsp;Pets de {{$cliente->cliente_nome}}</h4>
                        <a class="btn btn-success" href="#">Cadastrar Pet</a>
                    </div>
                    <div class="card card-user">
                        <div class="card-header">
                        {{-- PETS CADASTRADOS --}}
                        @if (isset($cliente))
                            <div class="row-md-6 pr-1" style="padding-bottom: 20px;">
                                <div class="accordion" id="accordionExample">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left" type="button"
                                                data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                @Petonome
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p><strong>Nome:</strong> @nomePet</p>
                                            <p><strong>Porte:</strong> @portePet</p>
                                            <p><strong>Raça:</strong> @raçaPet</p>
                                            <p><strong>Espécie: </strong>@especiePet</p>
                                            <p><strong>Sexo:</strong> @sexoPet</p>
                                            <p><strong>Pelagem:</strong> @sexoPet</p>
                                            <p><strong>Castrado:</strong> @castradoPet</p>
                                            <hr>
                                            <div style="direction: ltr">
                                                <a href="#" style="color: red">
                                                    <i class="fal fa-ban fa-lg"></i>
                                                    Excluir
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <h4 class="card-title"><i class="fas fa-dog"></i>&nbsp; Sem Pets </h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@component('componentes.footer')
@endcomponent

<script>
    $('.collapse').collapse()

    $('.phone').mask('00 0000-0000');
    $('.whatsApp').mask('00 0 0000-0000');
    $('.numero').mask('00000');
    $('.cep').mask('00-000000');
</script>
