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
                                    placeholder="Qual o nome do pacote?" id="pacote_nome" required>
                            </div>
                            <div class="form-group">
                                <label>Selecione o serviço ou produto</label>
                                <input type="text" class="form-control nome"
                                    placeholder="Digite aqui o nome do produto ou servico cadastrado"
                                    id="inputInsertPacotePromocoes">
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
                        <hr>
                        <div class="row pt-3" style="display: flex;">
                            <div class="col col-md-8">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Observações Adicionais</label>
                                </div>
                            </div>
                            <div class="col col-md-4">
                                <div class="col col-md-12">
                                    {{-- <label for="">Preço Total Sugerido:</label> --}}

                                        <input type="text" class="form-control money" name="preco_total_sugerido" id="preco_total_sugerido" readonly/>
                                        <small id="emailHelp" class="form-text text-muted">Preço Sugerido</small>

                                </div>
                                <div class="col col-md-12">
                                    {{-- <label for="">Preço Total de Venda:</label> --}}

                                        <input type="text" class="form-control money" name="preco_total_de_venda" id="preco_total_de_venda" />
                                        <small id="emailHelp" class="form-text text-muted">Preço de Venda</small>

                                </div>
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
                                '<tr>' +
                                // '<td><span>' +  ui.item.unique_servico ? ui.item.unique_servico : ui.item.unique_produto + '</span></td>' +
                                '<td><span>' + ui.item.value + '</span></td>' +
                                '<td><div class="col col-2">' +
                                '<input class="form-control form-control-sm qntSelecionado" type="text"/>' +
                                '</div></td>' +
                                '<td><span class="valorUnitario">R$ ' + ui.item
                                .custo + '</span></td>' +
                                '<td><span class="valorTotal">-</span></td>' +
                                '<td><input class="form-control form-control-sm descontoSelecionado" type="text" placeholder="%"></td>' +
                                '<td><span class="valorTotalComDesconto">R$ </span></td>' +
                                '<td><a href="#" data-toggle="tooltip" onclick ="delete_user($(this))" data-placement="top" title="Excluir"><i class="fad fa-trash"></i></a></td>' +
                                '</tr>';
                            $('#tableProdutoServicosSelecionados').append(text)
                            $('.qntSelecionado').mask('00');
                            $('.descontoSelecionado').mask('000');
                            $('#inputInsertPacotePromocoes').val();
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
        }, 500));
    });

    $(document).on("change", ".qntSelecionado", function() {
        // Pega o valor atual da quantidade
        let quantidade = $(this).val();
        // Pega o valor atual do valor unitário
        let preco = $(this).closest('tr').find('.valorUnitario').text();
        // Retira o R$
        preco = preco.replace('R$', '');
        // Altera o . por uma virgula
        preco = preco.replace('.', '');
        // Altera a virgula por ponto
        preco = preco.replace(',', '.');

        // Multipla o valor unitário pela quantidade
        let resultadoValorTotal = quantidade * parseFloat(preco);

        // Coloca duas virgulas no valor Total
        resultadoValorTotal = resultadoValorTotal.toFixed(2);
        // Muda o Valor total para modelo internacional ( R$ xx.xxx,00)
        resultadoValorTotal = new Intl.NumberFormat().format(resultadoValorTotal);
        // Adiconar o R$ ao resultado final)
        resultadoValorTotal = 'R$ ' + resultadoValorTotal;

        // Atualiza o campo de valor total na tabela
        $(this).closest('tr').find('.valorTotal').text(resultadoValorTotal);

        // Atualiza o Preço Final
        atualizarPrecoTotal();

    });

    $(document).on("change", ".descontoSelecionado", function() {
        let desconto = $(this).val();
        let precoValorTotal = $(this).closest('tr').find('.valorTotal').text();

        precoValorTotal = precoValorTotal.replace('R$', '');
        precoValorTotal = precoValorTotal.replace('.', '');
        precoValorTotal = precoValorTotal.replace(',', '.');

        let descontoTotal = parseFloat(precoValorTotal) * (parseFloat(desconto) / 100);

        let valorTotalComDesconto = precoValorTotal - descontoTotal;

        valorTotalComDesconto = valorTotalComDesconto.toFixed(2);
        valorTotalComDesconto = new Intl.NumberFormat().format(valorTotalComDesconto);
        valorTotalComDesconto = 'R$ ' + valorTotalComDesconto;

        $(this).closest('tr').find('.valorTotalComDesconto').text(valorTotalComDesconto);
        // Atualiza o Preço Final
        atualizarPrecoTotal();

    });


    function atualizarPrecoTotal() {
        var theTotal = 0;
        $("td:nth-child(6)").each(function() {
            var val = $(this).text().replace("R$", "").replace('.', '').replace(',', '.');
            theTotal += parseFloat(val);
            // theTotal = new Intl.NumberFormat().format(theTotal);
        });

        $("#preco_total_sugerido").val(theTotal);
        $("#preco_total_de_venda").val(theTotal);
        Mask();
    }

    function Mask() {
        $('.money').mask("000.000,00", {
            reverse: true
        });
    }


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
        atualizarPrecoTotal();
    }


    

</script>
