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
                    <h4 class="page-title" id="name_title">
                        Novo Pacote ou Promoção
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="container pt-3 pb-3">
                        <div class="row">
                            <div class="form-group">
                                <label>Nome do Pacote</label>
                                <input type="text" class="form-control" name="pacote_nome"
                                    placeholder="Qual o nome do pacote?" id="pacote_nome">
                            </div>
                            <div class="form-group">
                                <label>Selecione o serviço ou produto </label>
                                <input type="text" class="form-control nome"
                                    placeholder="Digite aqui o nome do produto ou servico cadastrado"
                                    id="inputInsertPacotePromocoes">
                            </div>
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
                                        <div class="col col-md-12"><label for="">Preço Total Sugerido:</label>
                                        </div>
                                        <div class="col col-md-12"><label for="">Preço Total de Venda:</label>
                                        </div>
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
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="container pt-3 pb-3">
                        <div class="row">
                            <div class="col-md-12">
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
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-success botao-padrao float-end" id="adicionarServico">
                    Cadastrar
                </button>
            </div>
        </div>
    </div>
</div>



@component('dashboard.componentes.footer')
@endcomponent
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

<script>
    $(document).ready(function() {

        $('#inputInsertPacotePromocoes').keyup(delay(function() {
            var texto_digitado = $('#inputInsertPacotePromocoes').val();
            var MIN_LENGTH = 3;
            if (texto_digitado.length >= MIN_LENGTH) {
                const url = '/getAllServicosProdutos';
                let _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: url,
                    type: "POST",
                    dataType: "json",
                    data: {
                        texto_digitado: texto_digitado,
                        _token: _token
                    }
                }).done(function(response) {
                    const msg = response;
                    $('#inputInsertPacotePromocoes').autocomplete({
                        source: msg,
                        minlength: 3,
                        autoFocus: true,
                        select: function(e, ui) {
                            const text =
                                '<tr><td>' + ui.item.value + '</td>' +
                                '<td>' +
                                '<div class="col col-4">' +
                                '<input class="form-control form-control-sm" type="text"/>' +
                                '</div>' +
                                '</td>' +
                                '<td>' +
                                '<span id="valorUnitario">' + ui.item.custo +
                                '</span>' +
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
                }).fail(function(jqXHR, textStatus, data) {
                    Swal.fire({
                        title: data.title,
                        text: data.message + jqXHR,
                        icon: data.icon,
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                });
            }
        }, 1000));
    });



    function delay(callback, ms) {
        var timer = 0;
        return function() {
            var context = this,
                args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function() {
                callback.apply(context, args);
            }, ms || 0);
        };
    }


    function delete_user(row) {
        row.closest('tr').remove();
    }
</script>
