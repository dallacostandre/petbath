@component('dashboard.componentes.header')
@endcomponent

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 align-self-center">
                <div style="justify-content:space-between;display: flex;">
                    <h4 class="page-title" id="name_title">
                        Produtos Cadastrados
                    </h4>
                    <a type="button" aria-hidden="true" href="#" class="btn btn-success botao-padrao"
                        data-bs-toggle="modal" data-bs-target="#modalCadastroProduto">
                        Cadastrar Produto
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="container pt-4">
                        <input class="form-control" type="text" id="myInput" onkeyup="pesquisarPor()"
                            placeholder="Pesquise pelo produto...">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover text-center" id="produtosTable">
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
                                @foreach ($produtos as $produto)
                                    <tr class="text-center">
                                        <td>{{ $produto->produto_codigo == null ? ' - ' : $produto->produto_codigo }}
                                        </td>
                                        <td>{{ $produto->produto_nome }}</td>
                                        <td>R$ {{ $produto->produto_custo }}</td>
                                        <td>{{ $produto->produto_porcentagem_lucro }} %</td>
                                        <td>R${{ number_format($produto->produto_preco_de_venda, 2, ',', '.') }}
                                        </td>
                                        <td>R$
                                            {{ number_format($produto->produto_lucro, 2, ',', '.') }}
                                        </td>
                                        <td>
                                            <a href="#" data-toggle="tooltip" class="visualizarModalProduto"
                                                data-id={{ $produto->id }} data-placement="top"
                                                title="Editar Produto">
                                                <i class="fas fa-user-edit"></i></a> &nbsp;&nbsp;
                                            <a href="{{ url('excluir-produto/') }}" class="removerProduto"
                                                data-id={{ $produto->id }} data-toggle="tooltip" data-placement="top"
                                                title="Excluir Produto">
                                                <i class="fad fa-trash"></i></a>&nbsp;&nbsp;
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $produtos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Cadastro -->
<div class="modal fade" id="modalCadastroProduto" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dados Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nome Produto</label>
                            <input type="text" class="form-control" name="cadastro_produto_nome"
                                id="cadastro_produto_nome" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Categoria do Produto</label>
                            <input type="text" class="form-control" name="produto_categoria"
                                id="cadastro_produto_categoria" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Espécie</label>
                        <select class="form-control" name="cadastro_produto_especie" id="cadastro_produto_especie">
                            <option value="felino">Felino</option>
                            <option value="canino">Canino</option>
                            <option value="outro">Outro</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Codigo do Produto</label>
                            <input type="text" class="form-control codigo" name="cadastro_produto_codigo"
                                id="cadastro_produto_codigo" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Custo Unitário</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">R$</div>
                            </div>
                            <input type="text" class="form-control money" name="cadastro_produto_custo"
                                id="cadastro_produto_custo" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Lucro (percentual)</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control percent" max="100" min="0"
                                name="cadastro_produto_porcentagem_lucro" id="cadastro_produto_porcentagem_lucro"
                                required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Preço Sugerido</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">R$</div>
                            </div>
                            <input type="text" class="form-control" disabled name="cadastro_preco_sugerido"
                                id="cadastro_preco_sugerido">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Preço de Venda</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">R$</div>
                            </div>
                            <input type="text" class="form-control money" required
                                name="cadastro_produto_preco_de_venda" id="cadastro_produto_preco_de_venda">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Lucro (em reais)</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">R$</div>
                            </div>
                            <input type="text" class="form-control money" disabled required
                                name="cadastro_produto_lucro" id="cadastro_produto_lucro">
                        </div>
                        <small class="form-text text-muted">Lucro estimado sem taxas e impostos.
                        </small>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success botao-padrao float-end" id="adicionarProduto" data-id="">
                    Adicionar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Editar -->
<div class="modal fade" id="modalEditarProduto" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dados Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nome Produto</label>
                            <input type="text" class="form-control" name="editar_produto_nome" id="editar_produto_nome" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Categoria do Produto</label>
                            <input type="text" class="form-control" name="editar_produto_categoria" id="editar_produto_categoria" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Espécie</label>
                        <select class="form-control" name="editar_produto_especie" id="editar_produto_especie">
                            <option value="felino">Felino</option>
                            <option value="canino">Canino</option>
                            <option value="outro">Outro</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Codigo do Produto</label>
                            <input type="text" class="form-control codigo" name="editar_produto_codigo"
                                id="editar_produto_codigo" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Custo Unitário</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">R$</div>
                            </div>
                            <input type="text" class="form-control 2" name=editar_produto_custo" id="editar_produto_custo" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Lucro (percentual)</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control percent" max="100" min="0"
                                name="editar_produto_porcentagem_lucro" id="editar_produto_porcentagem_lucro" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Preço Sugerido</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">R$</div>
                            </div>
                            <input type="text" class="form-control" disabled name="editar_preco_sugerido" id="editar_preco_sugerido">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Preço de Venda</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">R$</div>
                            </div>
                            <input type="text" class="form-control 2" required name="editar_produto_preco_de_venda" id="editar_produto_preco_de_venda">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Lucro (em reais)</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">R$</div>
                            </div>
                            <input type="text" class="form-control 2" disabled required name="editar_produto_lucro" id="editar_produto_lucro">
                        </div>
                        <small class="form-text text-muted">Lucro estimado sem taxas e impostos.
                        </small>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success botao-padrao float-end" id="atualizarProduto" data-id="">
                    Salvar
                </button>
            </div>
        </div>
    </div>
</div>


@component('dashboard.componentes.footer')
@endcomponent

<script>
    $(document).ready(function() {
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })

    });

    function pesquisarPor() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("produtosTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    $('.money').mask("000.000,00", {reverse: true});
    $('.percent').mask('0000', {
        reverse: true
    });
    $('.codigo').mask('AAAAAAAAAAAAAAAAAAA', {
        reverse: true
    });

    $('#adicionarProduto').on('click', function(e) {
        e.preventDefault();
        var url = "/cadastrar-produto";
        var cadastro_produto_nome = $('#cadastro_produto_nome').val();
        var cadastro_produto_codigo = $('#cadastro_produto_codigo').val();
        var cadastro_produto_custo = $('#cadastro_produto_custo').val();
        var cadastro_produto_preco_de_venda = $('#cadastro_produto_preco_de_venda').val();
        var cadastro_produto_porcentagem_lucro = $('#cadastro_produto_porcentagem_lucro').val();
        var cadastro_produto_lucro = $('#cadastro_produto_lucro').val();
        var cadastro_produto_categoria = $('#cadastro_produto_categoria').val();
        var cadastro_produto_especie = $('#cadastro_produto_especie').val();
        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: url,
            method: 'POST',
            dataType: 'JSON',
            data: {
                produto_nome: cadastro_produto_nome,
                produto_porcentagem_lucro: cadastro_produto_porcentagem_lucro,
                produto_codigo: cadastro_produto_codigo,
                produto_custo: cadastro_produto_custo,
                produto_preco_de_venda: cadastro_produto_preco_de_venda,
                produto_lucro: cadastro_produto_lucro,
                produto_categoria: cadastro_produto_categoria,
                produto_especie: cadastro_produto_especie,
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
                        location.reload();
                    }, 1000);
                }
            },
            error: function(data) {
                Swal.fire({
                    icon: 'error',
                    title: 'Atenção',
                    text: 'Não foi possível adicionar o produto. Erro de conexão.',
                    button: "Voltar",
                });
            }
        });
    });

    $('.removerProduto').on('click', function(e) {
        e.preventDefault();
        var url = "/excluir-produto";
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

    $('.visualizarModalProduto').on('click', function() {
        var id = $(this).data('id');
        var url = '/visualizar-dados-produto';
        var _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            data: {
                id: id,
                _token: _token
            }
        }).done(function(data) {
            $('#editar_produto_nome').val(data.dados.produto_nome);
            $('#editar_produto_codigo').val(data.dados.produto_codigo);
            $('#editar_produto_custo').val(data.dados.produto_custo);
            $('#editar_produto_preco_de_venda').val(data.dados.produto_preco_de_venda);
            $('#editar_produto_porcentagem_lucro').val(data.dados.produto_porcentagem_lucro);
            $('#editar_produto_lucro').val(data.dados.produto_lucro);
            $('#editar_produto_categoria').val(data.dados.produto_categoria);
            $('#atualizarProduto').attr('data-id', id);
            $('#modalEditarProduto').modal('show');

        }).fail(function(jqXHR, textStatus, data) {
            Swal.fire({
                title: "Error",
                text: jqXHR,
                icon: "error",
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        });
    });

    $('#atualizarProduto').on('click', function(e) {
        e.preventDefault();
        var url = "/atualizar-produto";
        var id = $(this).data('id');
        var editar_produto_nome = $('#editar_produto_nome').val();
        var editar_produto_codigo = $('#editar_produto_codigo').val();
        var editar_produto_custo = $('#editar_produto_custo').val();
        var editar_produto_preco_de_venda = $('#editar_produto_preco_de_venda').val();
        var editar_produto_porcentagem_lucro = $('#editar_cadastro_produto_porcentagem_lucro').val();
        var editar_produto_lucro = $('#editar_produto_lucro').val();
        var editar_produto_categoria = $('#editar_produto_categoria').val();
        var editar_produto_especie = $('#editar_produto_especie').val();
        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: url,
            method: 'POST',
            dataType: 'JSON',
            data: {
                id: id,
                produto_nome: editar_produto_nome,
                produto_porcentagem_lucro: editar_produto_porcentagem_lucro,
                produto_codigo: editar_produto_codigo,
                produto_custo: editar_produto_custo,
                produto_preco_de_venda: editar_produto_preco_de_venda,
                produto_lucro: editar_produto_lucro,
                produto_categoria: editar_produto_categoria,
                produto_especie: editar_produto_especie,
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
                        location.reload();
                    }, 1000);
                }
            },
            error: function(data) {
                Swal.fire({
                    icon: 'error',
                    title: 'Atenção',
                    text: 'Não foi possível adicionar o produto. Erro de conexão.',
                    button: "Voltar",
                });
            }
        });
    });

    $('#cadastro_produto_porcentagem_lucro').on('keyup', function() {
        var custo = $('#cadastro_produto_custo').val();
        custo = custo.replace(".", "").replace(",", ".");
        var porcentagem = parseFloat($('#cadastro_produto_porcentagem_lucro').val()) / 100;
        var preco_sugerido = Math.floor(custo * porcentagem) + parseFloat(custo);

        if (custo === "") {
            return false;
        } else {
            $('#cadastro_preco_sugerido').val(preco_sugerido);
            $('#cadastro_produto_preco_de_venda').val(preco_sugerido);

            var produto_lucro = (parseFloat(preco_sugerido) - parseFloat(custo)).toFixed(2);
            $('#cadastro_produto_lucro').val(produto_lucro);
        }
    });

    $('#cadastro_produto_custo').on('keyup', function() {
        var custo = $('#cadastro_produto_custo').val();
        custo = custo.replace(".", "").replace(",", ".");
        var porcentagem = parseFloat($('#cadastro_produto_porcentagem_lucro').val()) / 100;
        var preco_sugerido = Math.floor(custo * porcentagem) + parseFloat(custo);

        if (custo === "") {
            return false;
        } else {
            $('#cadastro_preco_sugerido').val(preco_sugerido);
            $('#cadastro_produto_preco_de_venda').val(preco_sugerido);

            var produto_lucro = (parseFloat(preco_sugerido) - parseFloat(custo)).toFixed(2);
            $('#cadastro_produto_lucro').val(produto_lucro);
        }
    });

    $('#editar_produto_porcentagem_lucro').on('keyup', function() {
        var custo = $('#editar_produto_custo').val();
        custo = custo.replace(".", "").replace(",", ".");
        var porcentagem = parseFloat($('#editar_produto_porcentagem_lucro').val()) / 100;
        var preco_sugerido = Math.floor(custo * porcentagem) + parseFloat(custo);

        if (custo === "") {
            return false;
        } else {
            $('#editar_preco_sugerido').val(preco_sugerido);
            $('#editar_produto_preco_de_venda').val(preco_sugerido);

            var produto_lucro = (parseFloat(preco_sugerido) - parseFloat(custo)).toFixed(2);
            $('#editar_produto_lucro').val(produto_lucro);
        }
    });

    $('#editar_produto_custo').on('keyup', function() {
        var custo = $('#editar_produto_custo').val();
        custo = custo.replace(".", "").replace(",", ".");
        var porcentagem = parseFloat($('#editar_produto_porcentagem_lucro').val()) / 100;
        var preco_sugerido = Math.floor(custo * porcentagem) + parseFloat(custo);

        if (custo === "") {
            return false;
        } else {
            $('#editar_preco_sugerido').val(preco_sugerido);
            $('#editar_produto_preco_de_venda').val(preco_sugerido);

            var produto_lucro = (parseFloat(preco_sugerido) - parseFloat(custo)).toFixed(2);
            $('#editar_produto_lucro').val(produto_lucro);
        }
    });

    
</script>
