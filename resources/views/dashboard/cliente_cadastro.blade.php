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
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nome Completo</label>
                                    <input required type="text" class="form-control" name="cliente_nome"
                                        id="cliente_nome"
                                        value="@if (isset($objCliente)) {{ $objCliente->cliente_nome }} @endif">
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
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>CEP</label>
                                    <input required type="text" class="form-control cep" id="cliente_cep"
                                        name="cliente_cep"
                                        value="@if (isset($endereco)) {{ $endereco->cliente_cep }} @endif">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Endereço</label>
                                    <input required type="text" class="form-control" id="cliente_rua"
                                        name="cliente_rua"
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
                                    <small id="emailHelp" class="form-text text-muted">Se não houve, insira " -
                                        ".</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Cidade</label>
                                    <input required type="text" class="form-control" id="cliente_cidade"
                                        name="cliente_cidade"
                                        value="@if (isset($endereco)) {{ $endereco->cliente_cidade }} @endif">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Bairro</label>
                                    <input required type="text" class="form-control" id="cliente_bairro"
                                        name="cliente_bairro"
                                        value="@if (isset($endereco)) {{ $endereco->cliente_bairro }} @endif">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Estado</label>
                                    <input required type="text" class="form-control uf" id="cliente_estado"
                                        name="cliente_estado"
                                        value="@if (isset($endereco)) {{ $endereco->cliente_estado }} @endif">
                                </div>
                            </div>
                        </div>
                        <div style="float:right">
                            @if (isset($objCliente))
                                <button class="btn btn-success botao-padrao" type="button" id="atualizarCliente"
                                    data-id="{{ $objCliente->id }}" aria-expanded="false">
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
        </div>
        @component('dashboard.componentes.footer')
        @endcomponent

        <script>
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

            $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
                $("#success-alert").slideUp(500);
            });

            $('.phone').mask('00 0 0000-0000');
            $('.whatsApp').mask('00 0 0000-0000');
            $('.numero').mask('00000');
            $('.cep').mask('00.000-000');
            $('.uf').mask('AA');

            $('#cadastrarCliente').on('click', function() {
                event.preventDefault();
                validateInputs();
                var url = '/cadastrar-novo-cliente';
                var cliente_whatsapp = $('#cliente_whatsapp').val();
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

                if (cliente_whatsapp === '') {
                    Swal.fire({
                        title: "Atenção",
                        text: "O campo de WHATS APP esta vazio",
                        icon: "warning",
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                    $('#cliente_whatsapp').css('border-color', 'red');
                    setTimeout(() => {
                        $('#cliente_whatsapp').css('border-color', '');
                    }, 3000)
                    exit();
                }
                if (cliente_telefone === '') {
                    Swal.fire({
                        title: "Atenção",
                        text: "O campo de TELEFONE esta vazio",
                        icon: "warning",
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                    $('#cliente_telefone').css('border-color', 'red');
                    setTimeout(() => {
                        $('#cliente_telefone').css('border-color', '');
                    }, 3000)
                    return false;
                }
                if (cliente_nome === '') {
                    Swal.fire({
                        title: "Atenção",
                        text: "O campo de NOME esta vazio",
                        icon: "warning",
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                    $('#cliente_nome').css('border-color', 'red');
                    setTimeout(() => {
                        $('#cliente_nome').css('border-color', '');
                    }, 3000)
                    return false;
                }
                if (cliente_email === '') {
                    Swal.fire({
                        title: "Atenção",
                        text: "O campo de EMAIL esta vazio",
                        icon: "warning",
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                    $('#cliente_email').css('border-color', 'red');
                    setTimeout(() => {
                        $('#cliente_email').css('border-color', '');
                    }, 3000)
                    return false;
                }
                if (cliente_instagram === '') {
                    Swal.fire({
                        title: "Atenção",
                        text: "O campo INSTAGRAM esta vazio",
                        icon: "warning",
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                    $('#cliente_instagram').css('border-color', 'red');
                    setTimeout(() => {
                        $('#cliente_instagram').css('border-color', '');
                    }, 3000)
                    return false;
                }
                if (cliente_cep === '') {
                    Swal.fire({
                        title: "Atenção",
                        text: "O camp CEP esta vazio",
                        icon: "warning",
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                    $('#cliente_cep').css('border-color', 'red');
                    setTimeout(() => {
                        $('#cliente_cep').css('border-color', '');
                    }, 3000)
                    return false;
                }
                if (cliente_numero === '') {
                    Swal.fire({
                        title: "Atenção",
                        text: "O campo NUMERO esta vazio",
                        icon: "warning",
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                    $('#cliente_numero').css('border-color', 'red');
                    setTimeout(() => {
                        $('#cliente_numero').css('border-color', '');
                    }, 3000)
                    return false;
                }
                if (cliente_complemento === '') {
                    Swal.fire({
                        title: "Atenção",
                        text: "O campo COMPLEMENTO esta vazio",
                        icon: "warning",
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                    $('#cliente_complemento').css('border-color', 'red');
                    setTimeout(() => {
                        $('#cliente_complemento').css('border-color', '');
                    }, 3000)
                    return false;
                }
                if (cliente_cidade === '') {
                    Swal.fire({
                        title: "Atenção",
                        text: "O campo CIDADE esta vazio",
                        icon: "warning",
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                    $('#cliente_cidade').css('border-color', 'red');
                    setTimeout(() => {
                        $('#cliente_cidade').css('border-color', '');
                    }, 3000)
                    return false;
                }
                if (cliente_bairro === '') {
                    Swal.fire({
                        title: "Atenção",
                        text: "O campo BAIRRO esta vazio",
                        icon: "warning",
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                    $('#cliente_bairro').css('border-color', 'red');
                    setTimeout(() => {
                        $('#cliente_bairro').css('border-color', '');
                    }, 3000)
                    return false;
                }
                if (cliente_estado === '') {
                    Swal.fire({
                        title: "Atenção",
                        text: "O campo ESTADO esta vazio",
                        icon: "warning",
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                    $('#cliente_estado').css('border-color', 'red');
                    setTimeout(() => {
                        $('#cliente_estado').css('border-color', '');
                    }, 3000)
                    return false;
                }

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
                        text: data.message,
                        icon: data.icon,
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                    window.location.href = data.url;

                }).fail(function(jqXHR, textStatus, data) {
                    Swal.fire({
                        title: "Error",
                        text: jqXHR,
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

            $('#atualizarCliente').on('click', function() {
                event.preventDefault();
                validateInputs();
                let url = '/atualizar-cliente';
                let cliente_whatsapp = $('#cliente_whatsapp').val();
                let cliente_telefone = $('#cliente_telefone').val();
                let cliente_nome = $('#cliente_nome').val();
                let cliente_email = $('#cliente_email').val();
                let cliente_instagram = $('#cliente_instagram').val();
                let cliente_cep = $('#cliente_cep').val();
                let cliente_rua = $('#cliente_rua').val();
                let cliente_numero = $('#cliente_numero').val();
                let cliente_complemento = $('#cliente_complemento').val();
                let cliente_cidade = $('#cliente_cidade').val();
                let cliente_bairro = $('#cliente_bairro').val();
                let cliente_estado = $('#cliente_estado').val();
                let id = $(this).attr("data-id");
                let _token = $('meta[name="csrf-token"]').attr('content');

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
                        id: id,
                        _token: _token
                    }
                }).done(function(data) {
                    Swal.fire({
                        title: data.title,
                        text: data.message,
                        icon: data.icon,
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                    window.location.href = data.url;

                }).fail(function(jqXHR, textStatus, data) {
                    Swal.fire({
                        title: "Error",
                        text: jqXHR,
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

            function validateInputs() {
                var url = '/cadastrar-novo-cliente';
                var cliente_whatsapp = $('#cliente_whatsapp').val();
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

                if (cliente_whatsapp === '') {
                    Swal.fire({
                        title: "Atenção",
                        text: "O campo de WHATS APP esta vazio",
                        icon: "warning",
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                    $('#cliente_whatsapp').css('border-color', 'red');
                    setTimeout(() => {
                        $('#cliente_whatsapp').css('border-color', '');
                    }, 3000)
                    exit();
                }
                if (cliente_telefone === '') {
                    Swal.fire({
                        title: "Atenção",
                        text: "O campo de TELEFONE esta vazio",
                        icon: "warning",
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                    $('#cliente_telefone').css('border-color', 'red');
                    setTimeout(() => {
                        $('#cliente_telefone').css('border-color', '');
                    }, 3000)
                    exit();
                }
                if (cliente_nome === '') {
                    Swal.fire({
                        title: "Atenção",
                        text: "O campo de NOME esta vazio",
                        icon: "warning",
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                    $('#cliente_nome').css('border-color', 'red');
                    setTimeout(() => {
                        $('#cliente_nome').css('border-color', '');
                    }, 3000)
                    exit();
                }
                if (cliente_email === '') {
                    Swal.fire({
                        title: "Atenção",
                        text: "O campo de EMAIL esta vazio",
                        icon: "warning",
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                    $('#cliente_email').css('border-color', 'red');
                    setTimeout(() => {
                        $('#cliente_email').css('border-color', '');
                    }, 3000)
                    exit();
                }
                if (cliente_instagram === '') {
                    Swal.fire({
                        title: "Atenção",
                        text: "O campo INSTAGRAM esta vazio",
                        icon: "warning",
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                    $('#cliente_instagram').css('border-color', 'red');
                    setTimeout(() => {
                        $('#cliente_instagram').css('border-color', '');
                    }, 3000)
                    exit();
                }
                if (cliente_cep === '') {
                    Swal.fire({
                        title: "Atenção",
                        text: "O camp CEP esta vazio",
                        icon: "warning",
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                    $('#cliente_cep').css('border-color', 'red');
                    setTimeout(() => {
                        $('#cliente_cep').css('border-color', '');
                    }, 3000)
                    exit();
                }
                if (cliente_numero === '') {
                    Swal.fire({
                        title: "Atenção",
                        text: "O campo NUMERO esta vazio",
                        icon: "warning",
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                    $('#cliente_numero').css('border-color', 'red');
                    setTimeout(() => {
                        $('#cliente_numero').css('border-color', '');
                    }, 3000)
                    exit();
                }
                if (cliente_complemento === '') {
                    Swal.fire({
                        title: "Atenção",
                        text: "O campo COMPLEMENTO esta vazio",
                        icon: "warning",
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                    $('#cliente_complemento').css('border-color', 'red');
                    setTimeout(() => {
                        $('#cliente_complemento').css('border-color', '');
                    }, 3000)
                    exit();
                }
                if (cliente_cidade === '') {
                    Swal.fire({
                        title: "Atenção",
                        text: "O campo CIDADE esta vazio",
                        icon: "warning",
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                    $('#cliente_cidade').css('border-color', 'red');
                    setTimeout(() => {
                        $('#cliente_cidade').css('border-color', '');
                    }, 3000)
                    exit();
                }
                if (cliente_bairro === '') {
                    Swal.fire({
                        title: "Atenção",
                        text: "O campo BAIRRO esta vazio",
                        icon: "warning",
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                    $('#cliente_bairro').css('border-color', 'red');
                    setTimeout(() => {
                        $('#cliente_bairro').css('border-color', '');
                    }, 3000)
                    exit();
                }
                if (cliente_estado === '') {
                    Swal.fire({
                        title: "Atenção",
                        text: "O campo ESTADO esta vazio",
                        icon: "warning",
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                    $('#cliente_estado').css('border-color', 'red');
                    setTimeout(() => {
                        $('#cliente_estado').css('border-color', '');
                    }, 3000)
                    exit();
                }
            }
        </script>
