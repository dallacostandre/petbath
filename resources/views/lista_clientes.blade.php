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
                            <thead class="text-center">
                                <th>Status</th>
                                <th>Nome</th>
                                <th>Telefone p/ Recado</th>
                                <th>Instagram</th>
                                <th>Whats App</th>
                                <th>Ações</th>
                                <th>Histórico</th>
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
                                            <button class="btn btn-success btn-sm" type="button" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">Novo Lançamento
                                        </button>

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
@component('componentes.footer')
@endcomponent


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
