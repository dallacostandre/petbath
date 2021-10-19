@component('componentes.header')
@endcomponent
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div style="display: flex; justify-content:space-around;">
                        <div class="container" style="margin: auto;">
                            <h4>Histórico @Cliente</h4>
                            <p>...</p>
                        </div>
                        <div class="col col-2" style="float: right; margin:auto;">
                            <a type="button" aria-hidden="true" href="#"
                                class="btn btn-success">
                                Novo Agendamento
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>Pet</th>
                                <th>Servico</th>
                                <th>Data</th>
                                <th>Horário</th>
                                <th>Observações</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>@nomePet</td>
                                    <td>@nomeServico</td>
                                    <td>@dataAgendamento</td>
                                    <td>@horario</td>
                                    <td>@observacoes</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
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
</script>
