@component('dashboard.componentes.header')@endcomponent
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Clientes</h4>
                    </div>
                    <div class="col col-6 botao-padrao-topo">
                        <a type="button" aria-hidden="true" href="{{ url('/cadastro-cliente') }}"
                        class="btn btn-success botao-padrao">
                        Novo Cliente
                    </a>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Encontre Clientes, Edite e Notifique</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Status</th>
                                            <th>Nome</th>
                                            <th>Telefone p/ Recado</th>
                                            <th>Instagram</th>
                                            <th>Whats App</th>
                                            <th>Ações</th>
                                            <th>Histórico</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clientes_cadastrados as $cliente)
                                            <tr class="text-center">
                                                <td><i class="fas fa-siren-on" style="color:red;"></i></td>
                                                <td>{{ Str::ucfirst($cliente->cliente_nome) }}</td>
                                                <td class="phone">{{ $cliente->cliente_telefone }}</td>
                                                <td>Instagram Cliente</td>
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
                                                        <i class="fas fa-user-circle"></i>
                                                    </a>&nbsp;&nbsp;
                                                    <a href="{{ url('visualizar-cliente/' . $cliente->id) }}"
                                                        data-toggle="tooltip" data-placement="top" title="Notificar Cliente">
                                                        <i class="fad fa-bells"></i>
                                                    </a>&nbsp;&nbsp;
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
@component('dashboard.componentes.footer')@endcomponent

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Notificação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <input class="form-control form-control-sm" type="text" placeholder="Descrição Lembrete">
                </div>
                <label for="">Data Inicial</label>
                <div class="mb-3">
                    <input class="form-control form-control-sm" type="date">
                </div>
                <label for="">Notificar em:</label>
                <div class="mb-3">
                    <select class="form-select form-select-sm"" aria-label=" Default select example">
                        <option value="1">5 dias </option>
                        <option value="2">10 dias</option>
                        <option value="2">15 dias</option>
                        <option value="2">20 dias</option>
                        <option value="2">25 dias</option>
                        <option value="3">30 dias</option>
                        <option value="3">40 dias</option>
                        <option value="3">50 dias</option>
                        <option value="3">60 dias</option>
                        <option value="3">70 dias</option>
                        <option value="3">80 dias</option>
                        <option value="3">90 dias</option>
                    </select>
                </div>

                <label for="">Data Final</label>
                <div class="mb-3">
                    <input class="form-control form-control-sm" type="date" disabled>
                </div>
            </div>
            <div class="modal-footer mx-auto" >
                <button type="button" class="btn btn-success btn-sm">Add Notificação</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

    $('.phone').mask('(00) 0 0000-0000');

    var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})
</script>