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
                        <h4 class="card-title">Perfil</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Telefone</label>
                                        <input type="text" class="form-control phone" name="telefone" id="telefone"
                                            placeholder="Insira o Telefone" required>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Whats App</label>
                                        <input type="text" class="form-control whatsApp" name="whatsapp" id="whatsapp"
                                            placeholder="Insira o Whats App">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Primeiro Nome</label>
                                        <input type="text" class="form-control" name="nome" id="nome"
                                            placeholder="Insira o nome">
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Sobrenome</label>
                                        <input type="text" class="form-control" id="sobrenome" name="sobrenome"
                                            placeholder="Insira o sobrenome">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>CEP</label>
                                        <input type="text" class="form-control cep" id="cep" name="cep"
                                            placeholder="Insira o CEP">
                                    </div>
                                </div>
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="Insira um email">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Endereço</label>
                                        <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua">
                                    </div>
                                </div>
                                <div class="col-md-2 pr-1">
                                    <div class="form-group">
                                        <label>N°</label>
                                        <input type="text" class="form-control numero" id="numero" name="numero"
                                            placeholder="Numero">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Complemento</label>
                                        <input type="text" class="form-control" id="complemento" name="complemento"
                                            placeholder="Ex:Casa/Apto">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Cidade</label>
                                        <input type="text" class="form-control" id="cidade" name="cidade"
                                            placeholder="Cidade">
                                    </div>
                                </div>
                                <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>Bairro</label>
                                        <input type="text" class="form-control" id="bairro" name="bairro"
                                            placeholder="Bairro">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Estado</label>
                                            <input type="text" class="form-control" id="uf" name="uf"
                                                placeholder="Estado">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>About Me</label>
                                        <textarea rows="4" cols="80" class="form-control"
                                            placeholder="Here can be your description"
                                            value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                                    </div>
                                </div>
                            </div> --}}
                            <button type="button" class="btn btn-info btn-fill pull-right"
                                id="salvarCliente">Cadastrar</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="card-image">
                        <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400"
                            alt="...">
                    </div>
                    {{-- <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="../assets/img/faces/face-3.jpg" alt="...">
                                <h5 class="title">Mike Andrew</h5>
                            </a>
                            <p class="description">
                                michael24
                            </p>
                        </div>
                        <p class="description text-center">
                            "Lamborghini Mercy
                            <br> Your chick she so thirsty
                            <br> I'm in that two seat Lambo"
                        </p>
                    </div> --}}
                    <hr>
                    <div class="button-container mr-auto ml-auto">
                        <button href="#" class="btn btn-simple btn-link btn-icon">
                            <i class="fa fa-facebook-square"></i>
                        </button>
                        <button href="#" class="btn btn-simple btn-link btn-icon">
                            <i class="fa fa-twitter"></i>
                        </button>
                        <button href="#" class="btn btn-simple btn-link btn-icon">
                            <i class="fa fa-google-plus-square"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@component('componentes.footer')
@endcomponent

<script>
    $('.phone').mask('(99) 9999-9999');
    $('.whatsApp').mask('(99) 9 9999-9999');
    $('.numero').mask('99999');
    $('.cep').mask('99-999999');

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
            })
            window.location.href = data.url;

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
