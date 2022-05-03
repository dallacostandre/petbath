@component('dashboard.componentes.header')
@endcomponent
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 align-self-center">
                <div style="justify-content:space-between;display: flex;">
                    <h4 class="page-title" id="name_title">
                        {{ 'Pets de ' . $objCliente->cliente_nome }}
                    </h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        Adicionar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="nav-profile-tab" id="nav-profile">
                <div class="card">
                    <div class="card-body">
                        @if (!$objPets->isEmpty())
                            <table class="table table-striped" id="table">
                                <thead>
                                    <th>Pet</th>
                                    <th>Espécie</th>
                                    <th>Porte</th>
                                    <th>Raça</th>
                                    <th>Sexo</th>
                                    <th>Pelagem</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody>
                                    @foreach ($objPets as $pet)
                                        <tr class="objPets">
                                            <td>{{ $pet->pet_nome }}</td>
                                            <td>{{ $pet->pet_especie }}</td>
                                            <td>{{ $pet->pet_porte }}</td>
                                            <td>{{ $pet->pet_raca }}</td>
                                            <td>{{ $pet->pet_genero == 'f' ? 'Fêmea' : 'Macho' }}</td>
                                            <td>{{ ucfirst($pet->pet_pelagem) }}</td>
                                            <td>
                                                <a class="visualizarModalPet" id="{{ $pet->id }}"
                                                    data-toggle="tooltip" data-placement="top" title="Editar Pet">
                                                    <i class="fas fa-user-edit"></i></a> &nbsp;&nbsp;
                                                <a class="excluirPet" id="{{ $pet->id }}" data-toggle="tooltip"
                                                    data-placement="top" title="Excluir Pet">
                                                    <i class="fad fa-trash"></i>
                                                </a>&nbsp;&nbsp;
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $objPets->links() }}
                        @else
                            <h3>Nenhum pet cadastrado.</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Cadastro Pet</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nome do Pet</label>
                                    <input required type="text" class="form-control"
                                        placeholder="Insira o nome do Pet" name="pet_nome" id="pet_nome">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Espécie</label>
                                    <select class="form-control" name="pet_especie" id="pet_especie">
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
                                    <select class="form-control" name="pet_porte" id="pet_porte">
                                        <option selected disabled>Selecione o porte</option>
                                        <option value="grande">Grande</option>
                                        <option value="médio">Médio</option>
                                        <option value="pequeno">Pequeno</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Raça</label>
                                    <select class="form-control" name="pet_raca" id="pet_raca">
                                        <option disabled>Selecione uma raça</option>
                                        @foreach ($raca_pet as $raca)
                                            <option value="{{ $raca->nome_raca }}">
                                                {{ $raca->nome_raca }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sexo</label>
                                    <select class="form-control" name="pet_genero" id="pet_genero">
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
                                    <textarea rows="4" cols="80" class="form-control" name="pet_observacoes" id="pet_observacoes"
                                        placeholder="Insira uma observação aqui,caso tenha."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close_modal">
                            Cancelar
                        </button>
                        <div class="cadastrar">
                            <button type="button" class="btn btn-success botao-padrao" data-id="{{ $uniqueCliente }}"
                                id="cadastrar">
                                Cadastrar
                            </button>
                            <button type="button" class="btn btn-success botao-padrao">
                                Salvar e Agendar
                            </button>
                        </div>
                        <div class="atualizarPet">
                            <button type="button" class="btn btn-success botao-padrao" data-id="" id="atualizarPet">
                                Salvar
                            </button>
                            <button type="button" class="btn btn-success botao-padrao">
                                Salvar e Agendar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @component('dashboard.componentes.footer')
        @endcomponent

        <script>
            $(document).ready(function() {
                if ($('#table').length == 0) {
                    $('#staticBackdrop').modal('show');
                }
                $('.atualizarPet').hide();
            });

            $('#cadastrar').on('click', function() {
                $("#close_modal").trigger('click');
                event.preventDefault();
                var uniqueIdCliente = $(this).attr('data-id');
                var url = '/cadastrar-novo-pet';
                var pet_nome = $('#pet_nome').val();
                var pet_especie = $('#pet_especie').val();
                var pet_porte = $('#pet_porte').val();
                var pet_raca = $('#pet_raca').val();
                var pet_genero = $('#pet_genero').val();
                var pet_pelagem = $('#pet_pelagem').val();
                var pet_observacoes = $('#pet_observacoes').val();
                var _token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: url,
                    type: "post",
                    dataType: "json",
                    data: {
                        uniqueIdCliente: uniqueIdCliente,
                        pet_nome: pet_nome,
                        pet_especie: pet_especie,
                        pet_porte: pet_porte,
                        pet_raca: pet_raca,
                        pet_genero: pet_genero,
                        pet_pelagem: pet_pelagem,
                        pet_observacoes: pet_observacoes,
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
                    location.reload();

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

            $('.excluirPet').on('click', function() {
                var id = $(this).attr('id');
                var url = '/excluir-pet';
                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: url,
                    type: "delete",
                    dataType: "json",
                    data: {
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
                    location.reload();
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
            })

            $('.visualizarModalPet').on('click', function() {
                var id = $(this).attr('id');
                $('.cadastrar').hide();
                $('.atualizarPet').show();
                var url = '/visualizar-dados-pet';
                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: url,
                    type: "post",
                    dataType: "json",
                    data: {
                        id: id,
                        _token: _token
                    }
                }).done(function(data) {
                    $('#pet_nome').val(data.dados.pet_nome);
                    $('#pet_especie').val(data.dados.pet_especie);
                    $('#pet_porte').val(data.dados.pet_porte);
                    $('#pet_raca').val(data.dados.pet_raca);
                    $('#pet_genero').val(data.dados.pet_genero);
                    $('#pet_pelagem').val(data.dados.pet_pelagem);
                    $('#pet_observacoes').val(data.dados.pet_observacoes);
                    $('#atualizarPet').attr('data-id', data.dados.pet_id);
                    $('#staticBackdrop').modal('show');

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

            $('#atualizarPet').on('click', function() {
                $("#close_modal").trigger('click');
                event.preventDefault();
                var id_pet = $(this).attr('data-id');
                var url = '/atualizar-pet';
                var pet_nome = $('#pet_nome').val();
                var pet_especie = $('#pet_especie').val();
                var pet_porte = $('#pet_porte').val();
                var pet_raca = $('#pet_raca').val();
                var pet_genero = $('#pet_genero').val();
                var pet_pelagem = $('#pet_pelagem').val();
                var pet_observacoes = $('#pet_observacoes').val();
                var _token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: url,
                    type: "post",
                    dataType: "json",
                    data: {
                        id_pet: id_pet,
                        pet_nome: pet_nome,
                        pet_especie: pet_especie,
                        pet_porte: pet_porte,
                        pet_raca: pet_raca,
                        pet_genero: pet_genero,
                        pet_pelagem: pet_pelagem,
                        pet_observacoes: pet_observacoes,
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
                    location.reload();

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
        </script>
