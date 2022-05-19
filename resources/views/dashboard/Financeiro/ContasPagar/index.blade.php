@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-6 align-self-center">
                    <h4 class="page-title">{{ $titulo }}</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('financeiro.index') }}">Financeiro</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $titulo }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-6 float-end">
                    @component('dashboard.componentes.filtrosperiodo') @endcomponent
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-1">Falta Pagar</h5>
                            <h3 class="font-light">$769.08</h3>
                            <div class="mt-3 text-center">
                                {{-- <div id="earnings"></div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-1">Pago</h5>
                            <h3 class="font-light">$769.08</h3>
                            <div class="mt-3 text-center">
                                {{-- <div id="earnings"></div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-1">Vencidos</h5>
                            <h3 class="font-light">$769.08</h3>
                            <div class="mt-3 text-center">
                                {{-- <div id="earnings"></div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-1">À Vencer</h5>
                            <h3 class="font-light">$769.08</h3>
                            <div class="mt-3 text-center">
                                {{-- <div id="earnings"></div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <th>Data</th>
                                    <th>Descrição</th>
                                    <th>Categoria</th>
                                    <th>Fornecedor</th>
                                    <th>Qnt. Parcelas</th>
                                    <th>Valor</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>10/03/2022</td>
                                        <td>Pagamento rerefente ao fornecedor Xx</td>
                                        <td>Produtos para Gatos</td>
                                        <td>Empresa XWZ</td>
                                        <td>1(x)</td>
                                        <td>R$300,00</td>
                                        <td><span class="badge rounded-pill bg-warning text-dark">A vencer</span></td>

                                    </tr>
                                    <tr>
                                        <td>10/03/2022</td>
                                        <td>Pagamento rerefente ao fornecedor Xx</td>
                                        <td>Produtos para Gatos</td>
                                        <td>Empresa XWZ</td>
                                        <td>1(x)</td>
                                        <td>R$300,00</td>
                                        <td><span class="badge rounded-pill"
                                                style="background-color: rgb(25, 151, 25)">Pago</span></td>

                                    </tr>
                                    <tr>
                                        <td>10/03/2022</td>
                                        <td>Pagamento rerefente ao fornecedor Xx</td>
                                        <td>Produtos para Gatos</td>
                                        <td>Empresa XWZ</td>
                                        <td>1(x)</td>
                                        <td>R$300,00</td>
                                        <td><span class="badge rounded-pill"
                                                style="background-color: rgb(201, 8, 8)">Vencido</span></td>
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
                        <div class="col col-12 mb-3" style="display: flex; justify-content:space-between;">
                            <div class="col col-5">
                                <label>Forma</label>
                                <select class="form-select">
                                    <option value="1">Boleto</option>
                                    <option value="1">Dinheiro</option>
                                    <option value="2">Cartão de Crédito</option>
                                    <option value="2">Cartão de Débito</option>
                                    <option value="2">PIX</option>
                                    <option value="3">Outro</option>
                                </select>
                            </div>
                            <div class="col col-6">
                                <label>Valor</label>
                                <input class="form-control form-control money" type="text">
                            </div>
                        </div>
                        <div class="col col-12 mb-3">
                            <label>Data</label>
                            <div class="mb-3">
                                <input class="form-control form-control" type="date" id="datePicker">
                            </div>
                        </div>
                        <div class="col col-12 mb-3">
                            <label>Categoria</label>
                            <div class="mb-3">
                                <input class="form-control form-control" type="text">
                            </div>
                        </div>
                        <div class="col col-12 mb-3">
                            <label>Frequência</label>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadio" id="nao_repete" />
                                    <label class=" form-check-label" for="nao_repete">Não se repete</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadio" id="repete" />
                                    <label class=" form-check-label" for="repete">Repete</label>
                                </div>
                            </div>
                        </div>
                        <div class="col col-12 mb-3">
                            <div class="mb-3 repeticao_div" style="display:none">
                                <label>Periodo</label>
                                <select class="form-select">
                                    <option value="1">Mensal</option>
                                    <option value="2">Anual</option>
                                    <option value="3">Semanal</option>
                                </select>
                            </div>
                            <div class="mb-3 repeticao_div" style="display:none">
                                <label>Parcelas</label>
                                <input class="form-control form-control" name="parcelas" id="" type="number">
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
        </div>
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
