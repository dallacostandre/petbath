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
                                                        id="nomeProduto" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Codigo do Produto</label>
                                                    <input type="text" class="form-control codigo" name="codigoProduto"
                                                        id="codigoProduto" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Custo Unitário</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">R$</div>
                                                    </div>
                                                    <input type="text" class="form-control money2" name="custoProduto"
                                                        id="custoProduto" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Lucro em %</label>
                                                    <input type="text" class="form-control percent" max="100" min="0"
                                                        name="porcentagemLucroProduto" id="porcentagemLucroProduto"
                                                        required>
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
                                                        <td>{{ $produto->produto_codigo }}</td>
                                                        <td>{{ $produto->produto_nome }}</td>
                                                        <td>R$ {{ $produto->produto_custo }}</td>
                                                        <td>{{ $produto->produto_porcentagem_lucro }}</td>
                                                        <td>R${{ number_format($produto->produto_preco_de_venda, 2, ',', '.') }}</td>
                                                        <td>R$
                                                            {{ number_format($produto->produto_lucro, 2, ',', '.') }}
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
                            {{ $produtos->links() }}
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
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nome Serviço</label>
                                                    <input type="text" class="form-control" name="servico_nome"
                                                        id="servico_nome">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Raça</label>
                                                    <select class="form-control" name="servico_pet_raca"
                                                        id="servico_pet_raca" required>
                                                        <option disabled>Selecione uma raça</option>
                                                        @foreach ($raca_pet as $raca)
                                                            <option value="{{ $raca->nome_raca }}">{{ $raca->nome_raca }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 ">
                                                <label>Porte</label>
                                                <select class="form-control" name="servico_pet_porte"
                                                    id="servico_pet_porte">
                                                    <option value="pequeno" selected>Pequeno</option>
                                                    <option value="medio">Médio</option>
                                                    <option value="grande">Grande</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Codigo do Serviço</label>
                                                    <input type="text" class="form-control codigo" name="servico_codigo"
                                                        id="servico_codigo" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Custo Unitário</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">R$</div>
                                                    </div>
                                                    <input type="text" class="form-control money2" name="servico_custo"
                                                        id="servico_custo" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">% de Lucro</label>
                                                    <input type="text" class="form-control percent"
                                                        name="servico_porcentagem_lucro" id="servico_porcentagem_lucro">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Preço Sugerido</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">R$</div>
                                                    </div>
                                                    <input type="text" class="form-control money2"
                                                        name="servico_preco_sugerido" id="servico_preco_sugerido"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Preço de Venda</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">R$</div>
                                                    </div>
                                                    <input type="text" class="form-control money2"
                                                        name="servico_preco_de_venda" id="servico_preco_de_venda"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Lucro</label>
                                                <div class="input-group mb-2">
                                                    <input type="text" class="form-control money2" disabled required
                                                        name="servico_lucro" id="servico_lucro">
                                                </div>
                                                <small class="form-text text-muted">Lucro estimado sem taxas e
                                                    impostos.
                                                </small>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success botao-padrao float-end"
                                            id="adicionarServico">
                                            Cadastrar
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
                                            <th>Preço Venda</th>
                                            <th>Lucro Estimado</th>
                                            <th>Ações</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($servicos as $servico )
                                                
                                            <tr>
                                                <td>{{$servico->servico_codigo }}</td>
                                                <td>{{$servico->servico_nome }}</td>
                                                <td>{{$servico->servico_pet_raca }}</td>
                                                <td>R$ {{ $servico->servico_custo }}</td>
                                                <td>{{$servico->servico_porcentagem_lucro }}</td>
                                                <td>R$ {{ $servico->servico_preco_de_venda }}</td>
                                                <td>R$ {{ $servico->servico_lucro }}</td>
                                                <td>
                                                    <a href="{{ url('/editar-servico/') }}" data-toggle="tooltip"
                                                    data-placement="top" title="Editar Servico">
                                                    <i class="fas fa-user-edit"></i>
                                                </a> &nbsp;&nbsp;
                                                <a href="{{ url('/removerServico') }}" class="removerServico" data-toggle="tooltip" data-id={{ $servico->id }}
                                                data-placement="top" title="Excluir Servico">
                                                <i class="fad fa-trash"></i>
                                                    </a>&nbsp;&nbsp;
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{ $servicos->links() }}
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
    $('.percent').mask('0.000,00%', {
        reverse: true
    });
    $('.codigo').mask('AAAAAAAAAAAAAAAAAAA', {
        reverse: true
    });

    $('#adicionarProduto').on('click', function(e) {
        e.preventDefault();

        var url = "/cadastraProduto";
        var produto_nome = $('#nomeProduto').val();
        var produto_codigo = $('#codigoProduto').val();
        var produto_custo = $('#custoProduto').val();
        var produto_preco_de_venda = $('#precoVendaProduto').val();
        var produto_porcentagem_lucro = $('#porcentagemLucroProduto').val();
        var produto_lucro = $('#lucroProduto').val();
        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: url,
            method: 'POST',
            dataType: 'JSON',
            data: {
                produto_nome: produto_nome,
                produto_porcentagem_lucro: produto_porcentagem_lucro,
                produto_codigo: produto_codigo,
                produto_custo: produto_custo,
                produto_preco_de_venda: produto_preco_de_venda,
                produto_lucro: produto_lucro,
                _token: token
            },
            success: function(data) {
                Swal.fire({
                    title: data.title,
                    text: data.text,
                    icon: data.icon,
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
                    button: "Voltar",
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
                    text: data.text,
                    icon: data.icon,
                });
                setTimeout(function() {
                    location.reload();
                }, 1000);
            },
            error: function(data) {
                Swal.fire({
                    icon: 'error',
                    title: 'Atenção',
                    text: 'Não foi possível excluir o produto',
                });
            }
        });
    });

    $('#porcentagemLucroProduto').on('change', function() {
        var custo = $('#custoProduto').val();
        var porcentagem = $('#porcentagemLucroProduto').val();
        var precoSugeridoProduto = (parseFloat(custo)) * (parseFloat(porcentagem) / 100) + parseFloat(custo);

        if (custo === "") {
            return false;
        } else {
            $('#precoSugeridoProduto').val(precoSugeridoProduto);
            $('#precoVendaProduto').val(precoSugeridoProduto);
            var lucroProduto = (parseFloat(custo)) * (parseFloat(porcentagem) / 100);
            $('#lucroProduto').val(lucroProduto);
        }
    });

    $('#custoProduto').on('change', function() {
        var custo = $('#custoProduto').val();
        var porcentagem = $('#porcentagemLucroProduto').val();
        var precoSugeridoProduto = (parseFloat(custo)) * (parseFloat(porcentagem) / 100) + parseFloat(custo);

        if (porcentagem === "") {
            return false;
        } else {
            $('#precoSugeridoProduto').val(precoSugeridoProduto);
            $('#precoVendaProduto').val(precoSugeridoProduto);
            var lucroProduto = (parseFloat(custo)) * (parseFloat(porcentagem) / 100);
            $('#lucroProduto').val(lucroProduto);
        }
    });


    $('#adicionarServico').on('click', function(e) {
        e.preventDefault();

        var url = "/cadastraServico";
        var servico_nome = $('#servico_nome').val();
        var servico_pet_raca = $('#servico_pet_raca').val();
        var servico_pet_porte = $('#servico_pet_porte').val();
        var servico_codigo = $('#servico_codigo').val();
        var servico_custo = $('#servico_custo').val();
        var servico_porcentagem_lucro = $('#servico_porcentagem_lucro').val();
        var servico_preco_de_venda = $('#servico_preco_de_venda').val();
        var servico_lucro = $('#servico_lucro').val();
        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: url,
            method: 'POST',
            dataType: 'JSON',
            data: {
                servico_nome: servico_nome,
                servico_pet_raca: servico_pet_raca,
                servico_pet_porte: servico_pet_porte,
                servico_codigo: servico_codigo,
                servico_custo: servico_custo,
                servico_porcentagem_lucro: servico_porcentagem_lucro,
                servico_preco_de_venda: servico_preco_de_venda,
                servico_lucro: servico_lucro,
                _token: token
            },
            success: function(data) {
                Swal.fire({
                    title: data.title,
                    text: data.text,
                    icon: data.icon,
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
                    text: 'Não foi possível adicionar o serviço!',
                    button: "Voltar",
                });
            }
        });
    });

    $('.removerServico').on('click', function(e) {
        e.preventDefault();

        var url = "/removerServico";
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
                    text: data.text,
                    icon: data.icon,
                });
                setTimeout(function() {
                    location.reload();
                }, 1000);
            },
            error: function(data) {
                Swal.fire({
                    icon: 'error',
                    title: 'Atenção',
                    text: 'Não foi possível excluir o serviço',
                });
            }
        });
    });


    $('#servico_porcentagem_lucro').on('change', function() {
        var custo = $('#servico_custo').val();
        var porcentagem = $('#servico_porcentagem_lucro').val();
        var precoSugeridoServico = (parseFloat(custo)) * (parseFloat(porcentagem) / 100) + parseFloat(custo);

        if (custo === "") {
            return false;
        } else {
            $('#servico_preco_sugerido').val(precoSugeridoServico);
            $('#servico_preco_de_venda').val(precoSugeridoServico);

            var lucroServico = (parseFloat(custo)) * (parseFloat(porcentagem) / 100);
            $('#servico_lucro').val(lucroServico);
        }
    });


    $('#servico_lucro').on('change', function() {
        var custo = $('#servico_lucro').val();
        var porcentagem = $('#servico_porcentagem_lucro').val();
        var precoSugeridoServico = (parseFloat(custo)) * (parseFloat(porcentagem) / 100) + parseFloat(custo);

        if (porcentagem === "") {
            return false;
        } else {
            $('#servico_preco_sugerido').val(precoSugeridoServico);
            $('#servico_preco_de_venda').val(precoSugeridoServico);

            var lucroServico = (parseFloat(custo)) * (parseFloat(porcentagem) / 100);
            $('#servico_lucro').val(lucroServico);
        }
    });

</script>
