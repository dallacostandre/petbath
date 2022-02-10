@component('dashboard.componentes.header')@endcomponent

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 pb-3 align-self-center">
                <h4 class="page-title">Produtos</h4>
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
                            Adicionar Produto
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="card">
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nome Produto</label>
                                                    <input type="text" class="form-control" name="nomeProduto"
                                                        required id="nomeProduto">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Codigo do Prod.</label>
                                                    <input type="text" class="form-control" name="codigoProduto"
                                                        required id="codigoProduto">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Custo Unitário</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">R$</div>
                                                    </div>
                                                    <input type="text" class="form-control money2" name="custoProduto "
                                                        required id="custoProduto">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Lucro em %</label>
                                                    <input type="text" class="form-control percentual percent" max="100"
                                                        required min="0" name="porcentagemLucroProduto"
                                                        id="porcentagemLucroProduto">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Preço Sugerido</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">R$</div>
                                                    </div>
                                                    <input type="text" class="form-control" disabled
                                                        name="precoSugeridoProduto" id="precoSugeridoProduto">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Preço de Venda</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">R$</div>
                                                    </div>
                                                    <input type="text" class="form-control money2" required
                                                        name="precoVendaProduto" id="precoVendaProduto">
                                                </div>
                                            </div>


                                            <div class="col-md-2">
                                                <label>Lucro</label>
                                                <div class="input-group mb-2">
                                                    <input type="text" class="form-control money2" disabled required
                                                        name="lucroProduto" id="lucroProduto">
                                                </div>
                                                <small class="form-text text-muted">Lucro estimado sem taxas e
                                                    impostos.
                                                </small>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success botao-padrao float-end"
                                            id="adicionarProduto">
                                            Adicionar
                                        </button>
                                        <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Produtos Cadastrados
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="accordion-body">
                                <div class="strpied-tabled-with-hover">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-sm">
                                            <thead>
                                                <th>Cod. Produto</th>
                                                <th>Nome Produto</th>
                                                <th>Custo Unit.</th>
                                                <th>% de Lucro</th>
                                                <th>Preço Venda</th>
                                                <th>Lucro Estimado</th>
                                                <th>Ações</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    @foreach ($produtos as $produto)
                                                        <td>{{ $produto->codigo_produto }}</td>
                                                        <td>{{ $produto->nome_produto }}</td>
                                                        <td>R$ {{ $produto->custo_produto }}</td>
                                                        <td>{{ $produto->percentual_lucro }}</td>
                                                        <td>R$ {{ $produto->preco_de_venda_produto }}</td>
                                                        <td>
                                                            <span style="color: green; fontWeight:500;">{{ $produto->lucro_produto }}</span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ url('editar-produto/') }}"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Editar Produto">
                                                                <i class="fas fa-user-edit"></i></a> &nbsp;&nbsp;
                                                            <a href="{{ url('excluir-produto/') }}"
                                                                class="removerProduto" data-id={{ $produto->id }}
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Excluir Produto">
                                                                <i class="fad fa-trash"></i></a>&nbsp;&nbsp;
                                                        </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{$produtos->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 pb-3 align-self-center">
                <h4 class="page-title">Serviços</h4>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col md-12">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapsetres" aria-expanded="true" aria-controls="collapsetres">
                            Adicionar Serviço
                        </button>
                    </h2>
                    <div id="collapsetres" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="card">
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Nome Serviço</label>
                                                    <input type="text" class="form-control" name="servico_nome"
                                                        id="servico_nome">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Raça</label>
                                                    {{-- FOREACH E RAÇAS --}}
                                                    <select class="form-control" name="pet_raca" id="pet_raca"
                                                        required>
                                                        <option disabled>Selecione uma raça</option>
                                                        @foreach ($raca_pet as $raca)
                                                            <option value="{{ $raca->id }}">
                                                                {{ $raca->nome_raca }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 ">
                                                <label>Porte</label>
                                                <select class="form-control" name="servico_pet_porte"
                                                    id="servico_pet_porte">
                                                    <option selected disabled>Selecione o Porte</option>
                                                    <option value="pequeno">Pequeno</option>
                                                    <option value="medio">Médio</option>
                                                    <option value="grande">Grande</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Custo Unitário</label>
                                                    <input type="text" class="form-control money2" name="custoServico"
                                                        id="custoServico">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">% de Lucro</label>
                                                    <input type="text" class="form-control money2 percentual percent" name="porcentagemLucroServico"
                                                        id="porcentagemLucroServico">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Preço Sugerido</label>
                                                    <input type="text" class="form-control money2" name="precoSugeridoServico"
                                                        id="precoSugeridoServico">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Preço de Venda</label>
                                                    <input type="text" class="form-control money2" name="precoVendaServico"
                                                        id="precoVendaServico">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success botao-padrao float-end"
                                            id="cadastrarServico">
                                            Adicionar
                                        </button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseQuatro" aria-expanded="false" aria-controls="collapseQuatro">
                            Serviços Cadastrados
                        </button>
                    </h2>
                    <div id="collapseQuatro" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-body table-responsive">
                                    <table class="table table-striped table-hover table-sm">
                                        <thead>
                                            <th>Cod. Serviço</th>
                                            <th>Nome Serviço</th>
                                            <th>Raça</th>
                                            <th>Custo Unit.</th>
                                            <th>% de Lucro</th>
                                            <th>Preço Sugerido</th>
                                            <th>Preço Venda</th>
                                            <th>Ações</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>xxxxxx</td>
                                                <td>xxxxxx</td>
                                                <td>xxxxxx</td>
                                                <td>xxxxxx</td>
                                                <td>xxxxxx</td>
                                                <td>xxxxxx</td>
                                                <td>xxxxxx</td>
                                                <td>
                                                    <a href="{{ url('editar-servico/') }}" data-toggle="tooltip"
                                                        data-placement="top" title="Editar Servico">
                                                        <i class="fas fa-user-edit"></i>
                                                    </a> &nbsp;&nbsp;
                                                    <a href="{{ url('excluir-servico/') }}" data-toggle="tooltip"
                                                        data-placement="top" title="Excluir Servico">
                                                        <i class="fad fa-trash"></i>
                                                    </a>&nbsp;&nbsp;
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
</div>

@component('dashboard.componentes.footer')@endcomponent

<script>
    $('.money2').mask('000.000.000.000.000,00', {
        reverse: true
    });
    $('.percent').mask('##0,00%', {
        reverse: true
    });

    $('#adicionarProduto').on('click', function(e) {
        e.preventDefault();

        var url = "/cadastraProduto";
        var nomeProduto = $('#nomeProduto').val();
        var codigoProduto = $('#codigoProduto').val();
        var custoProduto = $('#custoProduto').val();
        var precoVendaProduto = $('#precoVendaProduto').val();
        var percentualLucro = $('#porcentagemLucroProduto').val();
        var lucroProduto = $('#lucroProduto').val();
        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: url,
            method: 'POST',
            dataType: 'JSON',
            data: {
                nome_produto: nomeProduto,
                codigo_produto: codigoProduto,
                custo_produto: custoProduto,
                preco_de_venda_produto: precoVendaProduto,
                percentual_lucro: percentualLucro,
                lucro_produto: lucroProduto,
                _token: token
            },
            success: function(data) {
                Swal.fire({
                    title: data.title,
                    text: data.mensagem,
                    icon: data.icone,
                    button: "Ótimo!",
                });
                setTimeout(function() {
                    location.reload();
                }, 1000);
            },
            error: function(data) {
                Swal.fire({
                    icon: 'error',
                    title: 'Atenção',
                    text: 'Não foi possível adicionar o produto',
                    button: "Voltar!",
                });
            }
        });
    });

    $('.removerProduto').on('click', function(e) {
        e.preventDefault();

        var url = "/removerProduto";
        var idProduto = $(this).data('id');
        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: url,
            method: 'DELETE',
            dataType: 'JSON',
            data: {
                id: idProduto,
                _token: token
            },
            success: function(data) {
                Swal.fire({
                    title: data.title,
                    text: data.mensagem,
                    icon: data.icone,
                    button: "Ótimo!",
                });
                setTimeout(function() {
                    location.reload();
                }, 1000);
            },
            error: function(data) {
                Swal.fire({
                    icon: 'error',
                    title: 'Atenção',
                    text: 'Não foi possível adicionar o produto',
                });
            }
        });
    });

    $('#porcentagemLucroProduto').on('change', function() {
        var custo = $('#custoProduto').val();
        var porcentagem = $('#porcentagemLucroServico').val();
        var precoSugeridoProduto = (parseFloat(custo)) * (parseFloat(porcentagem) / 100) + parseFloat(custo);
        $('#precoSugeridoProduto').val(precoSugeridoProduto);
        $('#precoVendaProduto').val(precoSugeridoProduto);

        var lucroProduto = (parseFloat(custo)) * (parseFloat(porcentagem) / 100);
        $('#lucroProduto').val(new Intl.NumberFormat('pt-BR', {
            style: 'currency',
            currency: 'BRL'
        }).format(lucroProduto));

    });

    $('#custoProduto').on('change', function() {
        var custo = $('#custoProduto').val();
        var porcentagem = $('#porcentagemLucroProduto').val();
        var precoSugeridoProduto = (parseFloat(custo)) * (parseFloat(porcentagem) / 100) + parseFloat(custo);
        $('#precoSugeridoProduto').val(precoSugeridoProduto);
        $('#precoVendaProduto').val(precoSugeridoProduto);
        $('#precoVendaProduto').val(precoSugeridoProduto);

        var lucroProduto = (parseFloat(custo)) * (parseFloat(porcentagem) / 100);
        $('#lucroProduto').val(new Intl.NumberFormat('pt-BR', {
            style: 'currency',
            currency: 'BRL'
        }).format(lucroProduto));
    });


    $('#porcentagemLucroServico').on('change', function() {
        var custo = $('#custoServico').val();
        var porcentagem = $('#porcentagemLucroServico').val();
        var precoSugeridoServico = (parseFloat(custo)) * (parseFloat(porcentagem) / 100) + parseFloat(custo);
        $('#precoSugeridoServico').val(precoSugeridoServico);
        $('#precoVendaServico').val(precoSugeridoServico);

        var lucroServico = (parseFloat(custo)) * (parseFloat(porcentagem) / 100);
        $('#lucroProduto').val(new Intl.NumberFormat('pt-BR', {
            style: 'currency',
            currency: 'BRL'
        }).format(lucroServico));

    });

    $('#custoServico').on('change', function() {
        var custo = $('#custoServico').val();
        var porcentagem = $('#porcentagemLucroServico').val();
        var precoSugeridoServico = (parseFloat(custo)) * (parseFloat(porcentagem) / 100) + parseFloat(custo);
        $('#precoSugeridoServico').val(precoSugeridoServico);
        $('#precoVendaServico').val(precoSugeridoServico);

        var lucroServico = (parseFloat(custo)) * (parseFloat(porcentagem) / 100);
        $('#lucroProduto').val(new Intl.NumberFormat('pt-BR', {
            style: 'currency',
            currency: 'BRL'
        }).format(lucroServico));

    });



</script>
