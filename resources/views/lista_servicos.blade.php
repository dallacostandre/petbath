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
                            <h4>Meus Serviços</h4>
                            <p>Here is a subtitle for this table</p>
                        </div>
                        <div class="col col-2" style="float: right; margin:auto;">
                            <a type="button" aria-hidden="true" href="{{url('/cadastro-servico')}}" class="btn btn-success">
                                Novo Serviço
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped table-hover table-sm">
                            <thead>
                                <th>Nome Serviço</th>
                                <th>Tempo</th>
                                <th>Preço</th>
                                <th>Porte</th>
                                <th>Ações</th>
                            </thead>
                            <tbody>
                                @foreach ($servicos as $servico)
                                <tr>
                                    <td>{{$servico->servico_nome}}</td>
                                    <td>{{$servico->servico_tempo}}</td>
                                    <td>{{$servico->servico_preco}}</td>
                                    <td>{{$servico->servico_pet_porte}}</td>
                                    <td>
                                        <a href="{{ url('editar-servico/' . $servico->id) }}" data-toggle="tooltip" data-placement="top" title="Editar Servico">
                                        <i class="fas fa-user-edit"></i></a> &nbsp;&nbsp;
                                        <a href="{{ url('excluir-servico/' . $servico->id) }}" data-toggle="tooltip" data-placement="top" title="Excluir Servico">
                                        <i class="fad fa-trash"></i></a>&nbsp;&nbsp;
                                    </td>
                                </tr>
                                @endforeach
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
