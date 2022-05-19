@extends('layouts.app')
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
                            <li class="breadcrumb-item"><a href="{{ route('financeiro.index') }}">Lancamento</a></li>
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Data Prevista</th>
                                        <th scope="col">Valor Previsto</th>
                                        <th scope="col">Data Pagamento</th>
                                        <th scope="col">Valor Pago</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">28/09/2022</th>
                                        <th scope="row">R$30,00</th>
                                        <td>27/09/2022</td>
                                        <th scope="row">R$35,00</th>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">28/10/2022</th>
                                        <th scope="row">R$30,00</th>
                                        <td>27/10/2022</td>
                                        <th scope="row">R$37,00</th>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">28/10/2022</th>
                                        <th scope="row">R$30,00</th>
                                        <td>27/11/2022</td>
                                        <th scope="row">R$39,00</th>
                                        <td>-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <!-- Modal Novo Lançamento -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Lançamento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col col-12 mb-3 text-center">
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off"
                                    checked>
                                <label class="btn btn-outline-primary" for="btnradio1">Receita</label>
                                <input type="radio" class="btn-check" name="btnradio" id="btnradio2"
                                    autocomplete="off">
                                <label class="btn btn-outline-primary" for="btnradio2">Despesa</label>
                            </div>
                        </div>
                        <div class="col col-12 mb-3">
                            <label>Descrição</label>
                            <input class="form-control form-control" type="text">
                        </div>
                        <div class="col col-12 mb-3" style="display: flex; justify-content:space-between;">
                            <div class="col col-5">
                                <label>Pagamento/Recebimento</label>
                                <select class="form-select">
                                    <option value="1">Dinheiro</option>
                                    <option value="2">Cartão de Crédito</option>
                                    <option value="3">Cartão de Débito</option>
                                    <option value="4">Pix</option>
                                    <option value="5">Boleto</option>
                                    <option value="6">Transfêrencia</option>
                                    <option value="7">Link de Pagamento</option>
                                    <option value="8">Outro</option>
                                </select>
                            </div>
                            <div class="col col-6">
                                <label>Valor</label>
                                <input class="form-control form-control money" type="text">
                            </div>
                        </div>
                        <div class="col col-12 mb-3" style="display: flex; justify-content:space-between;">
                            <div class="col col-5">
                                <label>Data Prevista</label>
                                <div class="mb-3">
                                    <input class="form-control form-control" type="date" id="datePicker">
                                </div>
                            </div>
                            <div class="col col-6">
                                <label>Categoria</label>
                                <div class="mb-3">
                                    <input class="form-control form-control" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col col-12 mb-3">
                            <label>Frequência</label>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input checked" type="radio" name="flexRadio" id="nao_repete" />
                                    <label class=" form-check-label" for="nao_repete">Não se repete</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadio" id="repete" />
                                    <label class=" form-check-label" for="repete">Repete</label>
                                </div>
                            </div>
                        </div>
                        <div class="col col-12 mb-3" style="display: flex; justify-content:space-between;">
                            <div class="col col-5">
                                <div class="mb-3 repeticao_div" style="display:none">
                                    <label>Periodo</label>
                                    <select class="form-select">
                                        <option value="1">Mensal</option>
                                        <option value="2">Anual</option>
                                        <option value="3">Semanal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="mb-3 repeticao_div" style="display:none">
                                    <label>Parcelas</label>
                                    <input class="form-control form-control" name="parcelas" id="" type="number">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div>
                            
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
                                    <input class="form-control form-control" type="date" id="datePicker">
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
        </div> --}}
    @endsection
    @section('scriptExtras')
        <script>
            $(document).ready(function() {
                $('.money').mask("000.000,00", {
                    reverse: true
                });
                document.getElementById('datePicker').valueAsDate = new Date();

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
            });
        </script>
    @endsection
