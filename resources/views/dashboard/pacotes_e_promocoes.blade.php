@component('dashboard.componentes.header')@endcomponent
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 pb-3 align-self-center">
                <h4 class="page-title">Pacotes</h4>
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
                            Adicionar Pacote
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div>
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Nome Pacote</label>
                                                    <input type="text" class="form-control"
                                                        name="servico_nome"
                                                        id="Nome do Pacote">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Descrição do Pacote</label>
                                                    <input type="text" class="form-control"
                                                        name="servico_nome"
                                                        id="servico_nome">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Frequência</label>
                                                    <select class="form-select">
                                                        <option value="mensal">Mensal</option>
                                                        <option value="semestral">Semestral</option>
                                                        <option value="anual">Anual</option>
                                                      </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Servico</label>
                                                    <select class="form-select">
                                                        @foreach ($servicos as $servico)
                                                            <option value="{{ $servico->id }}">{{ $servico->servico_nome }}</option>
                                                        @endforeach
                                                      </select>
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

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Custo</label>
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
                                        <button type="button" class="btn btn-success botao-padrao float-end " 
                                        id="cadastrarServico">Adicionar
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
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Pacotes Cadastrados
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-body table-responsive">
                                    <table class="table table-striped table-hover table-sm">
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
                                                    <a href="{{ url('editar-servico/') }}"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Editar Servico">
                                                        <i class="fas fa-user-edit"></i></a> &nbsp;&nbsp;
                                                    <a href="{{ url('excluir-servico/')}}"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Excluir Servico">
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

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 pb-3 align-self-center">
                <h4 class="page-title">Promoções</h4>
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
                            Adicionar Promoção
                        </button>
                    </h2>
                    <div id="collapsetres" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div>
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Nome Promoção</label>
                                                    <input type="text" class="form-control"
                                                        name="servico_nome"
                                                        id="servico_nome">
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <label>Descrição do Pacote</label>
                                                    <input type="text" class="form-control"
                                                        name="servico_nome"
                                                        id="servico_nome">
                                                </div>
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
                                        <button type="button" class="btn btn-success botao-padrao float-end"
                                            id="cadastrarServico">Adicionar</button>
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
                            Promoções Cadastradas
                        </button>
                    </h2>
                    <div id="collapseQuatro" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-body table-responsive">
                                    <table class="table table-striped table-hover table-sm">
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
                                                    <a href="{{ url('editar-servico/') }}"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Editar Servico">
                                                        <i class="fas fa-user-edit"></i></a> &nbsp;&nbsp;
                                                    <a href="{{ url('excluir-servico/')}}"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Excluir Servico">
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
@component('dashboard.componentes.footer')@endcomponent