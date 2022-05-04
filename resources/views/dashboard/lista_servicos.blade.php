@component('dashboard.componentes.header')
@endcomponent

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 align-self-center">
                <div style="justify-content:space-between;display: flex;">
                    <h4 class="page-title" id="name_title">
                        Serviços Cadastrados
                    </h4>
                    <a type="button" aria-hidden="true" href="{{ route('cadastroCliente') }}"
                        class="btn btn-success botao-padrao" data-bs-toggle="modal"
                        data-bs-target="#modalCadastroServico">
                        Cadastrar Serviço
                    </a>
                </div>
            </div>
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
                                        <td>{{ $servico->servico_codigo }}</td>
                                        <td>{{ $servico->servico_nome }}</td>
                                        <td>{{ $servico->servico_pet_raca }}</td>
                                        <td>R$ {{ $servico->servico_custo }}</td>
                                        <td>{{ $servico->servico_porcentagem_lucro }}</td>
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

<!-- Modal -->
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
                            <input type="text" class="form-control" name="servico_nome" id="servico_nome">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Raça</label>
                            <select class="form-control" name="servico_pet_raca" id="servico_pet_raca" required>
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
                        <select class="form-control" name="servico_pet_porte" id="servico_pet_porte">
                            <option value="pequeno" selected>Pequeno</option>
                            <option value="medio">Médio</option>
                            <option value="grande">Grande</option>
                        </select>
                    </div>
                    <div class="col-md-2 ">
                        <label>Espécie</label>
                        <select class="form-control" name="servico_especie" id="servico_especie">
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
                            <input type="text" class="form-control codigo" name="servico_codigo" id="servico_codigo"
                                required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Custo Unitário</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">R$</div>
                            </div>
                            <input type="text" class="form-control money2" name="servico_custo" id="servico_custo"
                                required>
                        </div>
                    </div>
                    <div class="col-md-4">

                        <label>Lucro</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control percent" max="100" min="0" name="servico_porcentagem_lucro"
                                id="servico_porcentagem_lucro" required>
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
                            <input type="text" class="form-control money2" name="servico_preco_sugerido" disabled
                                id="servico_preco_sugerido" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Preço de Venda</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">R$</div>
                            </div>
                            <input type="text" class="form-control money2" name="servico_preco_de_venda"
                                id="servico_preco_de_venda" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Lucro</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">R$</div>
                            </div>
                            <input type="text" class="form-control money2" disabled required name="servico_lucro"
                                id="servico_lucro">
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


@component('dashboard.componentes.footer')
@endcomponent

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

    $('.money2').mask('0.000.000,00', {
        reverse: true
    });
    $('.percent').mask('0000', {
        reverse: true
    });
    $('.codigo').mask('AAAAAAAAAAAAAAAAAAA', {
        reverse: true
    });

    $('#adicionarServico').on('click', function(e) {
        e.preventDefault();

        var url = "/cadastrar-servico";
        var servico_nome = $('#servico_nome').val();
        var servico_pet_raca = $('#servico_pet_raca').val();
        var servico_pet_porte = $('#servico_pet_porte').val();
        var servico_codigo = $('#servico_codigo').val();
        var servico_custo = $('#servico_custo').val();
        var servico_especie = $('#servico_especie').val();
        var servico_porcentagem_lucro = $('#servico_porcentagem_lucro').val();
        var servico_preco_de_venda = $('#servico_preco_de_venda').val();
        var servico_lucro = $('#servico_lucro').val();
        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: url,
            method: 'POST',
            dataType: 'JSON',
            data: {
                servico_nome: servico_nome,
                servico_pet_raca: servico_pet_raca,
                servico_pet_porte: servico_pet_porte,
                servico_codigo: servico_codigo,
                servico_custo: servico_custo,
                servico_porcentagem_lucro: servico_porcentagem_lucro,
                servico_preco_de_venda: servico_preco_de_venda,
                servico_lucro: servico_lucro,
                servico_especie: servico_especie,
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

    $('#servico_porcentagem_lucro').on('keyup', function() {
        var custo = $('#servico_custo').val();
        custo = custo.replace(".", "").replace(",", ".")
        var porcentagem = parseFloat($('#servico_porcentagem_lucro').val()) / 100;
        var precoSugeridoServico = Math.floor(custo * porcentagem) + parseFloat(custo);

        if (!custo) {
            return false;
        } else {
            $('#servico_preco_sugerido').val(precoSugeridoServico);
            $('#servico_preco_de_venda').val(precoSugeridoServico);

            var precoDeVenda = $('#servico_preco_sugerido').val();
            var custoUnitario = $('#servico_custo').val();

            var lucroServico = (parseFloat(precoDeVenda) - parseFloat(custoUnitario)).toFixed(2);
            $('#servico_lucro').val(lucroServico);
        }
    });

    $('#servico_lucro').on('keyup', function() {
        var custo = $('#servico_custo').val();
        custo = custo.replace(".", "").replace(",", ".")
        var porcentagem = parseFloat($('#servico_porcentagem_lucro').val()) / 100;
        var precoSugeridoServico = Math.floor(custo * porcentagem) + parseFloat(custo);

        if (!porcentagem) {
            return false;
        } else {
            $('#servico_preco_sugerido').val(precoSugeridoServico);
            $('#servico_preco_de_venda').val(precoSugeridoServico);

            var precoDeVenda = $('#servico_preco_sugerido').val();
            var custoUnitario = $('#servico_custo').val();

            var lucroServico = (parseFloat(precoDeVenda) - parseFloat(custoUnitario)).toFixed(2);
            $('#servico_lucro').val(lucroServico);
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
            $('#servico_nome').val(data.dados.servico_nome);
            $('#servico_pet_raca').val(data.dados.servico_pet_raca);
            $('#servico_pet_porte').val(data.dados.servico_pet_porte);
            $('#servico_codigo').val(data.dados.servico_codigo);
            $('#servico_custo').val(data.dados.servico_custo);
            $('#servico_porcentagem_lucro').val(data.dados.servico_porcentagem_lucro);
            $('#servico_preco_de_venda').val(data.dados.servico_preco_de_venda);
            $('#servico_lucro').val(data.dados.servico_lucro);
            $('#modalCadastroServico').modal('show');

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
