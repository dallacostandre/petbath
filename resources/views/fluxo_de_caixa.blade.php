@component('componentes.header')
@endcomponent
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="container" style="display: flex; justify-content:space-between;">
                        <h4>Fluxo de Caixa</h4>
                        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                            Filtros
                        </button>
                    </div>
                    <div class="card-body ">
                        <table class="table table-striped">
                            <thead>
                                <th>Descrição</th>
                                <th>Método de Pagamento</th>
                                <th>Data Pagamento</th>
                                <th>Entrada</th>
                                <th>Saída</th>
                                <th>Saldo</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>XXXXX</td>
                                    <td>XXXXX</td>
                                    <td>XXXXX</td>
                                    <td>XXXXX</td>
                                    <td>XXXXX</td>
                                    <td>XXXXX</td>
                                </tr>
                                <tr>
                                    <td>XXXXX</td>
                                    <td>XXXXX</td>
                                    <td>XXXXX</td>
                                    <td>XXXXX</td>
                                    <td>XXXXX</td>
                                    <td>XXXXX</td>
                                </tr>
                                <tr>
                                    <td>XXXXX</td>
                                    <td>XXXXX</td>
                                    <td>XXXXX</td>
                                    <td>XXXXX</td>
                                    <td>XXXXX</td>
                                    <td>XXXXX</td>
                                </tr>
                                <tr>
                                    <td>XXXXX</td>
                                    <td>XXXXX</td>
                                    <td>XXXXX</td>
                                    <td>XXXXX</td>
                                    <td>XXXXX</td>
                                    <td>XXXXX</td>
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
            <a class="nav-item" href="http://">Limpar Filtro</a>
            <button type="button" name="" id="" class="btn btn-primary" btn-lg btn-block">Filtrar</button>
        </div>

    </div>
</div>
@component('componentes.footer')
@endcomponent

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

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
