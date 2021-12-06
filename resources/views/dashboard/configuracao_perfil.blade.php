
@component('dashboard.componentes.header')@endcomponent
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Configuração do Perfil</h4>
            </div>
        </div>
    </div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="col-md-2">
                            <div class="row pb-5">
                                <img src="..." alt="..." class="img-thumbnail">
                                <button type="button" class="btn btn-outline-primary btn-sm">Alterar Logo</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nome Empresarial</label>
                                    <input type="text" class="form-control" id="cidade" name="cidade"
                                        value="@if (isset($endereco)) {{ $endereco[0]->cliente_cidade }} @endif" placeholder="Nome Empresarial" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CNPJ</label>
                                    <input type="text" class="form-control" id="bairro" name="bairro"
                                        value="@if (isset($endereco)) {{ $endereco[0]->cliente_bairro }} @endif" placeholder="CNPJ" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Responsável</label>
                                    <input type="text" class="form-control" id="uf" name="uf"
                                        value="@if (isset($endereco)) {{ $endereco[0]->cliente_estado }} @endif" placeholder="Nome Responsável" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="text" class="form-control" id="cidade" name="cidade"
                                        value="@if (isset($endereco)) {{ $endereco[0]->cliente_cidade }} @endif" placeholder="E-mail" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Telefone</label>
                                    <input type="text" class="form-control" id="bairro" name="bairro"
                                        value="@if (isset($endereco)) {{ $endereco[0]->cliente_bairro }} @endif" placeholder="Telefone" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Whats App</label>
                                    <input type="text" class="form-control" id="uf" name="uf"
                                        value="@if (isset($endereco)) {{ $endereco[0]->cliente_estado }} @endif" placeholder="Whats App" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>CEP</label>
                                    <input type="text" class="form-control cep" id="cep" name="cep"
                                        placeholder="Insira o CEP" value="@if (isset($endereco)) {{ $endereco[0]->cliente_cep }} @endif" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Endereço</label>
                                    <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua"
                                        value="@if (isset($endereco)) {{ $endereco[0]->cliente_rua }} @endif" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>N°</label>
                                    <input type="text" class="form-control numero" id="numero" name="numero"
                                        value="@if (isset($endereco)) {{ $endereco[0]->cliente_numero }} @endif" placeholder="Numero" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Complemento</label>
                                    <input type="text" class="form-control" id="complemento" name="complemento"
                                        placeholder="Ex:Casa/Apto" value="@if (isset($endereco)) {{ $endereco[0]->cliente_complemento }} @endif" required>
                                </div>
                            </div>
                            <div class="pt-3 pb-3 ">
                                <h4>Alterar de Senha de Acesso</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Senha Atual</label>
                                        <input type="text" class="form-control" id="complemento" name="complemento"
                                            placeholder="Digite a sua senha atual" value="@if (isset($endereco)) {{ $endereco[0]->cliente_complemento }} @endif" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Nova Senha</label>
                                        <input type="text" class="form-control" id="complemento" name="complemento"
                                            placeholder="Digite sua senha nova" value="@if (isset($endereco)) {{ $endereco[0]->cliente_complemento }} @endif" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Confirme Nova Senha</label>
                                        <input type="text" class="form-control" id="complemento" name="complemento"
                                            placeholder="Confirme sua senha nova" value="@if (isset($endereco)) {{ $endereco[0]->cliente_complemento }} @endif" required>
                                    </div>
                                </div>
                                <div class="container pt-4 pb-4">
                                    <button type="button" class="btn btn-success botao-padrao float-end"
                                        id="salvarCliente">
                                        Salvar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@component('dashboard.componentes.footer')@endcomponent