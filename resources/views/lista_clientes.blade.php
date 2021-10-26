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
                            <h4>Meus Clientes</h4>
                            <p>Here is a subtitle for this table</p>
                        </div>
                        <div class="col col-2" style="float: right; margin:auto;">
                            <a type="button" aria-hidden="true" href="{{ url('/cadastro-cliente') }}"
                                class="btn btn-success">
                                Novo Cliente
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>Nome</th>
                                <th>Pet</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Whats App</th>
                                <th>Whats App</th>
                                <th>Ações</th>
                                <th>Histórico</th>
                            </thead>
                            <tbody>
                                @foreach ($clientes_cadastrados as $cliente)
                                    <tr>
                                        <td>{{ $cliente->cliente_nome }}</td>
                                        <td>@Pets</td>
                                        <td>{{ $cliente->cliente_email }}</td>
                                        <td class="phone">{{ $cliente->cliente_telefone }}</td>
                                        <td class="phone" >{{ $cliente->cliente_whatsapp }}</td>
                                        <td>
                                            <a href="https://wa.me/+55{{ $cliente->cliente_whatsapp }}"
                                                target="_blank" data-toggle="tooltip" data-placement="top"
                                                title="Enviar Mensagem">
                                                <i class="fab fa-whatsapp" style="color:#24CC63"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ url('editar-cliente/' . $cliente->id) }}"
                                                data-toggle="tooltip" data-placement="top" title="Editar Cliente">
                                                <i class="fas fa-user-edit"></i></a> &nbsp;&nbsp;
                                            <a href="{{ url('excluir-cliente/' . $cliente->id) }}"
                                                data-toggle="tooltip" data-placement="top" title="Excluir Cliente">
                                                <i class="fad fa-trash"></i></a>&nbsp;&nbsp;
                                            <a href="{{ url('visualizar-cliente/' . $cliente->id) }}"
                                                data-toggle="tooltip" data-placement="top" title="Visualizar Cliente">
                                                <i class="fas fa-user-circle"></i></a>&nbsp;&nbsp;
                                        </td>
                                        <td>
                                            <a href="{{ url('historico-cliente/' . $cliente->id) }}"
                                                data-toggle="tooltip" data-placement="top" title="Histórico Cliente">
                                                <i class="fal fa-history"></i>
                                            </a>
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

<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

    $('.phone').mask('(00) 0 0000-0000');
</script>
