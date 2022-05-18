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
                                    <th>Data</th>
                                    <th>Descrição</th>
                                    <th>Forma de Pagamento</th>
                                    <th>Parcela</th>
                                    <th>Valor</th>
                                    <th>Ação</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>XXXXX</td>
                                        <td>XXXXX</td>
                                        <td>XXXXX</td>
                                        <td>XXXXX</td>
                                        <td>XXXXX</td>
                                        <td>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Remover">
                                                <i class="fas fa-exchange-alt"></i></a>&nbsp;&nbsp;
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Alterar">
                                                <i class="fad fa-trash"></i></a>&nbsp;&nbsp;
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
                        <h5 class="modal-title" id="exampleModalLabel">Você deseja lançar para:</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 text-center">
                            <button type="button" class="btn btn-primary" data-bs-toggle="button" autocomplete="off"
                                aria-pressed="true">Receita</button>
                            <button type="button" class="btn btn-primary" data-bs-toggle="button" autocomplete="off"
                                aria-pressed="true">Despesa</button>
                        </div>
                        <label>Valor</label>
                        <div class="mb-3">
                            <input class="form-control form-control" type="text">
                        </div>
                        <label>Vencimento</label>
                        <div class="mb-3">
                            <input class="form-control form-control" type="date">
                        </div>
                        <div class="mb-3">
                            <label>Forma</label>
                            <select class="form-select">
                                <option value="1">Boleto</option>
                                <option value="2">Cartão</option>
                                <option value="3">Outro</option>
                            </select>
                        </div>
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
                        <div class="mb-3" id="repeticao_div" style="display:none">
                            <label>Periodo</label>
                            <select class="form-select">
                                <option value="1">Mensal</option>
                                <option value="2">Anual</option>
                                <option value="3">Semanal</option>
                            </select>
                            <label>Parcelas</label>
                            <input class="form-control form-control" name="parcelas" id="" type="number">
                        </div>
                    </div>
                    <div class="modal-footer mx-auto">
                        <button type="button" class="btn btn-success btn">Adicionar</button>
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
                        <div class="container">
                            <p>Filtre por categorias:</p>
                        </div>
                        <div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Valor</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="name@example.com">
                            </div>
                            <div class="mb-2">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Forma de Pagamento</option>
                                    <option value="1">Pix</option>
                                    <option value="2">Débito</option>
                                    <option value="3">Crédito</option>
                                    <option value="3">Dinheiro</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Natureza</option>
                                    <option value="1">Entrada</option>
                                    <option value="3">Saida</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <div class="input-group input-daterange">
                                    <input type="text" class="form-control" value="2012-04-05">
                                    <div class="input-group-addon">to</div>
                                    <input type="text" class="form-control" value="2012-04-19">
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Pesquisar por descrição:</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer mx-auto">
                        <div class="container" style="display: flex; justify-content:space-between;">
                            <a style="text-decoration: none;" href="http://">Limpar Filtro</a>
                            <button type="button" name="" id="" class="btn btn-success btn-sm" btn-lg
                                btn-block">Filtrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scriptExtras')
        <script>
            $(document).ready(function() {
                $(function() {
                    $('[data-toggle="tooltip"]').tooltip();
                })

                $('.phone').mask('(00) 0 0000-0000');
                var offcanvasElementList = [].slice.call(document.querySelectorAll('.offcanvas'))
                var offcanvasList = offcanvasElementList.map(function(offcanvasEl) {
                    return new bootstrap.Offcanvas(offcanvasEl)
                })
                
                $(':radio[id=nao_repete]').change(function() {
                    $("#repeticao_div").css("display", "none");
                });
                $(':radio[id=repete]').change(function() {
                    $("#repeticao_div").css("display", "block");
                });
            });
        </script>
    @endsection
