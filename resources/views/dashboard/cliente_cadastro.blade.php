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
            <div class="accordion" id="accordionExample">
                @if (isset($cliente))
                    <form action="{{ route('updateCliente', ['id' => $cliente->id]) }}" method="POST">
                    @else
                        <form action="{{ route('cadastrarNovoCliente') }}" method="POST">
                @endif
                @csrf
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Cadastro Cliente
                        </button>
                    </h2>
                    @if (session()->has('message'))
                        <div class="alert alert-primary" id="success-alert"role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="whatsapp">Whats App</label>
                                                <input type="text" class="form-control whatsApp" name="cliente_whatsapp"
                                                    id="whatsapp" value="@if (isset($cliente)) {{ $cliente->cliente_whatsapp }} @endif"
                                                    @error('cliente_whatsapp') is-invalid @enderror">
                                                @error('cliente_whatsapp')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="telefone">Telefone</label>
                                                <input type="text" class="form-control phone" name="cliente_telefone"
                                                    id="telefone" value="@if (isset($cliente)) {{ $cliente->cliente_telefone }} @endif"
                                                    @error('cliente_telefone') is-invalid @enderror">
                                                @error('cliente_telefone')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nome Completo</label>
                                                <input type="text" class="form-control" name="cliente_nome"
                                                    id="cliente_nome" value="@if (isset($cliente)) {{ $cliente->cliente_nome }} @endif"
                                                    @error('cliente_nome') is-invalid @enderror">
                                                @error('cliente_nome')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" id="email"
                                                    name="cliente_email" value="@if (isset($cliente)) {{ $cliente->cliente_email }} @endif"
                                                    @error('cliente_email') is-invalid @enderror">
                                                @error('cliente_email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Instagram</label>
                                                <input type="text" class="form-control" id="cliente_instagram"
                                                    name="cliente_instagram" value="@if (isset($cliente)) {{ $cliente->cliente_instagram }} @endif">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>CEP</label>
                                                <input type="text" class="form-control cep" id="cep" name="cliente_cep"
                                                    value="@if (isset($endereco)) {{ $endereco->cliente_cep }} @endif" @error('cliente_cep') is-invalid
                                                    @enderror">
                                                @error('cliente_cep')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Endereço</label>
                                                <input type="text" class="form-control" id="rua" name="cliente_rua"
                                                    value="@if (isset($endereco)) {{ $endereco->cliente_rua }} @endif" @error('cliente_rua') is-invalid
                                                    @enderror">
                                                @error('cliente_rua')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>N°</label>
                                                <input type="text" class="form-control numero" id="numero"
                                                    name="cliente_numero" value="@if (isset($endereco)) {{ $endereco->cliente_numero }} @endif"
                                                    @error('cliente_numero') is-invalid @enderror">
                                                @error('cliente_numero')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Complemento</label>
                                                <input type="text" class="form-control" id="complemento"
                                                    name="cliente_complemento" value="@if (isset($endereco)) {{ $endereco->cliente_complemento }} @endif"
                                                    @error('cliente_complemento') is-invalid @enderror">
                                                @error('cliente_complemento')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Cidade</label>
                                                <input type="text" class="form-control" id="cidade"
                                                    name="cliente_cidade" value="@if (isset($endereco)) {{ $endereco->cliente_cidade }} @endif"
                                                    @error('cliente_cidade') is-invalid @enderror">
                                                @error('cliente_cidade')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Bairro</label>
                                                <input type="text" class="form-control" id="bairro"
                                                    name="cliente_bairro" value="@if (isset($endereco)) {{ $endereco->cliente_bairro }} @endif"
                                                    @error('cliente_bairro') is-invalid @enderror">
                                                @error('cliente_bairro')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Estado</label>
                                                <input type="text" class="form-control uf" id="uf" name="cliente_estado"
                                                    value="@if (isset($endereco)) {{ $endereco->cliente_estado }} @endif" @error('cliente_estado')
                                                    is-invalid @enderror">
                                                @error('cliente_estado')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div style="float:right">
                                        @if (isset($cliente))
                                            <button class="btn btn-success botao-padrao" type="submit"
                                                aria-expanded="false">
                                                Atualizar
                                            </button>
                                        @else
                                            <button class="btn btn-success botao-padrao" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                Avancar
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (isset($cliente))
                @else
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Cadastro Pet
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row" style="display: flex">
                                    <div class="col-md-12">
                                        <div class="card card-user">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Nome do Pet</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Insira o nome do Pet" name="pet_nome"
                                                                id="pet_nome" value="@if (isset($pet_dados)) {{ $pet_dados->pet_nome }} @endif"
                                                                @error('pet_nome') is-invalid @enderror">
                                                            @error('pet_nome')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
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
                                                            {{-- FOREACH E RAÇAS --}}
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
                                                                <option selected disabled>Selecione o gênero
                                                                </option>
                                                                <option value="m">Macho</option>
                                                                <option value="f">Fêmea</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Pelagem</label>
                                                            <select class="form-control" name="pet_pelagem"
                                                                id="pet_pelagem">
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
                                                            <textarea rows="4" cols="80" class="form-control"
                                                                name="pet_observacoes" id="pet_observacoes"
                                                                placeholder="Insira uma observação aqui,caso tenha."></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="float:right" class="ms-1">
                                            <button type="submit" class="btn btn-success botao-padrao">
                                                Finalizar
                                            </button>
                                        </div>
                                        <div style="float:right">
                                            <button type="button" class="btn btn-success botao-padrao"
                                                id="salvarAgendarCliente">
                                                Salvar e Agendar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                </form>
            </div>
        </div>
        @component('dashboard.componentes.footer')@endcomponent

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
