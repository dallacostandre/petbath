@component('componentes.header')@endcomponent
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><i class="fas fa-user"></i>&nbsp;@if (isset($cliente)) {{ $titulo }} @else Perfil @endif</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Telefone de Contato</label>
                                        <input type="text" class="form-control phone" name="telefone" id="telefone"
                                            placeholder="Insira o Telefone" value="@if (isset($cliente)) {{ $cliente[0]->cliente_telefone }} @endif" required>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Whats App</label>
                                        <input type="text" class="form-control whatsApp" name="whatsapp" id="whatsapp"
                                            value="@if (isset($cliente)) {{ $cliente[0]->cliente_whatsapp }} @endif" placeholder="Insira o Whats App" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Primeiro Nome</label>
                                        <input type="text" class="form-control" name="nome" id="nome"
                                            value="@if (isset($cliente)) {{ $cliente[0]->cliente_nome }} @endif" placeholder="Insira o nome" required>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Sobrenome</label>
                                        <input type="text" class="form-control" id="sobrenome" name="sobrenome"
                                            value="@if (isset($cliente)) {{ $cliente[0]->cliente_sobrenome }} @endif" placeholder="Insira o sobrenome" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>CEP</label>
                                        <input type="text" class="form-control cep" id="cep" name="cep"
                                            placeholder="Insira o CEP" value="@if (isset($endereco)) {{ $endereco[0]->cliente_cep }} @endif" required>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            value="@if (isset($cliente)) {{ $cliente[0]->cliente_email }} @endif" placeholder="Insira um email" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Endereço</label>
                                        <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua"
                                            value="@if (isset($endereco)) {{ $endereco[0]->cliente_rua }} @endif" required>
                                    </div>
                                </div>
                                <div class="col-md-2 pr-1">
                                    <div class="form-group">
                                        <label>N°</label>
                                        <input type="text" class="form-control numero" id="numero" name="numero"
                                            value="@if (isset($endereco)) {{ $endereco[0]->cliente_numero }} @endif" placeholder="Numero" required>
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Complemento</label>
                                        <input type="text" class="form-control" id="complemento" name="complemento"
                                            placeholder="Ex:Casa/Apto" value="@if (isset($endereco)) {{ $endereco[0]->cliente_complemento }} @endif" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Cidade</label>
                                        <input type="text" class="form-control" id="cidade" name="cidade"
                                            value="@if (isset($endereco)) {{ $endereco[0]->cliente_cidade }} @endif" placeholder="Cidade" required>
                                    </div>
                                </div>
                                <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>Bairro</label>
                                        <input type="text" class="form-control" id="bairro" name="bairro"
                                            value="@if (isset($endereco)) {{ $endereco[0]->cliente_bairro }} @endif" placeholder="Bairro" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Estado</label>
                                            <input type="text" class="form-control" id="uf" name="uf"
                                                value="@if (isset($endereco)) {{ $endereco[0]->cliente_estado }} @endif" placeholder="Estado" required>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @if (isset($cliente))
                                <input type="text" value="{{ $cliente[0]->id }}" id="id_cliente" style="display:none;">
                                <button type="button" class="btn btn-info btn-fill pull-right"
                                    id="atualizarCliente">Salvar
                                </button>
                            @else
                                <button type="button" class="btn btn-info btn-fill pull-right"
                                    id="salvarCliente">Cadastrar
                                </button>

                            @endif
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; padding-bottom:10px;">
                            @if (isset($cliente))
                                <h4 class="card-title">Pets de {{ $cliente[0]->cliente_nome }}</h4>
                                <a class="btn btn-success" href="#">Cadastrar Pet</a>
                            @else
                                <h4 class="card-title"><i class="fas fa-dog"></i>&nbsp; Sem Pets </h4>
                            @endif
                        </div>
                    </div>
                    @if (isset($cliente))
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
                    @endif
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

    $(document).ready(function() {
        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
            $("#ibge").val("");
        }

        //Quando o campo cep perde o foco.
        $("#cep").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#rua").val("...");
                    $("#bairro").val("...");
                    $("#cidade").val("...");
                    $("#uf").val("...");
                    $("#ibge").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#rua").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#uf").val(dados.uf);
                            $("#ibge").val(dados.ibge);
                            $('#cep').css('border-color', 'green');
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            Swal.fire({
                                title: "Ops...",
                                message: "Cep não encontrado, digite outro cep.",
                                icon: 'error',
                                showClass: {
                                    popup: 'animate__animated animate__fadeInDown'
                                },
                                hideClass: {
                                    popup: 'animate__animated animate__fadeOutUp'
                                }
                            })
                            $('#cep').css('border-color', 'red');
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    Swal.fire({
                        title: "Ops...",
                        message: "Este cep não é válido.",
                        icon: 'error',
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                    $('#cep').css('border-color', 'red');
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    });
</script>

<script>
    $('#atualizarCliente').on('click', function() {
        event.preventDefault();
        var url = '/atualizar-cliente';
        var telefone = $('#telefone').val();
        var whatsapp = $('#whatsapp').val();
        var nome = $('#nome').val();
        var sobrenome = $('#sobrenome').val();
        var cep = $('#cep').val();
        var email = $('#email').val();
        var rua = $('#rua').val();
        var numero = $('#numero').val();
        var complemento = $('#complemento').val();
        var bairro = $('#bairro').val();
        var cidade = $('#cidade').val();
        var uf = $('#uf').val();
        var id_cliente = $('#id_cliente').val();
        var _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: url,
            context: document.body,
            type: "POST",
            dataType: 'json',
            data: {
                telefone: telefone,
                whatsapp: whatsapp,
                nome: nome,
                sobrenome: sobrenome,
                cep: cep,
                email: email,
                rua: rua,
                numero: numero,
                complemento: complemento,
                bairro: bairro,
                cidade: cidade,
                uf: uf,
                id_cliente: id_cliente,
                _token: _token
            }
        }).done(function(data) {
            Swal.fire({
                title: data.title,
                message: data.message,
                icon: data.icon,
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
            if (data.url) {
                window.location.href = data.url;
            }

        }).fail(function(jqXHR, textStatus, data) {
            Swal.fire({
                title: "Error",
                message: jqXHR,
                icon: "error",
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        });
    });

    $('#salvarCliente').on('click', function() {
        event.preventDefault();
        var url = '/create-new-client';
        var telefone = $('#telefone').val();
        var whatsapp = $('#whatsapp').val();
        var nome = $('#nome').val();
        var sobrenome = $('#sobrenome').val();
        var cep = $('#cep').val();
        var email = $('#email').val();
        var rua = $('#rua').val();
        var numero = $('#numero').val();
        var complemento = $('#complemento').val();
        var bairro = $('#bairro').val();
        var cidade = $('#cidade').val();
        var uf = $('#uf').val();
        var _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: url,
            context: document.body,
            type: "POST",
            dataType: 'json',
            data: {
                telefone: telefone,
                whatsapp: whatsapp,
                nome: nome,
                sobrenome: sobrenome,
                cep: cep,
                email: email,
                rua: rua,
                numero: numero,
                complemento: complemento,
                bairro: bairro,
                cidade: cidade,
                uf: uf,
                _token: _token
            }
        }).done(function(data) {
            Swal.fire({
                title: data.title,
                message: data.message,
                icon: data.icon,
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            });
            if (data.url) {
                window.location.href = data.url;
            }

        }).fail(function(jqXHR, textStatus) {
            Swal.fire({
                title: data.title,
                message: data.message,
                icon: data.icon,
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        });
    });
</script>
