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
                            <li class="breadcrumb-item active" aria-current="page">{{ $titulo }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-6" style="justify-content:flex-end; display:flex;">
                    <div class="mx-2">
                        <a type="button" aria-hidden="true" href="#" class="btn btn-success botao-padrao" id="novaEntrada"
                            data-bs-toggle="modal" data-bs-target="#modalNovaEntrada">
                            Nova Entrada
                        </a>
                    </div>
                    <div>
                        <a type="button" aria-hidden="true" href="#" class="btn btn-success botao-padrao"
                            data-bs-toggle="modal" data-bs-target="#modalNovaSaída">
                            Nova Saída
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-breadcrumb">
            <div class="card">
                <div class="card-body">
                    <span class="card-title"><strong>Nome Caixa:</strong> Lucas Ferreira</span> |
                    <span class="card-title"> <strong>Abertura em:</strong> 23/03/2022 às 08:15 </span> |
                    <span><strong>Fechado em:</strong> 22/03/2022 às 21:21 </span>
                </div>
            </div>
        </div>
        <div class="container" style="padding: 0px 20px 0 20px;">
            <div class="row">
                <div style="display: flex;justify-content: flex-end;">
                    @component('dashboard.componentes.filtrosperiodo')
                    @endcomponent
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-1">Caixa Inicial</h5>
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
                            <h5 class="card-title mb-1">Total Entrada</h5>
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
                            <h5 class="card-title mb-1">Total Saída</h5>
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
                            <h5 class="card-title mb-1">Balanço Final</h5>
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
                                <thead class="text-left">
                                    <th>Cod.</th>
                                    <th>Data</th>
                                    <th>Descrição</th>
                                    <th>Pet</th>
                                    <th>Forma de Pagamento</th>
                                    <th>Valor</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody>
                                    <tr class="text-left">
                                        <td>8904893048</td>
                                        <td>13/04/2022</td>
                                        <td>Roberto Santos</td>
                                        <td>Romeu</td>
                                        <td>PIX</td>
                                        <td class="success">(+) 300,00</td>
                                        <td>
                                            <a class="" id="" data-toggle="tooltip" data-placement="top"
                                                title="Editar">
                                                <i class="fas fa-user-edit"></i>
                                            </a> &nbsp;&nbsp;
                                            <a class="" id="" data-toggle="tooltip" data-placement="top"
                                                title="Excluir">
                                                <i class="fad fa-trash"></i>
                                            </a>&nbsp;&nbsp;
                                            <a class="" id="" data-toggle="tooltip" data-placement="top"
                                                title="Visualizar">
                                                <i class="fad fa-eye"></i>
                                            </a>&nbsp;&nbsp;

                                        </td>
                                    </tr>
                                    <tr class="text-left">
                                        <td>8397489374</td>
                                        <td>14/04/2022</td>
                                        <td>Vitor Specht Rockenbach </td>
                                        <td>Barto</td>
                                        <td>Débito</td>
                                        <td class="success">(+) 290,00</td>
                                        <td>
                                            <a class="" id="" data-toggle="tooltip" data-placement="top"
                                                title="Editar">
                                                <i class="fas fa-user-edit"></i>
                                            </a> &nbsp;&nbsp;
                                            <a class="" id="" data-toggle="tooltip" data-placement="top"
                                                title="Excluir">
                                                <i class="fad fa-trash"></i>
                                            </a>&nbsp;&nbsp;
                                            <a class="" id="" data-toggle="tooltip" data-placement="top"
                                                title="Visualizar">
                                                <i class="fad fa-eye"></i>
                                            </a>&nbsp;&nbsp;

                                        </td>
                                    </tr>
                                    <tr class="text-left">
                                        <td>8397489374</td>
                                        <td>15/04/2022</td>
                                        <td>Débora </td>
                                        <td>Barto</td>
                                        <td>Dinheiro</td>
                                        <td class="danger"> (-) 14,99</td>
                                        <td>
                                            <a class="" id="" data-toggle="tooltip" data-placement="top"
                                                title="Editar">
                                                <i class="fas fa-user-edit"></i>
                                            </a> &nbsp;&nbsp;
                                            <a class="" id="" data-toggle="tooltip" data-placement="top"
                                                title="Excluir">
                                                <i class="fad fa-trash"></i>
                                            </a>&nbsp;&nbsp;
                                            <a class="" id="" data-toggle="tooltip" data-placement="top"
                                                title="Visualizar">
                                                <i class="fad fa-eye"></i>
                                            </a>&nbsp;&nbsp;

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div style="justify-content:flex-end; display:flex;">
                        <div class="mx-2">
                            <a type="button" aria-hidden="true" href="#" class="btn btn-success botao-padrao">
                                Fechar Caixa
                            </a>
                        </div>
                        <div class="mx-2">
                            <a type="button" aria-hidden="true" href="#" class="btn btn-success botao-padrao">
                                Imprimir
                            </a>
                        </div>
                        <div>
                            <a type="button" aria-hidden="true" href="#" class="btn btn-success botao-padrao">
                                Relatório PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Entrada -->
        <div class="modal fade" id="modalNovaEntrada" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nova Entrada</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col col-4">
                                <label>Buscar por Cliente</label>
                                <input type="text" class="form-control" placeholder="Ex: Roberto Santos">
                            </div>
                            <div class="col col-4">
                                <label>Buscar por Telefone</label>
                                <input type="text" class="form-control" placeholder="41 99294-94822">
                            </div>
                            <div class="col col-4">
                                <label>Buscar por Pet</label>
                                <input type="text" class="form-control" placeholder="Romeu">
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col col-12">
                                <label>Descrição</label>
                                <input type="text" class="form-control" placeholder="Descrição/Observação">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col col-12">
                                <label>Buscar Produto ou Serviço</label>
                                <input type="text" class="form-control" placeholder="Servico X...">
                            </div>
                        </div>
                        <div class="col col-12 mb-3">
                            <label>Listagem Produtos</label>
                            <div class="mb-3">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">Item</th>
                                            <th scope="col">Qtde</th>
                                            <th scope="col">Preço</th>
                                            <th scope="col">Desconto</th>
                                            <th scope="col">Preço Final</th>
                                            <th scope="col">Excluir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Shampoo Canino</th>
                                            <td><input type="number" class="form-control" placeholder="Ex: 01"></td>
                                            <td>R$ 20,00</td>
                                            <td><input type="text" class="form-control money" placeholder="Ex: R$ 2,99">
                                            </td>
                                            <td>R$ 18,00</td>
                                            <td>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Exluir">
                                                    <i class="fas fa-ban"></i>
                                                </a>&nbsp;&nbsp;
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Osso Canino</th>
                                            <td><input type="number" class="form-control" placeholder="Ex: 01"></td>
                                            <td>R$ 10,00</td>
                                            <td><input type="text" class="form-control money" placeholder="Ex: R$ 2,99">
                                            </td>
                                            <td>R$ 8,00</td>
                                            <td>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Exluir">
                                                    <i class="fas fa-ban"></i>
                                                </a>&nbsp;&nbsp;
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Coleira Prets</th>
                                            <td><input type="number" class="form-control" placeholder="Ex: 01"></td>
                                            <td>R$ 100,00</td>
                                            <td><input type="text" class="form-control money" placeholder="Ex: R$ 2,99">
                                            </td>
                                            <td>R$ 98,00</td>
                                            <td>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Exluir">
                                                    <i class="fas fa-ban"></i>
                                                </a>&nbsp;&nbsp;
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col col-12 mb-3">
                            <div class="mb-3" style="display: flex; justify-content:end;">
                                <h4>Valor Total: </h4> &nbsp;&nbsp;
                                <h4>R$ 400,00</h4>
                            </div>
                        </div>
                        <div class="col col-12 mb-3">
                            <label>Forma de Pagamento</label>
                            <div>
                                @component('dashboard.componentes.pagamentos')
                                @endcomponent
                            </div>
                            <div class="row mb-3">
                                <div class="col col-4">
                                    <label>Parcelas</label>
                                    <input type="text" class="form-control" placeholder="Parcelas">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary float-end">
                            Cancelar
                        </button>
                        <button type="button" class="btn btn-success botao-padrao float-end">
                            Finalizar
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Filtrar -->
        <div class="modal fade" id="modalPeriodoPersonalizado" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Filtrar por Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div class="col col-12 mb-3">
                                <label>Data Inicial</label>
                                <div class="mb-3">
                                    <input class="form-control form-control" type="date" id="datePicker">
                                </div>
                            </div>
                            <div class="col col-12 mb-3">
                                <label>Data Final</label>
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

        <!-- Modal Saida -->
        <div class="modal fade" id="modalNovaSaída" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Saída</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div class="col col-12 mb-3">
                                <label>Descrição</label>
                                <div class="mb-3">
                                    <input class="form-control form-control" type="text">
                                </div>
                            </div>
                            <div class="col col-12 mb-3">
                                <label>Forma de Pagamento</label>
                                <div>
                                    @component('dashboard.componentes.pagamentos')
                                    @endcomponent
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary float-end">
                                Cancelar
                            </button>
                            <button type="button" class="btn btn-success botao-padrao float-end">
                                Finalizar
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
