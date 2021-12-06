@component('dashboard.componentes.header')@endcomponent
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="card-title">Relatório de Pagamento</h4>
                    </div>
                    <div class="col col-6 botao-padrao-topo">
                        <a type="button" aria-hidden="true" class="btn btn-success botao-padrao">  Plano Premium </a>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Plano</th>
                                            <th>Descrição</th>
                                            <th>Data de Pagamento</th>
                                            <th>Status</th>
                                            <th>Ações</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr class="text-center">
                                                <td>Plano Premium</td>
                                                <td>Lorem Lorem Lorem</td>
                                                <td>01/02/2022</td>
                                                <td>Pagamento Realizado</td>
                                                <td><span aria-hidden="true" disabled> -  </span></td>
                                            </tr>
                                            <tr class="text-center">
                                                <td>Plano Premium</td>
                                                <td>Lorem Lorem Lorem</td>
                                                <td>01/02/2022</td>
                                                <td>Pagamento Não Aprovado</td>
                                                <td><a type="button" aria-hidden="true" href="#" class="btn btn-danger" style="color: white"> Verificar </a></td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@component('dashboard.componentes.footer')@endcomponent