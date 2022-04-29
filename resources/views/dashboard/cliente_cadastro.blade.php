@component('dashboard.componentes.header')
@endcomponent
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
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                    type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                    Dados Cliente
                </button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                    type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                    Pets
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
                                        id="whatsapp" value="@if (isset($cliente)) {{ $cliente->cliente_whatsapp }} @endif">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="telefone">Telefone</label>
                                    <input required type="text" class="form-control phone" name="cliente_telefone" id="telefone"
                                        value="@if (isset($cliente)) {{ $cliente->cliente_telefone }} @endif">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nome Completo</label>
                                    <input required type="text" class="form-control" name="cliente_nome" id="cliente_nome"
                                        value="@if (isset($cliente)) {{ $cliente->cliente_nome }} @endif">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input required type="text" class="form-control" id="cliente_email" name="cliente_email"
                                        value="@if (isset($cliente)) {{ $cliente->cliente_email }} @endif">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input required type="text" class="form-control" id="cliente_instagram"
                                        name="cliente_instagram"
                                        value="@if (isset($cliente)) {{ $cliente->cliente_instagram }} @endif">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>CEP</label>
                                    <input required type="text" class="form-control cep" id="cliente_cep" name="cliente_cep"
                                        value="@if (isset($endereco)) {{ $endereco->cliente_cep }} @endif">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Endereço</label>
                                    <input required type="text" class="form-control" id="cliente_rua" name="cliente_rua"
                                        value="@if (isset($endereco)) {{ $endereco->cliente_rua }} @endif">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>N°</label>
                                    <input required type="text" class="form-control numero" id="cliente_numero"
                                        name="cliente_numero"
                                        value="@if (isset($endereco)) {{ $endereco->cliente_numero }} @endif">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Complemento</label>
                                    <input required type="text" class="form-control" id="cliente_complemento"
                                        name="cliente_complemento"
                                        value="@if (isset($endereco)) {{ $endereco->cliente_complemento }} @endif">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Cidade</label>
                                    <input required type="text" class="form-control" id="cliente_cidade" name="cliente_cidade"
                                        value="@if (isset($endereco)) {{ $endereco->cliente_cidade }} @endif">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Bairro</label>
                                    <input required type="text" class="form-control" id="cliente_bairro" name="cliente_bairro"
                                        value="@if (isset($endereco)) {{ $endereco->cliente_bairro }} @endif">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Estado</label>
                                    <input required type="text" class="form-control uf" id="cliente_estado" name="cliente_estado"
                                        value="@if (isset($endereco)) {{ $endereco->cliente_estado }} @endif">
                                </div>
                            </div>
                        </div>
                        <div style="float:right">
                            @if (isset($cliente))
                                <button class="btn btn-success botao-padrao" type="submit" aria-expanded="false">
                                    Atualizar
                                </button>
                            @else
                                <button class="btn btn-success botao-padrao" type="button" id="cadastrarCliente">
                                    Salvar e Avançar
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" role="tabpanel" aria-labelledby="nav-profile-tab" id="nav-profile">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="list-group" id="list-tab" role="tablist">
                                    <a class="list-group-item list-group-item-action active" id="list-home-list"
                                        data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">PET
                                        1</a>
                                    <a class="list-group-item list-group-item-action" id="list-profile-list"
                                        data-bs-toggle="list" href="#list-profile" role="tab"
                                        aria-controls="list-profile">PET 2</a>
                                    <a class="list-group-item list-group-item-action" id="list-messages-list"
                                        data-bs-toggle="list" href="#list-messages" role="tab"
                                        aria-controls="list-messages">PET 3</a>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="list-home" role="tabpanel"
                                        aria-labelledby="list-home-list">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Nome do Pet</label>
                                                            <input required type="text" class="form-control"
                                                                placeholder="Insira o nome do Pet" name="pet_nome"
                                                                id="pet_nome"
                                                                value="@if (isset($pet_dados)) {{ $pet_dados->pet_nome }} @endif">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Espécie</label>
                                                            <select class="form-control" name="pet_especie"
                                                                id="pet_especie">
                                                                <option selected disabled>Selecione a Espécie
                                                                </option>
                                                                <option value="felino">Felino</option>
                                                                <option value="canino">Canino</option>
                                                                <option value="outro">Outro</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Porte</label>
                                                            <select class="form-control" name="pet_porte"
                                                                id="pet_porte">
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
                                                            <select class="form-control" name="pet_raca"
                                                                id="pet_raca">
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
                                                            <select class="form-control" name="pet_genero"
                                                                id="pet_genero">
                                                                <option selected disabled>
                                                                    Selecione o gênero
                                                                </option>
                                                                <option value="m">Macho</option>
                                                                <option value="f">Fêmea</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Pelagem</label>
                                                            <select class="form-control" name="pet_pelagem" id="pet_pelagem">
                                                                <option selected disabled>Selecione a pelagem
                                                                </option>
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
                                                            <textarea rows="4" cols="80" class="form-control" name="pet_observacoes" id="pet_observacoes"
                                                                placeholder="Insira uma observação aqui,caso tenha."></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="float:right" class="ms-1">
                                            <button type="submit" class="btn btn-success botao-padrao">
                                                Salvar
                                            </button>
                                        </div>
                                        <div style="float:right">
                                            <button type="button" class="btn btn-success botao-padrao"
                                                id="salvarAgendarCliente">
                                                Salvar e Agendar
                                            </button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="list-profile" role="tabpanel"
                                        aria-labelledby="list-profile-list">...</div>
                                    <div class="tab-pane fade" id="list-messages" role="tabpanel"
                                        aria-labelledby="list-messages-list">...</div>
                                    <div class="tab-pane fade" id="list-settings" role="tabpanel"
                                        aria-labelledby="list-settings-list">...</div>
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
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
                $("#success-alert").slideUp(500);
            });
            $('.phone').mask('00 0 0000-0000');
            $('.whatsApp').mask('00 0 0000-0000');
            $('.numero').mask('00000');
            $('.cep').mask('00 000-000');
            $('.uf').mask('AA');

            $(document).ready(function() {
                function limpa_formulário_cep() {
                    // Limpa valores do formulário de cep.
                    $("#cliente_rua").val("");
                    $("#cliente_bairro").val("");
                    $("#cliente_cidade").val("");
                    $("#cliente_estado").val("");
                }

                //Quando o campo cep perde o foco.
                $("#cliente_cep").blur(function() {

                    //Nova variável "cep" somente com dígitos.
                    var cep = $(this).val().replace(/\D/g, '');

                    //Verifica se campo cep possui valor informado.
                    if (cep != "") {

                        //Expressão regular para validar o CEP.
                        var validacep = /^[0-9]{8}$/;

                        //Valida o formato do CEP.
                        if (validacep.test(cep)) {

                            //Preenche os campos com "..." enquanto consulta webservice.
                            $("#cliente_rua").val("...");
                            $("#cliente_bairro").val("...");
                            $("#cliente_cidade").val("...");
                            $("#cliente_estado").val("...");

                            //Consulta o webservice viacep.com.br/
                            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                                if (!("erro" in dados)) {
                                    //Atualiza os campos com os valores da consulta.
                                    $("#cliente_rua").val(dados.logradouro);
                                    $("#cliente_bairro").val(dados.bairro);
                                    $("#cliente_cidade").val(dados.localidade);
                                    $("#cliente_estado").val(dados.uf);
                                    $('#cliente_cep').css('border-color', 'green');
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
                                    $('#cliente_cep').css('border-color', 'red');
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
                            $('#cliente_cep').css('border-color', 'red');
                        }
                    } //end if.
                    else {
                        //cep sem valor, limpa formulário.
                        limpa_formulário_cep();
                    }
                });
            });
            $('#cadastrarCliente').on('click', function() {
                event.preventDefault();
                var url = '/cadastrar-novo-cliente';
                var cliente_whatsapp = $('#whatsapp').val();
                var cliente_telefone = $('#cliente_telefone').val();
                var cliente_nome = $('#cliente_nome').val();
                var cliente_email = $('#cliente_email').val();
                var cliente_instagram = $('#cliente_instagram').val();
                var cliente_cep = $('#cliente_cep').val();
                var cliente_rua = $('#cliente_rua').val();
                var cliente_numero = $('#cliente_numero').val();
                var cliente_complemento = $('#cliente_complemento').val();
                var cliente_cidade = $('#cliente_cidade').val();
                var cliente_bairro = $('#cliente_bairro').val();
                var cliente_estado = $('#cliente_estado').val();
                var _token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: url,
                    type: "post",
                    dataType: "json",
                    data: {
                        cliente_whatsapp: cliente_whatsapp,
                        cliente_telefone: cliente_telefone,
                        cliente_nome: cliente_nome,
                        cliente_email: cliente_email,
                        cliente_instagram: cliente_instagram,
                        cliente_cep: cliente_cep,
                        cliente_rua: cliente_rua,
                        cliente_numero: cliente_numero,
                        cliente_complemento: cliente_complemento,
                        cliente_cidade: cliente_cidade,
                        cliente_bairro: cliente_bairro,
                        cliente_estado: cliente_estado,
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
                    $("#nav-profile-tab").trigger('click');  

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
        </script>
