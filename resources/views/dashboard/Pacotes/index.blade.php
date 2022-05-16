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
                    <h4 class="page-title" id="name_title">Pacotes Promocionais</h4>
                    <a type="button" aria-hidden="true" href="{{ route('pacotes.promocionais.create') }}"
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
                            onkeyup="pesquisarPor()" placeholder="Pesquise por pacotes promocionais..."></div>
                    <div class="table-responsive">
                        <table class="table table-hover text-center" id="servicosTable">
                            <thead>
                                <th>Codigo </th>
                                <th>Nome Pacote</th>
                                <th>Preço Sugerido</th>
                                <th>Preço Venda</th>
                                <th>Desconto</th>
                                <th>Ações</th>
                            </thead>
                            <tbody>
                                @foreach ($pacotePromocional as $pacote)
                                    <tr class="text-center">
                                        <td>
                                            {{ $pacote->unique_pacote_promocional }}
                                        </td>
                                        <td>{{ $pacote->pacote_nome }}</td>
                                        <td>R$ {{ number_format($pacote->pacote_total_preco_sugerido, 2, ',', '.') }}
                                        </td>
                                        <td>R$ {{ number_format($pacote->pacote_total_preco_de_venda, 2, ',', '.') }}
                                        </td>
                                        <td>{{ $pacote->pacote_porcentagem_desconto }}%</td>
                                        <td>
                                            <a href="{{ url('editar-servico/') }}" data-toggle="tooltip"
                                                data-placement="top" title="Editar Servico">
                                                <i class="fas fa-user-edit"></i>
                                            </a>
                                            &nbsp;&nbsp;
                                            <a href="#" data-toggle="tooltip" data-placement="top" class="excluirPacotePromocional" data-id="{{$pacote->id}}" 
                                                title="Excluir Pacote Promocional">
                                                <i class="fad fa-trash"></i>
                                            </a>
                                            &nbsp;&nbsp;
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $pacotePromocional->links() }}
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
                            <label>Serviço ou Produto</label>
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
                                style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Observações Adicionais</label>
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
                    data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success botao-padrao float-end" id="adicionarServico">
                    Cadastrar
                </button>
            </div>
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


<script>
    $(document).ready(function() {
        $('.excluirPacotePromocional').on('click', function() {
            var id = $(this).data('id');
                var url = '/excluir-pacote-promocional';
                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: url,
                    type: "DELETE",
                    dataType: "json",
                    data: {
                        id: id,
                        _token: _token
                    }
                }).done(function(data) {
                    Swal.fire({
                        title: data.title,
                        text: data.message,
                        icon: data.icon,
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                    location.reload();
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

    });
</script>
