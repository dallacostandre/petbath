@extends('layouts.app')
@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 align-self-center">
                <div style="justify-content:space-between;display: flex;">
                    <h4 class="page-title" id="name_title">
                        Serviços Cadastrados
                    </h4>
                    <a type="button" aria-hidden="true" 
                        class="btn btn-success botao-padrao" data-bs-toggle="modal"
                        data-bs-target="#modalCadastroServico">
                        Cadastrar
                    </a>
                </div>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard.index')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Serviços</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="container pt-4">
                        <input class="form-control" type="text" id="myInput" onkeyup="pesquisarPor()"
                            placeholder="Pesquise pelo produto...">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover text-center" id="servicosTable">
                            <thead>
                                <th>Cod. Serviço</th>
                                <th>Nome Serviço</th>
                                <th>Raça</th>
                                <th>Custo Unit.</th>
                                <th>% de Lucro</th>
                                <th>Preço Venda</th>
                                <th>Lucro Estimado</th>
                                <th>Ações</th>
                            </thead>
                            <tbody>
                                @foreach ($servicos as $servico)
                                    <tr class="text-center">
                                        <td>{{ $servico->servico_codigo == null ? ' - ' : $servico->servico_codigo }}
                                        <td>{{ $servico->servico_nome }}</td>
                                        <td>{{ $servico->servico_pet_raca }}</td>
                                        <td>R$ {{ $servico->servico_custo }}</td>
                                        <td>{{ $servico->servico_porcentagem_lucro }}%</td>
                                        <td>R$ {{ $servico->servico_preco_de_venda }}</td>
                                        <td>R$ {{ $servico->servico_lucro }}</td>
                                        <td>
                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                data-id={{ $servico->id }} class="visualizarModalServico"
                                                title="Editar Servico">
                                                <i class="fas fa-user-edit"></i>
                                            </a> &nbsp;&nbsp;
                                            <a href="#" class="excluirServico" data-toggle="tooltip"
                                                data-id={{ $servico->id }} data-placement="top"
                                                title="Excluir Servico">
                                                <i class="fad fa-trash"></i>
                                            </a>&nbsp;&nbsp;
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $servicos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Cadastrar-->
<div class="modal fade" id="modalCadastroServico" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dados do serviço</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nome Serviço</label>
                            <input type="text" class="form-control" name="cadastrar_servico_nome" id="cadastrar_servico_nome">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Raça</label>
                            <select class="form-control" name="cadastrar_servico_pet_raca" id="cadastrar_servico_pet_raca" required>
                                <option disabled>Selecione uma raça</option>
                                @foreach ($raca_pet as $raca)
                                    @if ($raca->pet_especie == 1)
                                        <option value="{{ $raca->nome_raca }}">{{ $raca->nome_raca }}</option>
                                    @endif
                                @endforeach
                                <option disabled>Felinos</option>
                                @foreach ($raca_pet as $raca)
                                    @if ($raca->pet_especie == 0)
                                        <option value="{{ $raca->nome_raca }}">{{ $raca->nome_raca }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 ">
                        <label>Porte</label>
                        <select class="form-control" name="cadastrar_servico_pet_porte" id="cadastrar_servico_pet_porte">
                            <option value="pequeno" selected>Pequeno</option>
                            <option value="medio">Médio</option>
                            <option value="grande">Grande</option>
                        </select>
                    </div>
                    <div class="col-md-2 ">
                        <label>Espécie</label>
                        <select class="form-control" name="cadastrar_servico_especie" id="cadastrar_servico_especie">
                            <option value="felino">Felino</option>
                            <option value="canino">Canino</option>
                            <option value="outro">Outro</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Codigo do Serviço</label>
                            <input type="text" class="form-control codigo" name="cadastrar_servico_codigo" id="cadastrar_servico_codigo"
                                required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Custo Unitário</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">R$</div>
                            </div>
                            <input type="text" class="form-control money" name="cadastrar_servico_custo" id="cadastrar_servico_custo"
                                required>
                        </div>
                    </div>
                    <div class="col-md-4">

                        <label>Lucro (porcentagem)</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control percent" max="100" min="0" name="cadastrar_servico_porcentagem_lucro"
                                id="cadastrar_servico_porcentagem_lucro" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Preço Sugerido</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">R$</div>
                            </div>
                            <input type="text" class="form-control money" name="cadastrar_servico_preco_sugerido" disabled
                                id="cadastrar_servico_preco_sugerido" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Preço de Venda</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">R$</div>
                            </div>
                            <input type="text" class="form-control money" name="cadastrar_servico_preco_de_venda"
                                id="cadastrar_servico_preco_de_venda" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Lucro (em reais)</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">R$</div>
                            </div>
                            <input type="text" class="form-control money" disabled required name="cadastrar_servico_lucro"
                                id="cadastrar_servico_lucro">
                        </div>
                        <small class="form-text text-muted">Lucro estimado sem taxas e
                            impostos.
                        </small>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success botao-padrao float-end" id="adicionarServico">
                    Cadastrar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar -->
<div class="modal fade" id="modalEditarServico" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dados do serviço</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nome Serviço</label>
                            <input type="text" class="form-control" name="editar_servico_nome" id="editar_servico_nome">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Raça</label>
                            <select class="form-control" name="editar_servico_pet_raca" id="editar_servico_pet_raca" required>
                                <option disabled>Selecione uma raça</option>
                                @foreach ($raca_pet as $raca)
                                    @if ($raca->pet_especie == 1)
                                        <option value="{{ $raca->nome_raca }}">{{ $raca->nome_raca }}</option>
                                    @endif
                                @endforeach
                                <option disabled>Felinos</option>
                                @foreach ($raca_pet as $raca)
                                    @if ($raca->pet_especie == 0)
                                        <option value="{{ $raca->nome_raca }}">{{ $raca->nome_raca }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 ">
                        <label>Porte</label>
                        <select class="form-control" name="editar_servico_pet_porte" id="editar_servico_pet_porte">
                            <option value="pequeno" selected>Pequeno</option>
                            <option value="medio">Médio</option>
                            <option value="grande">Grande</option>
                        </select>
                    </div>
                    <div class="col-md-2 ">
                        <label>Espécie</label>
                        <select class="form-control" name="editar_servico_especie" id="editar_servico_especie">
                            <option value="felino">Felino</option>
                            <option value="canino">Canino</option>
                            <option value="outro">Outro</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Codigo do Serviço</label>
                            <input type="text" class="form-control codigo" name="editar_servico_codigo" id="editar_servico_codigo"
                                required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Custo Unitário</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">R$</div>
                            </div>
                            <input type="text" class="form-control money" name="editar_servico_custo" id="editar_servico_custo"
                                required>
                        </div>
                    </div>
                    <div class="col-md-4">

                        <label>Lucro</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control percent" max="100" min="0" name="editar_servico_porcentagem_lucro"
                                id="editar_servico_porcentagem_lucro" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Preço Sugerido</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">R$</div>
                            </div>
                            <input type="text" class="form-control money" name="editar_servico_preco_sugerido" disabled
                                id="editar_servico_preco_sugerido" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Preço de Venda</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">R$</div>
                            </div>
                            <input type="text" class="form-control money" name="editar_servico_preco_de_venda"
                                id="editar_servico_preco_de_venda" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Lucro</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">R$</div>
                            </div>
                            <input type="text" class="form-control money" disabled required name="editar_servico_lucro"
                                id="editar_servico_lucro">
                        </div>
                        <small class="form-text text-muted">Lucro estimado sem taxas e
                            impostos.
                        </small>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success botao-padrao float-end" id="atualizarServico" data-id="">
                    Salvar
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scriptExtras')
<script>
    $(document).ready(function() {
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    });

    function pesquisarPor() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("servicosTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }


    $('.percent').mask('0000', {
        reverse: true
    });
    $('.codigo').mask('AAAAAAAAAAAAAAAAAAA', {
        reverse: true
    });



    $('#adicionarServico').on('click', function(e) {
        e.preventDefault();
        var url = "/cadastrar-servico";
        var cadastrar_servico_nome = $('#cadastrar_servico_nome').val();
        var cadastrar_servico_pet_raca = $('#cadastrar_servico_pet_raca').val();
        var cadastrar_servico_pet_porte = $('#cadastrar_servico_pet_porte').val();
        var cadastrar_servico_especie = $('#cadastrar_servico_especie').val();
        var cadastrar_servico_codigo = $('#cadastrar_servico_codigo').val();
        var cadastrar_servico_custo = $('#cadastrar_servico_custo').val();
        var cadastrar_servico_porcentagem_lucro = $('#cadastrar_servico_porcentagem_lucro').val();
        var cadastrar_servico_preco_de_venda = $('#cadastrar_servico_preco_de_venda').val();
        var cadastrar_servico_lucro = $('#cadastrar_servico_lucro').val();
        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: url,
            method: 'POST',
            dataType: 'JSON',
            data: {
                servico_nome: cadastrar_servico_nome,
                servico_pet_raca: cadastrar_servico_pet_raca,
                servico_pet_porte: cadastrar_servico_pet_porte,
                servico_codigo: cadastrar_servico_codigo,
                servico_custo: cadastrar_servico_custo,
                servico_porcentagem_lucro: cadastrar_servico_porcentagem_lucro,
                servico_preco_de_venda: cadastrar_servico_preco_de_venda,
                servico_lucro: cadastrar_servico_lucro,
                servico_especie: cadastrar_servico_especie,
                _token: token
            },
            success: function(data) {
                Swal.fire({
                    title: data.title,
                    text: data.text,
                    icon: data.icon,
                    button: "Ótimo!",
                });
                if (data.code == '200') {
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                }
            },
            error: function(data) {
                Swal.fire({
                    icon: 'error',
                    title: 'Atenção',
                    text: 'Não foi possível adicionar o serviço!',
                    button: "Voltar",
                });
            }
        });
    });

    $('.excluirServico').on('click', function(e) {
        e.preventDefault();

        var url = "/excluir-servico";
        var idProduto = $(this).data('id');
        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: url,
            method: 'DELETE',
            dataType: 'JSON',
            data: {
                id: idProduto,
                _token: token
            },
            success: function(data) {
                Swal.fire({
                    title: data.title,
                    text: data.text,
                    icon: data.icon,
                });
                setTimeout(function() {
                    location.reload();
                }, 1000);
            },
            error: function(data) {
                Swal.fire({
                    icon: 'error',
                    title: 'Atenção',
                    text: 'Não foi possível excluir o serviço',
                });
            }
        });
    });

    $('#cadastrar_servico_custo').on('keyup', function() {
        var custo = $('#cadastrar_servico_custo').val();
        custo = custo.replace(".", "").replace(",", ".")
        var porcentagem = parseFloat($('#cadastrar_servico_porcentagem_lucro').val()) / 100;
        var precoSugeridoServico = Math.floor(custo * porcentagem) + parseFloat(custo);

        if (!custo) {
            return false;
        } else {
            $('#cadastrar_servico_preco_sugerido').val(precoSugeridoServico);
            $('#cadastrar_servico_preco_de_venda').val(precoSugeridoServico);

            var precoDeVenda = $('#cadastrar_servico_preco_sugerido').val();
            var custoUnitario = $('#cadastrar_servico_custo').val();

            var lucroServico = (parseFloat(precoDeVenda) - parseFloat(custoUnitario)).toFixed(2);
            $('#cadastrar_servico_lucro').val(lucroServico);
        }
    });

    $('#cadastrar_servico_porcentagem_lucro').on('keyup', function() {
        var custo = $('#cadastrar_servico_custo').val();
        custo = custo.replace(".", "").replace(",", ".")
        var porcentagem = parseFloat($('#cadastrar_servico_porcentagem_lucro').val()) / 100;
        var precoSugeridoServico = Math.floor(custo * porcentagem) + parseFloat(custo);

        if (!porcentagem) {
            return false;
        } else {
            $('#cadastrar_servico_preco_sugerido').val(precoSugeridoServico);
            $('#cadastrar_servico_preco_de_venda').val(precoSugeridoServico);

            var precoDeVenda = $('#cadastrar_servico_preco_sugerido').val();
            var custoUnitario = $('#cadastrar_servico_custo').val();

            var lucroServico = (parseFloat(precoDeVenda) - parseFloat(custoUnitario)).toFixed(2);
            $('#cadastrar_servico_lucro').val(lucroServico);
        }
    });



    $('.visualizarModalServico').on('click', function() {
        var id = $(this).data('id');
        var url = '/visualizar-dados-servico';
        var _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            data: {
                id: id,
                _token: _token
            }
        }).done(function(data) {
            $('#editar_servico_nome').val(data.dados.servico_nome);
            $('#editar_servico_pet_raca').val(data.dados.servico_pet_raca);
            $('#editar_servico_pet_porte').val(data.dados.servico_pet_porte);
            $('#editar_servico_codigo').val(data.dados.servico_codigo);
            $('#editar_servico_custo').val(data.dados.servico_custo);
            $('#editar_servico_porcentagem_lucro').val(data.dados.servico_porcentagem_lucro);
            $('#editar_servico_preco_de_venda').val(data.dados.servico_preco_de_venda);
            $('#editar_servico_lucro').val(data.dados.servico_lucro);
            $('#editar_servico_preco_sugerido').val(data.dados.servico_preco_de_venda);
            $('#atualizarServico').attr('data-id', id);
            $('#modalEditarServico').modal('show');

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

    $('#atualizarServico').on('click', function(e) {
        e.preventDefault();
        var url = "/atualizar-servico";
        var id = $(this).data('id');
        var editar_servico_nome = $('#editar_servico_nome').val();
        var editar_servico_pet_raca = $('#editar_servico_pet_raca').val();
        var editar_servico_pet_porte = $('#editar_servico_pet_porte').val();
        var editar_servico_codigo = $('#editar_servico_codigo').val();
        var editar_servico_custo = $('#editar_servico_custo').val();
        var editar_servico_especie = $('#editar_servico_especie').val();
        var editar_servico_porcentagem_lucro = $('#editar_servico_porcentagem_lucro').val();
        var editar_servico_preco_de_venda = $('#editar_servico_preco_de_venda').val();
        var editar_servico_lucro = $('#editar_servico_lucro').val();
        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: url,
            method: 'POST',
            dataType: 'JSON',
            data: {
                id:id,
                servico_nome: editar_servico_nome,
                servico_pet_raca: editar_servico_pet_raca,
                servico_pet_porte: editar_servico_pet_porte,
                servico_codigo: editar_servico_codigo,
                servico_custo: editar_servico_custo,
                servico_porcentagem_lucro: editar_servico_porcentagem_lucro,
                servico_preco_de_venda: editar_servico_preco_de_venda,
                servico_lucro: editar_servico_lucro,
                servico_especie: editar_servico_especie,
                _token: token
            },
            success: function(data) {
                Swal.fire({
                    title: data.title,
                    text: data.text,
                    icon: data.icon,
                    button: "Ótimo!",
                });
                if (data.code == '200') {
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                }
            },
            error: function(data) {
                Swal.fire({
                    icon: 'error',
                    title: 'Atenção',
                    text: 'Não foi possível adicionar o serviço!',
                    button: "Voltar",
                });
            }
        });
    });

    $('#editar_servico_porcentagem_lucro').on('keyup', function() {
        var custo = $('#editar_servico_custo').val();
        custo = custo.replace(".", "").replace(",", ".")
        var porcentagem = parseFloat($('#editar_servico_porcentagem_lucro').val()) / 100;
        var precoSugeridoServico = Math.floor(custo * porcentagem) + parseFloat(custo);

        if (!custo) {
            return false;
        } else {
            $('#editar_servico_preco_sugerido').val(precoSugeridoServico);
            $('#editar_servico_preco_de_venda').val(precoSugeridoServico);

            var precoDeVenda = $('#editar_servico_preco_sugerido').val();
            var custoUnitario = $('#editar_servico_custo').val();

            var lucroServico = (parseFloat(precoDeVenda) - parseFloat(custoUnitario)).toFixed(2);
            $('#editar_servico_lucro').val(lucroServico);
        }
    });

    $('#editar_servico_lucro').on('keyup', function() {
        var custo = $('#editar_servico_custo').val();
        custo = custo.replace(".", "").replace(",", ".")
        var porcentagem = parseFloat($('#editar_servico_porcentagem_lucro').val()) / 100;
        var precoSugeridoServico = Math.floor(custo * porcentagem) + parseFloat(custo);

        if (!porcentagem) {
            return false;
        } else {
            $('#editar_servico_preco_sugerido').val(precoSugeridoServico);
            $('#editar_servico_preco_de_venda').val(precoSugeridoServico);

            var precoDeVenda = $('#editar_servico_preco_sugerido').val();
            var custoUnitario = $('#editar_servico_custo').val();

            var lucroServico = (parseFloat(precoDeVenda) - parseFloat(custoUnitario)).toFixed(2);
            $('#editar_servico_lucro').val(lucroServico);
        }
    });

</script>
@endsection
