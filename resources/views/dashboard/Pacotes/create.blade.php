@extends('layouts.app')
@section('cssExtras')
    <style>
        .ui-autocomplete {
            z-index: 1050 !important;
            width: 100px;
        }

        .ui-menu-item .ui-menu-item-wrapper.ui-state-active {
            background: #6352CA !important;
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

        .ajax-loader {
            visibility: hidden;
            background-color: rgba(255, 255, 255, 0.7);
            position: absolute;
            z-index: +100 !important;
            width: 100%;
            height: 100%;
        }

        .ajax-loader img {
            position: sticky;
            top: 50%;
            left: 50%;
        }

    </style>
@endsection

@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 align-self-center">
                    <div style="justify-content:space-between;display: flex;">
                        <h4 class="page-title" id="name_title">
                            Novo Pacote Promocional
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
                                    <label>Nome Pacote ou Promoção</label>
                                    <input type="text" class="form-control" name="pacote_nome"
                                        placeholder="Qual o nome do pacote?" id="pacote_nome" required>
                                </div>
                                <div class="form-group">
                                    <label>Selecione o serviços ou produtos</label>
                                    <input type="text" class="form-control nome"
                                        placeholder="Digite aqui o nome do produto ou servico cadastrado"
                                        id="inputInsertPacotePromocoes">
                                </div>
                                <div class="ajax-loader">
                                    <img src="{{ asset('assets/img/loading.gif') }}" class="img-responsive" />
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Espécie</label>
                                        <select class="form-control" name="pacote_pet_especie" id="pacote_pet_especie">
                                            <option selected disabled>Selecione a Espécie
                                            </option>
                                            <option value="felino">Felino</option>
                                            <option value="canino">Canino</option>
                                            <option value="outro">Outro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Porte</label>
                                        <select class="form-control" name="pacote_pet_porte" id="pacote_pet_porte">
                                            <option selected disabled>Selecione o porte</option>
                                            <option value="grande">Grande</option>
                                            <option value="medio">Médio</option>
                                            <option value="pequeno">Pequeno</option>
                                        </select>
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
                                                <th>Custo Unitário</th>
                                                <th>Custo Total</th>
                                                <th>(%) Desconto</th>
                                                <th>Preço Final</th>
                                                <th>Excluir</th>
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
                                        <textarea class="form-control" placeholder="Leave a comment here" id="pacote_observacoes"
                                            style="height: 100px"></textarea>
                                        <label for="floatingTextarea2">Observações Adicionais</label>
                                    </div>
                                </div>
                                <div class="col col-md-4">
                                    <div class="col col-md-12">
                                        <input type="text" class="form-control money" name="preco_total_sugerido"
                                            id="preco_total_sugerido" readonly />
                                        <small id="emailHelp" class="form-text text-muted">Preço Sugerido</small>

                                    </div>
                                    <div class="col col-md-12">
                                        <input type="text" class="form-control money" name="preco_total_de_venda"
                                            id="preco_total_de_venda" />
                                        <small id="emailHelp" class="form-text text-muted">Preço de Venda</small>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success botao-padrao float-end" id="adicionarPromocao">
                        Cadastrar
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scriptExtras')
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
                        },
                        beforeSend: function() {
                            $('.ajax-loader').css("visibility", "visible");
                        },
                    }).done(function(response) {
                        $('.ajax-loader').css("visibility", "hidden");
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
                                    '<td><input class="form-control form-control-sm qntSelecionado inputDados" type="number"/></td>' +
                                    '<td><span class="valorUnitario ">R$ ' + ui.item
                                    .custo + '</span></td>' +
                                    '<td><span class="valorTotal">-</span></td>' +
                                    '<td><input class="form-control form-control-sm descontoSelecionado inputDados" type="number" placeholder="%"></td>' +
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
            });
            theTotal = new Intl.NumberFormat().format(theTotal);
            theTotal = 'R$ ' + theTotal;

            $("#preco_total_sugerido").val(theTotal);
            $("#preco_total_de_venda").val(theTotal);
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

        function dadosTabela() {
            var arr = $('tbody tr').get()
                .map(function(row) {
                    return $(row).find('td').get()
                        .map(function(cell) {
                            return cell.innerText;
                        });
                });

            return arr;
        };

        $('#adicionarPromocao').on('click', function(e) {
            e.preventDefault();

            var value = $('.inputDados').filter(function() {
                return this.value != '';
            });

            var reqlength = $('.inputDados').length;
            if (value.length >= 0 && (value.length !== reqlength)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Atenção',
                    text: 'Não foi possível adicionar esta promoção ou pacote. Erro de conexão.',
                });
                return false;
            }

            let url = "/cadastrar-pacote-promocional";
            let pacote_nome = $('#pacote_nome').val();
            let pacote_observacoes = $('#pacote_observacoes').val();
            let preco_total_sugerido = $("#preco_total_sugerido").val();
            let preco_total_de_venda = $("#preco_total_de_venda").val();
            let pacote_pet_especie = $("#pacote_pet_especie").val();
            let pacote_pet_porte = $("#pacote_pet_porte").val();
            let itensTabela = dadosTabela();
            let token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: 'POST',
                url: url,
                method: 'POST',
                dataType: 'JSON',
                data: {
                    pacote_nome: pacote_nome,
                    pacote_observacoes: pacote_observacoes,
                    preco_total_sugerido: preco_total_sugerido,
                    preco_total_de_venda: preco_total_de_venda,
                    itensTabela: itensTabela,
                    pacote_pet_porte: pacote_pet_porte,
                    pacote_pet_especie: pacote_pet_especie,
                    _token: token
                },
                success: function(data) {
                    Swal.fire({
                        title: data.title,
                        text: data.text,
                        icon: data.icon,
                    });
                    if (data.code == '200') {
                        setTimeout(function() {
                            window.location.href = data.url;
                        }, 1000);
                    }
                },
                error: function(data) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Atenção',
                        text: 'Não foi possível adicionar esta promoção ou pacote. Erro de conexão.',
                        button: "Voltar",
                    });
                }
            });
        });
    </script>
@endsection
