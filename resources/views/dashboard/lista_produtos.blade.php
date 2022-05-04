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
                                        <td>{{ $produto->produto_porcentagem_lucro }}</td>
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

<!-- Modal -->
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
                            <input type="text" class="form-control" name="produto_nome" id="produto_nome" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Categoria do Produto</label>
                            <input type="text" class="form-control" name="produto_categoria" id="produto_categoria"
                                required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Espécie</label>
                        <select class="form-control" name="produto_especie" id="produto_especie">
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
                            <input type="text" class="form-control codigo" name="produto_codigo" id="produto_codigo"
                                required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Custo Unitário</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">R$</div>
                            </div>
                            <input type="text" class="form-control money2" name="produto_custo" id="produto_custo"
                                required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Lucro</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" max="100" min="0"
                                name="produto_porcentagem_lucro" id="produto_porcentagem_lucro" required>
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
                            <input type="text" class="form-control" disabled name="precoSugeridoProduto"
                                id="precoSugeridoProduto">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Preço de Venda</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">R$</div>
                            </div>
                            <input type="text" class="form-control money2" required name="produto_preco_de_venda"
                                id="produto_preco_de_venda">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Lucro</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">R$</div>
                            </div>
                            <input type="text" class="form-control money2" disabled required name="produto_lucro"
                                id="produto_lucro">
                        </div>
                        <small class="form-text text-muted">Lucro estimado sem taxas e
                            impostos.
                        </small>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success botao-padrao float-end" id="adicionarProduto">
                    Adicionar
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

    $('.money2').mask("#.###,##", {
        reverse: true
    });
    $('.percent').mask('0000%', {
        reverse: true
    });
    $('.codigo').mask('AAAAAAAAAAAAAAAAAAA', {
        reverse: true
    });

    $('#adicionarProduto').on('click', function(e) {
        e.preventDefault();
        var url = "/cadastrar-produto";
        var produto_nome = $('#produto_nome').val();
        var produto_codigo = $('#produto_codigo').val();
        var produto_custo = $('#produto_custo').val();
        var produto_preco_de_venda = $('#produto_preco_de_venda').val();
        var produto_porcentagem_lucro = $('#produto_porcentagem_lucro').val();
        var produto_lucro = $('#produto_lucro').val();
        var produto_categoria = $('#produto_categoria').val();
        var produto_especie = $('#produto_especie').val();
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
                produto_categoria: produto_categoria,
                produto_especie: produto_especie,
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
            $('#produto_nome').val(data.dados.produto_nome);
            $('#produto_codigo').val(data.dados.produto_codigo);
            $('#produto_custo').val(data.dados.produto_custo);
            $('#produto_preco_de_venda').val(data.dados.produto_preco_de_venda);
            $('#produto_porcentagem_lucro').val(data.dados.produto_porcentagem_lucro);
            $('#produto_lucro').val(data.dados.produto_lucro);
            $('#produto_categoria').val(data.dados.produto_categoria);
            $('#modalCadastroProduto').modal('show');

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

    $('#produto_porcentagem_lucro').on('keyup', function() {
        var custo = $('#produto_custo').val();
        custo = custo.replace(".", "").replace(",", ".");
        var porcentagem = parseFloat($('#produto_porcentagem_lucro').val())/100;
        var precoSugeridoProduto = Math.floor(custo * porcentagem) + parseFloat(custo);

        if (custo === "") {
            return false;
        } else {
            $('#precoSugeridoProduto').val(precoSugeridoProduto);
            $('#produto_preco_de_venda').val(precoSugeridoProduto);

            var produto_lucro = (parseFloat(precoSugeridoProduto) - parseFloat(custo)).toFixed(2);
            $('#produto_lucro').val(produto_lucro);
        }
    });

    $('#produto_custo').on('keyup', function() {
        var custo = $('#produto_custo').val();
        var porcentagem = $('#produto_porcentagem_lucro').val();
        porcentagem = porcentagem.replace("%", "");
        custo = custo.replace(".", "").replace(",", ".");
        parseFloat(custo.replace);
        porcentagem = parseFloat(porcentagem / 100);
        var precoSugeridoProduto = Math.floor(custo * porcentagem) + parseFloat(custo);

        if (porcentagem === "") {
            return false;
        } else {
            $('#precoSugeridoProduto').val(precoSugeridoProduto);
            $('#produto_preco_de_venda').val(precoSugeridoProduto);
            var produto_lucro = (parseFloat(precoSugeridoProduto) - parseFloat(custo)).toFixed(2);
            $('#produto_lucro').val(produto_lucro);
        }
    });
</script>
