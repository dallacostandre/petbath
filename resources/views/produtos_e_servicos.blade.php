@component('componentes.header')@endcomponent
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .accordion-button{
            background-color: #74A29F;
            color: white;
            padding-top:1%;
        }
    </style>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2><i class="fas fa-dog"></i>Produtos</h2>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                Adicionar Produto
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div>
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nome Produto</label>
                                                        <input type="text" class="form-control"
                                                            name="servico_nome"
                                                            id="servico_nome">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Codigo do Prod.</label>
                                                        <input type="text" class="form-control"
                                                            name="servico_nome"
                                                            id="servico_nome">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Custo Unitário</label>
                                                        <input type="text" class="form-control"
                                                            name="servico_nome"
                                                            id="servico_nome">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>% de Lucro</label>
                                                        <input type="text" class="form-control"
                                                            name="servico_nome"
                                                            id="servico_nome">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Preço Sugerido</label>
                                                        <input type="text" class="form-control"
                                                            name="servico_nome"
                                                            id="servico_nome">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Preço de Venda</label>
                                                        <input type="text" class="form-control"
                                                            name="servico_nome"
                                                            id="servico_nome">
                                                    </div>
                                                </div>
                                            </div>

                                    </div>
                                    <button type="button" class="btn btn-info btn-fill float-end"
                                        id="cadastrarServico">Adicionar</button>
                                    <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Produtos Cadastrados
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="strpied-tabled-with-hover">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-sm">
                                        <thead>
                                            <th>Cod. Produto</th>
                                            <th>Nome Produto</th>
                                            <th>Custo Unit.</th>
                                            <th>% de Lucro</th>
                                            <th>Preço Sugerido</th>
                                            <th>Preço Venda</th>
                                            <th>Ações</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>xxxx</td>
                                                <td>xxxx</td>
                                                <td>xxxx</td>
                                                <td>xxxxx</td>
                                                <td>xxxxx</td>
                                                <td>xxxxx</td>
                                                <td>
                                                    <a href="{{ url('editar-produto/') }}" data-toggle="tooltip"
                                                        data-placement="top" title="Editar Produto">
                                                        <i class="fas fa-user-edit"></i></a> &nbsp;&nbsp;
                                                    <a href="{{ url('excluir-produto/') }}" data-toggle="tooltip"
                                                        data-placement="top" title="Excluir Produto">
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
            <h2><i class="fas fa-dog"></i>Serviços</h2>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Adicionar Serviço
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div>
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Nome Serviço</label>
                                                    <input type="text" class="form-control"
                                                        name="servico_nome"
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
                                                    <input type="text" class="form-control money2"
                                                        name="servico_preco"
                                                        id="servico_preco">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">% de Lucro</label>
                                                    <input type="text" class="form-control money2"
                                                        name="servico_preco"
                                                        id="servico_preco">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Preço Sugerido</label>
                                                    <input type="text" class="form-control money2"
                                                        name="servico_preco"
                                                        id="servico_preco">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Preço de Venda</label>
                                                    <input type="text" class="form-control money2"
                                                        name="servico_preco"
                                                        id="servico_preco">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-info btn-fill float-end"
                                            id="cadastrarServico">Adicionar</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Serviços Cadastrados
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                        data-bs-parent="#accordionFlushExample">
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
</div>
@component('componentes.footer')
@endcomponent

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
    $('.money2').mask("#.##0,00", {
        reverse: true
    });
</script>

<script>
    $('#cadastrarServico').on('click', function() {
        event.preventDefault();
        var url = '/add-novo-servico';
        var servico_nome = $('#servico_nome').val();
        var servico_tempo = $('#servico_tempo').val();
        var servico_preco = $('#servico_preco').val();
        var servico_pet_porte = $('#servico_pet_porte').val();
        var _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: url,
            type: "post",
            dataType: "json",
            data: {
                servico_nome: servico_nome,
                servico_tempo: servico_tempo,
                servico_preco: servico_preco,
                servico_pet_porte: servico_pet_porte,
                _token: _token
            }
        }).done(function(data) {
            Swal.fire({
                title: data.title,
                message: data.message,
                icon: data.icon,
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
            if (data.url) {
                window.location.href = data.url;
            }

        }).fail(function(jqXHR, textStatus, data) {
            Swal.fire({
                title: "Error",
                message: jqXHR,
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
</script>
