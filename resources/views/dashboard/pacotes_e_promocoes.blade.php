@component('dashboard.componentes.header')
@endcomponent
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

<style>
    .custom-combobox {
        position: relative;
        display: inline-block;
    }

    .custom-combobox-toggle {
        position: absolute;
        top: 0;
        bottom: 0;
        margin-left: -1px;
        padding: 0;
    }

    .custom-combobox-input {
        margin: 0;
        padding: 5px 10px;
    }

</style>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 pb-3 align-self-center">
                <h4 class="page-title">Pacotes e Promoções</h4>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col md-12">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Adicionar Pacote / Promoção
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="card-body">
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
                                            <input type="text" class="form-control" data-id="{{ $unique_user }}"
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
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <hr>
                                <div class="row" style="display: flex;">
                                    <div class="col col-md-6">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here"
                                                id="floatingTextarea2" style="height: 100px"></textarea>
                                            <label for="floatingTextarea2">Observações Adicionais</label>
                                        </div>
                                    </div>
                                    <div class="col col-md-6" style="display: flex;">
                                        <div class="col col-md-6">
                                            <div class="col col-md-12">
                                                <label for="">Preço Total Sugerido:</label>
                                            </div>
                                            <div class="col col-md-12">
                                                <label for="">Preço Total de Venda:</label>
                                            </div>
                                        </div>
                                        <div class="col col-md-6">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control percent"
                                                        name="pacote_porcentagem_desconto"
                                                        id="pacote_porcentagem_desconto">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control money2"
                                                        name="pacote_valor_final" id="pacote_valor_final">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success botao-padrao float-end"
                                    id="cadastrarServico">Adicionar
                                </button>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Pacotes Cadastrados
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-body table-responsive">
                                    <table class="table table-striped table-hover table-sm ">
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
                                            <tr>
                                                <td>xxxxx</td>
                                                <td>xxxxx</td>
                                                <td>xxxxx</td>
                                                <td>xxxxx</td>
                                                <td>xxxxx</td>
                                                <td>xxxxx</td>
                                                <td>xxxxx</td>
                                                <td>xxxxx</td>
                                                <td>xxxxx</td>
                                                <td>
                                                    <a href="{{ url('editar-servico/') }}" data-toggle="tooltip"
                                                        data-placement="top" title="Editar Servico">
                                                        <i class="fas fa-user-edit"></i></a> &nbsp;&nbsp;
                                                    <a href="{{ url('excluir-servico/') }}" data-toggle="tooltip"
                                                        data-placement="top" title="Excluir Servico">
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
            </div>
        </div>
    </div>
</div>
@component('dashboard.componentes.footer')
@endcomponent

<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

<script>
    $('.money2').mask('000.000,00', {
        reverse: true
    });

    $('.percent').mask('0.000,00%', {
        reverse: true
    });

    $(document).ready(function() {

        $('#inputInsertPacotePromocoes').autocomplete({
            source: '/getAllServicosProdutos',
            minlength: 1,
            autoFocus: true,
            select: function(e, ui) {
                const text = '<tr><td>' + ui.item.label + '</td>' +
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
                    '<a href="#" data-toggle="tooltip" data-placement="top" title="Excluir"><i class="fad fa-trash"></i></a>' +
                    '</td>' +
                    '</tr>' ;
                $('#tableProdutoServicosSelecionados').append(text)
            }
        });
    });
</script>
