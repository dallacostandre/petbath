@component('componentes.header')
@endcomponent
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="container-fluid">
                        <h4>Fluxo de Caixa</h4>
                        <div style="display: flex; justify-content:flex-end;">
                            <div style="margin-right: 0.25rem" >
                                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Filtrar</button>
                            </div>
                            <div>
                                <button class="btn btn-success btn-sm" type="button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"> Novo Lançamento</button>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <table class="table table-hover">
                            <thead>
                                <th>Data</th>
                                <th>Descrição</th>
                                <th>Método</th>
                                <th>Entrada</th>
                                <th>Saída</th>
                                <th>Saldo</th>
                                <th>Ações</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>XXXXX</td>
                                    <td>XXXXX</td>
                                    <td>XXXXX</td>
                                    <td>XXXXX</td>
                                    <td>XXXXX</td>
                                    <td>XXXXX</td>
                                    <td>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Remover">
                                            <i class="fas fa-exchange-alt"></i></a>&nbsp;&nbsp;
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Alterar">
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

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">Offcanvas right</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="container">
            <p>Filtre pelas categorias:</p>
        </div>
        <div>
            <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label">Valor</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-2">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Forma de Pagamento</option>
                    <option value="1">Pix</option>
                    <option value="2">Débito</option>
                    <option value="3">Crédito</option>
                    <option value="3">Dinheiro</option>
                </select>
            </div>
            <div class="mb-2">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Natureza</option>
                    <option value="1">Entrada</option>
                    <option value="3">Saida</option>
                </select>
            </div>
            <div class="mb-2">
                <div class="input-group input-daterange">
                    <input type="text" class="form-control" value="2012-04-05">
                    <div class="input-group-addon">to</div>
                    <input type="text" class="form-control" value="2012-04-19">
                </div>
            </div>
            <div class="mb-2">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Pesquisar por descrição:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div class="container" style="display: flex; justify-content:space-between;">
            <a style="text-decoration: none;" href="http://">Limpar Filtro</a>
            <button type="button" name="" id="" class="btn btn-success btn-sm" btn-lg btn-block">Filtrar</button>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lançamento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option value="1">Despesa</option>
                        <option value="2">Receita</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input class="form-control form-control-sm" type="text" placeholder="Descrição">
                </div>
                <div class="mb-3">
                    <input class="form-control form-control-sm" type="text" placeholder="Valor">
                </div>
                <div class="mb-3">
                    <input class="form-control form-control-sm" type="text" placeholder="Descrição">
                </div>
                <div class="mb-3">
                    <select class="form-select form-select-sm"" aria-label=" Default select example">
                        <option value="1">Cartão</option>
                        <option value="2">Débito</option>
                        <option value="2">Pix</option>
                        <option value="2">Dinheiro</option>
                        <option value="2">Transferência</option>
                        <option value="3">Outro</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer mx-auto" >
                <button type="button" class="btn btn-success btn-sm">Adicionar</button>
            </div>
        </div>
    </div>
</div>
@component('componentes.footer')
@endcomponent

<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

    $('.phone').mask('(00) 0 0000-0000');
    var offcanvasElementList = [].slice.call(document.querySelectorAll('.offcanvas'))
    var offcanvasList = offcanvasElementList.map(function(offcanvasEl) {
        return new bootstrap.Offcanvas(offcanvasEl)
    })
</script>
