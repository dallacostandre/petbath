@extends('layouts.app')
@section('cssExtras')
    <style>
        
    </style>
@endsection
@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-9 align-self-center">
                    <h4 class="page-title">{{ $titulo }}</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('financeiro.index') }}">Financeiro</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $titulo }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="col col-3 botao-padrao-topo">
                    <div style="display: flex; justify-content:flex-end;">
                        <div style="margin-right: 0.25rem">
                            <button class="btn btn-success botao-padrao float-end" type="button" data-bs-toggle="modal"
                                data-bs-target="#modal2">
                                Filtrar
                            </button>
                        </div>
                        <div>
                            <button class="btn btn-success botao-padrao float-end" type="button" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Novo Lançamento
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <th>Data Previsão</th>
                                    <th>Descrição</th>
                                    <th>Forma de Pagamento</th>
                                    <th>Parcela</th>
                                    <th>Natureza</th>
                                    <th>Valor</th>
                                    <th>Ação</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>10/03/2022</td>
                                        <td>
                                            <a href="{{ route('lancamentos.show') }}">Descrição Lançamento</a>
                                        </td>
                                        <td>Pagamento rerefente ao fornecedor Xx</td>
                                        <td>Débito</td>
                                        <td>1x</td>
                                        <td>R$300,00</td>
                                        <td>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Remover">
                                                <i class="fas fa-exchange-alt"></i></a>&nbsp;&nbsp;
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Alterar">
                                                <i class="fad fa-trash"></i>
                                            </a>
                                            &nbsp;&nbsp;
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Novo Lançamento -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Lançamento</h5>
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <form id="form1">
                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off"
                                    checked value="1">
                                <label class="btn btn-outline-primary" for="btnradio1">Receita</label>
                                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off"
                                    value="2">
                                <label class="btn btn-outline-primary" for="btnradio2">Despesa</label>
                            </form>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="col col-12 mb-3">
                            <label>Descrição</label>
                            <input class="form-control form-control" type="text" id="lancamento_descricao">
                        </div>
                        <div class="col col-12 mb-3" style="display: flex; justify-content:space-between;">
                            <div class="col col-5">
                                <label>Pagamento/Recebimento</label>
                                <select class="form-select" id="lancamento_tipo_recebimento_pagamento">
                                    <option value="dinheiro">Dinheiro</option>
                                    <option value="credito">Cartão de Crédito</option>
                                    <option value="debito">Cartão de Débito</option>
                                    <option value="pix">Pix</option>
                                    <option value="boleto">Boleto</option>
                                    <option value="transferência">Transfêrencia</option>
                                    <option value="link-de-pagamento">Link de Pagamento</option>
                                    <option value="outro">Outro</option>
                                </select>
                            </div>
                            <div class="col col-6">
                                <label>Valor Final</label>
                                <input class="form-control form-control money" type="text" id="lancamento_valor_previsto">
                            </div>
                        </div>
                        <div class="col col-12 mb-3" style="display: flex; justify-content:space-between;">
                            <div class="col col-5">
                                <label>Data Prevista</label>
                                <div class="mb-3">
                                    <input class="form-control form-control" type="date" id="lancamento_data_prevista">
                                </div>
                            </div>
                            <div class="col col-6">
                                <label>Categoria</label>
                                <div class="mb-3">
                                    <input class="form-control form-control" type="text" id="lancamento_categoria">
                                </div>
                            </div>
                        </div>
                        <div class="col col-12 mb-3">
                            <label>Recorrência</label>
                            <div class="mb-3">
                                <form id="form2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadio" id="nao_repete"
                                            checked value="0">
                                        <label class=" form-check-label" for="nao_repete">Não, há recorrência.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadio" id="repete" value="1">
                                        <label class=" form-check-label" for="repete">Sim, há recorrências.</label>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col col-12 mb-3" style="display: flex; justify-content:space-between;">
                            <div class="col col-5">
                                <div class="mb-3 repeticao_div" style="display:none">
                                    <label>Frequência</label>
                                    <select class="form-select" id="lancamento_periodo">
                                        <option disabled selected>Selecione</option>
                                        <option value="1">Semanal</option>
                                        <option value="2">Mensal</option>
                                        <option value="3">Semestral</option>
                                        <option value="4">Anual</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="mb-3 repeticao_div" style="display:none">
                                    <label>Parcelas</label>
                                    <input class="form-control form-control number" name="lancamento_parcela"
                                        id="lancamento_parcela" type="number" id="lancamento_parcela">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success botao-padrao float-end" id="adicionarLancamento">
                            Adicionar
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Filtrar -->
        <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Filtrar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div class="mb-2">
                                <label>Filtrar por valor</label>
                                <input class="form-control form-control money" type="text">
                            </div>
                            <div class="mb-2">
                                <label>Filtrar por forma de entrada</label>
                                <select class="form-select">
                                    <option value="1">Pix</option>
                                    <option value="2">Débito</option>
                                    <option value="3">Crédito</option>
                                    <option value="3">Dinheiro</option>
                                </select>
                            </div>
                            <div class="col col-12 mb-3">
                                <label>Filtrar por data</label>
                                <div class="mb-3">
                                    <input class="form-control form-control" type="date" id="lancamento_data_prevista">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success botao-padrao float-end" id="adicionarLancamento">
                            Pesquisar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scriptExtras')
        <script>
            $(document).ready(function() {
                $('.money').mask("000.000,00", {
                    reverse: true
                });
                $('#lancamento_valor_previsto').val('0,00');
                $('.number').mask("0000");
                document.getElementById('lancamento_data_prevista').valueAsDate = new Date();

                $(function() {
                    $('[data-toggle="tooltip"]').tooltip();
                })

                $('.phone').mask('(00) 0 0000-0000');
                var offcanvasElementList = [].slice.call(document.querySelectorAll('.offcanvas'))
                var offcanvasList = offcanvasElementList.map(function(offcanvasEl) {
                    return new bootstrap.Offcanvas(offcanvasEl)
                })

                $(':radio[id=nao_repete]').change(function() {
                    $(".repeticao_div").css("display", "none");
                });
                $(':radio[id=repete]').change(function() {
                    $(".repeticao_div").css("display", "block");
                });

                $('#adicionarLancamento').on('click', function() {
                    event.preventDefault();
                    let url = '/cadastrar-lancamento';

                    let lancamento_natureza = $('input[name=btnradio]:checked', '#form1').val();
                    let lancamento_descricao = $('#lancamento_descricao').val();
                    let lancamento_tipo_recebimento_pagamento = $('#lancamento_tipo_recebimento_pagamento')
                    .val();
                    let lancamento_valor_previsto = $('#lancamento_valor_previsto').val();
                    let lancamento_data_prevista = $('#lancamento_data_prevista').val();
                    let lancamento_categoria = $('#lancamento_categoria').val();
                    let lancamento_recorrencia = $('input[name=flexRadio]:checked', '#form2').val();
                    let lancamento_periodo = $('#lancamento_periodo').val();
                    let lancamento_parcela = $('#lancamento_parcela').val();
                    let _token = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        url: url,
                        type: "POST",
                        dataType: "json",
                        data: {
                            lancamento_natureza: lancamento_natureza,
                            lancamento_descricao: lancamento_descricao,
                            lancamento_tipo_recebimento_pagamento: lancamento_tipo_recebimento_pagamento,
                            lancamento_valor_previsto: lancamento_valor_previsto,
                            lancamento_data_prevista: lancamento_data_prevista,
                            lancamento_categoria: lancamento_categoria,
                            lancamento_recorrencia: lancamento_recorrencia,
                            lancamento_periodo: lancamento_periodo,
                            lancamento_parcela: lancamento_parcela,
                            _token: _token
                        }
                    }).done(function(data) {
                        $("#close_modal").trigger('click');
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
            });
        </script>
    @endsection
