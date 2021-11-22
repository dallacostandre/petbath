@component('componentes.header')@endcomponent
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
            <div class="col-md-12">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                Dados do Cliente
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="card">
                                    <form method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-header">
                                            <h4 class="card-title"><i
                                                    class="fas fa-user"></i>&nbsp;@if (isset($cliente)) {{ $titulo }} @else Cadastro Cliente @endif</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="whatsapp">Whats App</label>
                                                        <input type="text" class="form-control whatsApp" name="whatsapp"
                                                            id="whatsapp" value="@if (isset($cliente)) {{ $cliente->cliente_whatsapp }} @endif"
                                                            placeholder="Insira o Whats App" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="telefone">Telefone para Recado</label>
                                                        <input type="text" class="form-control phone" name="telefone"
                                                            id="telefone" placeholder="Insira o Telefone"
                                                            value="@if (isset($cliente)) {{ $cliente->cliente_telefone }} @endif" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Nome(completo)</label>
                                                        <input type="text" class="form-control" name="nome" id="nome"
                                                            value="@if (isset($cliente)) {{ $cliente->cliente_nome }} @endif"
                                                            placeholder="Insira o nome completo" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control" id="email"
                                                            name="email" value="@if (isset($cliente)) {{ $cliente->cliente_email }} @endif"
                                                            placeholder="Insira um email" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Instagram</label>
                                                        <input type="text" class="form-control" id="instagram_cliente"
                                                            name="instagram_cliente" value="@if (isset($instagram_cliente)) {{ $cliente->instagram_cliente }} @endif"
                                                            placeholder="Insira o Instagram    do cliente">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>CEP</label>
                                                        <input type="text" class="form-control cep" id="cep" name="cep"
                                                            placeholder="Insira o CEP" value="@if (isset($endereco)) {{ $endereco[0]->cliente_cep }} @endif"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Endereço</label>
                                                        <input type="text" class="form-control" id="rua" name="rua"
                                                            placeholder="Rua" value="@if (isset($endereco)) {{ $endereco[0]->cliente_rua }} @endif" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>N°</label>
                                                        <input type="text" class="form-control numero" id="numero"
                                                            name="numero" value="@if (isset($endereco)) {{ $endereco[0]->cliente_numero }} @endif"
                                                            placeholder="Numero" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Complemento</label>
                                                        <input type="text" class="form-control" id="complemento"
                                                            name="complemento" placeholder="Ex:Casa/Apto"
                                                            value="@if (isset($endereco)) {{ $endereco[0]->cliente_complemento }} @endif" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Cidade</label>
                                                        <input type="text" class="form-control" id="cidade"
                                                            name="cidade" value="@if (isset($endereco)) {{ $endereco[0]->cliente_cidade }} @endif"
                                                            placeholder="Cidade" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Bairro</label>
                                                        <input type="text" class="form-control" id="bairro"
                                                            name="bairro" value="@if (isset($endereco)) {{ $endereco[0]->cliente_bairro }} @endif"
                                                            placeholder="Bairro" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Estado</label>
                                                        <input type="text" class="form-control" id="uf" name="uf"
                                                            value="@if (isset($endereco)) {{ $endereco[0]->cliente_estado }} @endif" placeholder="Estado"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (isset($cliente))
                                                <input type="text" value="{{ $cliente->id }}" id="id_cliente"
                                                    style="display:none;">
                                                <button type="button" class="btn btn-info btn-fill pull-right"
                                                    id="atualizarCliente">Salvar
                                                </button>
                                            @else
                                                <div style="float:right">
                                                    <button type="button" class="btn btn-info btn-fill pull-right"
                                                        id="salvarCliente">Cadastrar
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                aria-controls="flush-collapseTwo">
                                Casdastro Pet
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body" style="display: flex;">
                                <div class="col-md-3">
                                    <div class="card card-user">
                                        <div class="card-header">
                                            <div style="display: flex; justify-content: space-between; padding-bottom:10px;">
                                                <h4 class="card-title">Pets de @Cliente</h4>
                                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Adicionar Pet"><i class="fal fa-plus-circle fa-2x"></i></a>
                                            </div>
                                        </div>
                                        <div class="row-md-12 " style="padding-bottom: 20px;">
                                            <div class="container">
                                                <div class="list-group">
                                                    <a href="#" class="list-group-item list-group-item-action active"
                                                        aria-current="true">
                                                        @pet
                                                    </a>
                                                    <a href="#" class="list-group-item list-group-item-action">@pet</a>
                                                    <a href="#" class="list-group-item list-group-item-action">@pet</a>
                                                    <a href="#" class="list-group-item list-group-item-action">@pet</a>
                                                    <a class="list-group-item list-group-item-action disabled">@pet</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="card card-user">
                                        <div class="container">
                                            <div class="card-header">
                                                <h4 class="card-title">Dados Pet</h4>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Nome do Pet</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Insira o nome do Pet" name="pet_nome"
                                                            id="pet_nome" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Espécie</label>
                                                        <select class="form-control" name="pet_especie"
                                                            id="pet_especie" required>
                                                            <option selected disabled>Espécie</option>
                                                            <option value="felino">Felino</option>
                                                            <option value="canino">Canino</option>
                                                            <option value="outro">Outro</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Porte</label>
                                                        <select class="form-control" name="pet_porte" id="pet_porte"
                                                            required>
                                                            <option selected disabled>Selecione o porte</option>
                                                            <option value="grande">Grande</option>
                                                            <option value="medio">Médio</option>
                                                            <option value="pequeno">Pequeno</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Raça</label>
                                                        {{-- FOREACH E RAÇAS --}}
                                                        <select class="form-control" name="pet_raca" id="pet_raca"
                                                            required>
                                                            <option disabled>Selecione uma raça</option>
                                                            @foreach ($raca_pet as $raca)
                                                                <option value="{{ $raca->id }}">
                                                                    {{ $raca->nome_raca }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Sexo</label>
                                                        <select class="form-control" name="pet_genero" id="pet_genero"
                                                            required>
                                                            <option selected disabled>Selecione o gênero</option>
                                                            <option value="m">Macho</option>
                                                            <option value="f">Fêmea</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Pelagem</label>
                                                        <select class="form-control" name="pet_pelagem"
                                                            id="pet_pelagem" required>
                                                            <option selected disabled>Selecione a pelagem</option>
                                                            <option value="curto">Curto</option>
                                                            <option value="longo">Longo</option>
                                                            <option value="medio">Médio</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Observações</label>
                                                        <textarea rows="4" cols="80" class="form-control"
                                                            name="pet_observacoes" id="pet_observacoes"
                                                            placeholder="Insira uma observação aqui,caso tenha."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@component('componentes.footer')
@endcomponent
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
    $('.collapse').collapse()

    $('.phone').mask('00 0 0000-0000');
    $('.whatsApp').mask('00 0 0000-0000');
    $('.numero').mask('00000');
    $('.cep').mask('00 000-000');

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
        var instagram_cliente = $('#instagram_cliente').val();
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
                instagram_cliente: instagram_cliente,
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

        }).fail(function(jqXHR, textStatus, data) {
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
