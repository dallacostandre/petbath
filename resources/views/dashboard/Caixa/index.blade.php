@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-10 align-self-center">
                    <h4 class="page-title">Fluxo de Caixa</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard.main.index') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Fluxo de Caixa</li>
                        </ol>
                    </nav>
                </div>
                <div class="col col-2 botao-padrao-topo">
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
                                    <th>Descrição</th>
                                    <th>Método de Pagamento</th>
                                    <th>Data Pagamento</th>
                                    <th>Entrada</th>
                                    <th>Saída</th>
                                    <th>Saldo</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>XXXXX</td>
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

        <!-- Modal 1 -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Você deseja lançar para:</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input class="form-control form-control-sm" type="text"
                                placeholder="Pequise por pet, cliente ou telefone">
                        </div>
                        <div class="mb-3">
                            <select class="form-select form-select-sm"" aria-label=" Default select example">
                                <option value="1">Serviço 1</option>
                                <option value="1">Serviço 2</option>
                                <option value="1">Serviço 3</option>
                                <option value="1">Serviço 4</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input class="form-control form-control-sm" type="text" placeholder="Valor">
                        </div>
                        <div class="mb-3">
                            <input class="form-control form-control-sm" type="text" placeholder="Descrição">
                        </div>
                        <div class="mb-12">
                            <label for="">Serviços Selecionados</label>
                            <ul>
                                <li>Cras justo odio</li>
                                <li>Dapibus ac facilisis in</li>
                                <li>Morbi leo risus</li>
                                <li>Porta ac consectetur ac</li>
                                <li>Vestibulum at eros</li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer mx-auto">
                        <button type="button" class="btn btn-success btn-sm">Adicionar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 2 -->
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
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            })

            $('.phone').mask('(00) 0 0000-0000');
            var offcanvasElementList = [].slice.call(document.querySelectorAll('.offcanvas'))
            var offcanvasList = offcanvasElementList.map(function(offcanvasEl) {
                return new bootstrap.Offcanvas(offcanvasEl)
            })
        </script>
    @endsection
