@component('componentes.header')

@endcomponent
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="@if (isset($pet)) col-md-8 @else col-md-12 @endif">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Cadastro @Pet</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Nome do Pet</label>
                                        <input type="text" class="form-control" placeholder="Insira o nome do Pet"
                                            name="pet_nome" id="pet_nome" required>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Responsável</label>
                                        <select class="form-control" name="unique_cliente" id="unique_cliente" required>
                                            <option selected disabled>Selecione o Dono do Pet</option>
                                            @foreach ($clientes as $cliente)
                                                <option value="{{ $cliente->unique_cliente }}">{{ $cliente->cliente_nome }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Espécie</label>
                                        <select class="form-control" name="pet_especie" id="pet_especie" required>
                                            <option selected disabled>Espécie</option>
                                            <option value="felino">Felino</option>
                                            <option value="canino">Canino</option>
                                            <option value="outro">Outro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Porte</label>
                                        <select class="form-control" name="pet_porte" id="pet_porte" required>
                                            <option selected disabled>Selecione o porte</option>
                                            <option value="grande">Grande</option>
                                            <option value="medio">Médio</option>
                                            <option value="pequeno">Pequeno</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Raça</label>
                                        {{-- FOREACH E RAÇAS --}}
                                        <select class="form-control" name="pet_raca" id="pet_raca" required>
                                            <option disabled>Selecione uma raça</option>
                                            @foreach ($raca_pet as $raca)
                                                <option value="{{ $raca->id }}">{{ $raca->nome_raca }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Gênero</label>
                                        <select class="form-control" name="pet_genero" id="pet_genero" required>
                                            <option selected disabled>Selecione o gênero</option>
                                            <option value="m">Macho</option>
                                            <option value="f">Fêmea</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Castrado</label>
                                        <select class="form-control" name="pet_castracao" id="pet_castracao" required>
                                            <option selected disabled>Selecione aqui</option>
                                            <option value="s">Sim</option>
                                            <option value="n">Não</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Pelagem</label>
                                        <select class="form-control" name="pet_pelagem" id="pet_pelagem" required>
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
                                        <textarea rows="4" cols="80" class="form-control" name="pet_observacoes"
                                            id="pet_observacoes"
                                            placeholder="Insira uma observação aqui,caso tenha."></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill" id="cadatroPet">Cadastrar</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            @if (isset($pet_dados))
                <div class="col-md-4">
                    <div class="card card-user">
                        <div class="card-image">
                            <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400"
                                alt="...">
                        </div>
                        <div class="card-body">
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
                        </div>
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
            @endif
        </div>
    </div>
</div>
@component('componentes.footer')
@endcomponent

<script>
    $('#cadatroPet').on('click', function() {
        event.preventDefault();
        var url = '/add-novo-pet';
        var pet_nome = $('#pet_nome').val();
        var pet_especie = $('#pet_especie').val();
        var pet_porte = $('#pet_porte').val();
        var pet_raca = $('#pet_raca').val();
        var pet_genero = $('#pet_genero').val();
        var pet_castracao = $('#pet_castracao').val();
        var pet_pelagem = $('#pet_pelagem').val();
        var pet_observacoes = $('#pet_observacoes').val();
        var unique_cliente = $('#unique_cliente').val();
        var _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: url,
            type: "post",
            dataType: "json",
            data: {
                pet_nome: pet_nome,
                pet_especie: pet_especie,
                pet_porte: pet_porte,
                pet_raca: pet_raca,
                pet_genero: pet_genero,
                pet_castracao: pet_castracao,
                pet_pelagem: pet_pelagem,
                pet_observacoes: pet_observacoes,
                unique_cliente:unique_cliente,
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
</script>
