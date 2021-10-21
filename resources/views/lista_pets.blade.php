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
                            <h4>Meus Clientes Pets</h4>
                            <p>Here is a subtitle for this table</p>
                        </div>
                        <div class="col col-2" style="float: right; margin:auto;">
                            <a type="button" aria-hidden="true" href="{{ url('/cadastro-pet') }}"
                                class="btn btn-success">
                                Cadastrar Pet
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>Pet</th>
                                <th>Raça</th>
                                <th>Porte</th>
                                <th>Último Agendamento</th>
                                <th>Próximo Agendamento</th>
                                <th>Nome Dono</th>
                                <th>Ações</th>
                            </thead>
                            <tbody>
                                @foreach ($pets as $pet)
                                    <tr>
                                        <td>{{ $pet->pet_nome }}</td>
                                        <td>{{ $pet->pet_raca }}</td>
                                        <td>{{ $pet->pet_porte }}</td>
                                        <td>@dataUltimoAgendamento</td>
                                        <td>@dataProximoAgendamento</td>
                                        <td>@nomeDono</td>
                                        <td>
                                            <a href="{{ url('editar-pet/' . $pet->id) }}" data-toggle="tooltip"
                                                data-placement="top" title="Editar Pet">
                                                <i class="fas fa-user-edit"></i></a> &nbsp;&nbsp;
                                            <a href="{{ url('excluir-pet/' . $pet->id) }}" data-toggle="tooltip"
                                                data-placement="top" title="Excluir Pet">
                                                <i class="fad fa-trash"></i></a>&nbsp;&nbsp;
                                        </td>
                                        <td>
                                            <a href="{{ url('historico-pet/'.$pet->id) }}" data-toggle="tooltip"
                                                data-placement="top" title="Histórico Pet">
                                                <i class="fal fa-history"></i>
                                            </a>
                                        </td>
                                @endforeach
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
