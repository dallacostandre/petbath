@component('dashboard.componentes.header')
@endcomponent

<style>
    .ui-autocomplete {
        z-index: 1050 !important;
        width: 100px;
    }

    .ui-menu-item .ui-menu-item-wrapper.ui-state-active {
        background: #874242 !important;
        font-weight: bold !important;
        color: #ffffff !important;
    }

    .ui-autocomplete {
        background-color: inherit;
    }

    ul.ui-autocomplete {
        max-height: 400px;
        overflow-y: scroll;
    }

    ul.ui-autocomplete {
        list-style: none;
        text-decoration: none;
    }

</style>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 align-self-center">
                <div style="justify-content:space-between;display: flex;">
                    <h4 class="page-title" id="name_title">Pacotes & Promoçõe </h4>
                    <a type="button" aria-hidden="true" href="{{ route('cadastro.pacote.promocao') }}"
                        class="btn btn-success botao-padrao">
                        Cadastrar
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="container pt-4"><input class="form-control" type="text" id="myInput"
                            onkeyup="pesquisarPor()" placeholder="Pesquise pelo produto..."></div>
                    <div class="table-responsive">
                        <table class="table table-hover text-center" id="servicosTable">
                            <thead>
                                <th>Cod. Prom/Pacote </th>
                                <th>Nome Promo/Pacote</th>
                                <th>Serviço</th>
                                <th>Produtos</th>
                                <th>Porte</th>
                                <th>Custo Unit.</th>
                                <th>% de Lucro</th>
                                <th>Preço Sugerido</th>
                                <th>Preço Venda</th>
                                <th>Ações</th>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td>xxxxx</td>
                                    <td>xxxxx</td>
                                    <td>xxxxx</td>
                                    <td>xxxxx</td>
                                    <td>xxxxx</td>
                                    <td>xxxxx</td>
                                    <td>xxxxx</td>
                                    <td>xxxxx</td>
                                    <td>xxxxx</td>
                                    <td><a href="{{ url('editar-servico/') }}" data-toggle="tooltip"
                                            data-placement="top" title="Editar Servico"><i
                                                class="fas fa-user-edit"></i></a>&nbsp;
                                        &nbsp;
                                        <a href="{{ url('excluir-servico/') }}" data-toggle="tooltip"
                                            data-placement="top" title="Excluir Servico"><i
                                                class="fad fa-trash"></i></a>&nbsp;
                                        &nbsp;
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>{{-- {{ $servicos->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalCadastroServico" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dados do serviço</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Pacote</label>
                            <input type="text" class="form-control" name="pacote_nome"
                                placeholder="Qual o nome do pacote?" id="pacote_nome">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Serviço ou Produto </label>
                            <input type="text" class="form-control"
                                placeholder="Digite aqui o nome do produto ou servico cadastrado"
                                id="inputInsertPacotePromocoes">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <table class="table" id="tableProdutoServicosSelecionados">
                        <thead>
                            <tr>
                                <th>Tipo</th>
                                <th>Quantidade</th>
                                <th>Valor Unitário</th>
                                <th>Valor Total</th>
                                <th>Desconto %</th>
                                <th>Valor Final</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div><br>
                <hr>
                <div class="row" style="display: flex;">
                    <div class="col col-md-6">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                style="height: 100px"></textarea><label for="floatingTextarea2">Observações Adicionais</label>
                        </div>
                    </div>
                    <div class="col col-md-6" style="display: flex;">
                        <div class="col col-md-6">
                            <div class="col col-md-12"><label for="">Preço Total Sugerido:</label></div>
                            <div class="col col-md-12"><label for="">Preço Total de Venda:</label></div>
                        </div>
                        <div class="col col-md-6">
                            <div class="col-md-12">
                                <div class="form-group"><input type="text" class="form-control percent"
                                        name="pacote_porcentagem_desconto" id="pacote_porcentagem_desconto"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group"><input type="text" class="form-control money2"
                                        name="pacote_valor_final" id="pacote_valor_final"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Cancelar</button><button type="button"
                    class="btn btn-success botao-padrao float-end" id="adicionarServico">Cadastrar </button></div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditarServico" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dados do serviço</h5><button type="button"
                    class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label>Pacote</label><input type="text" class="form-control"
                                name="pacote_nome" placeholder="Qual o nome do pacote?" id="pacote_nome"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label>Serviço ou Produto </label><input type="text"
                                class="form-control" placeholder="Digite aqui o nome do produto ou servico cadastrado"
                                id="inputInsertPacotePromocoes"></div>
                    </div>
                </div>
                <div class="row">
                    <table class="table" id="tableProdutoServicosSelecionados">
                        <thead>
                            <tr>
                                <th>Tipo</th>
                                <th>Quantidade</th>
                                <th>Valor Unitário</th>
                                <th>Valor Total</th>
                                <th>Desconto %</th>
                                <th>Valor Final</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div><br>
                <hr>
                <div class="row" style="display: flex;">
                    <div class="col col-md-6">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                style="height: 100px"></textarea><label for="floatingTextarea2">Observações
                                Adicionais</label>
                        </div>
                    </div>
                    <div class="col col-md-6" style="display: flex;">
                        <div class="col col-md-6">
                            <div class="col col-md-12"><label for="">Preço Total Sugerido:</label></div>
                            <div class="col col-md-12"><label for="">Preço Total de Venda:</label></div>
                        </div>
                        <div class="col col-md-6">
                            <div class="col-md-12">
                                <div class="form-group"><input type="text" class="form-control percent"
                                        name="pacote_porcentagem_desconto" id="pacote_porcentagem_desconto">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group"><input type="text" class="form-control money2"
                                        name="pacote_valor_final" id="pacote_valor_final"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Cancelar</button><button type="button"
                    class="btn btn-success botao-padrao float-end" id="adicionarServico">Cadastrar </button>
            </div>
        </div>
    </div>
</div>

@component('dashboard.componentes.footer')
@endcomponent
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

<script>
    $(document).ready(function() {
        $('#inputInsertPacotePromocoes').autocomplete({
            source: '/getAllServicosProdutos',
            minlength: 3,
            autoFocus: true,
            select: function(e, ui) {
                const text =
                    '<tr><td>' + ui.item.label + '</td>' +
                    '<td>' +
                    '<div class="col col-4">' +
                    '<input class="form-control form-control-sm" type="text"/>' +
                    '</div>' +
                    '</td>' +
                    '<td>' +
                    '<span id="valorUnitario">' + ui.item.custo + '</span>' +
                    '</td>' +
                    '<td>' +
                    '<span id="valorTotal"></span>' +
                    '</td>' +
                    '<td>' +
                    '<input class="form-control form-control-sm" type="text" placeholder="%">' +
                    '</td>' +
                    '<td>' +
                    '<span id="valorTotalComDesconto"></span>' +
                    '</td>' +
                    '<td>' +
                    '<a href="#" data-toggle="tooltip" onclick ="delete_user($(this))" data-placement="top" title="Excluir"><i class="fad fa-trash"></i></a>' +
                    '</td>' +
                    '</tr>';
                $('#tableProdutoServicosSelecionados').append(text)
            }
        });
    });

    function delete_user(row) {
        row.closest('tr').remove();
    }
</script>
