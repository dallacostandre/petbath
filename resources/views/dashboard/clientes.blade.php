@component('dashboard.componentes.header')
@endcomponent
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 align-self-center">
                <div style="justify-content:space-between;display: flex;">
                    <h4 class="page-title" id="name_title">
                        Clientes
                    </h4>
                    <a type="button" aria-hidden="true" href="{{ route('cadastroCliente') }}"
                        class="btn btn-success botao-padrao">
                        @if ($clientes_cadastrados->isEmpty())
                            Cadastrar
                        @else
                            Novo Cliente
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if (!$clientes_cadastrados->isEmpty())
                        <div class="card-body">
                            <h4 class="card-title">Encontre Clientes, Edite e Notifique</h4>
                        </div>
                        <div class="container">
                            <input class="form-control form-control-sm" type="text" id="myInput" onkeyup="myFunction()"
                                placeholder="Pesquise pelo nome...">
                        </div>
                        <div class="table-responsive">

                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <tr class="text-center">
                                        <th>Status</th>
                                        <th>Nome</th>
                                        <th>Instagram</th>
                                        <th>Whats App</th>
                                        <th>Pets</th>
                                        <th>Ações</th>
                                        <th>Histórico</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes_cadastrados as $cliente)
                                        <tr class="text-center">
                                            <td><i class="fas fa-siren-on" style="color:red;"></i></td>
                                            <td>
                                                {{ Str::ucfirst($cliente->cliente_nome) }}
                                            </td>
                                            <td><a href="{{ 'http://instagram.com/' . $cliente->cliente_instagram }}">
                                                    {{ $cliente->cliente_instagram }}
                                                </a></td>
                                            <td>
                                                <a href="https://wa.me/+55{{ $cliente->cliente_whatsapp }}"
                                                    target="_blank">
                                                    <i class="fab fa-whatsapp" style="color:#24CC63"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a
                                                    href="{{ route('listaPets', ['uniqueIdCliente' => $cliente->unique_cliente]) }}">
                                                    <i class="fas fa-dog"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('editarDadosCliente', ['id' => $cliente->id]) }}"
                                                    data-bs-toggle="tooltip">
                                                    <i class="fas fa-user-edit"></i>
                                                </a> &nbsp;&nbsp;
                                                <a href="javascript:void(0)" class="excluirCliente"
                                                    data-id="{{ $cliente->id }}">
                                                    <i class="fad fa-trash"></i>
                                                </a>&nbsp;&nbsp;
                                                <a href="#" title="Notificar Cliente"
                                                    data-bs-placement="top" title="Notificações Cliente"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="fad fa-bells"></i>

                                                </a>&nbsp;&nbsp;
                                            </td>
                                            <td>
                                                <a href="{{ route('historico', ['id' => $cliente->id]) }}">
                                                    <i class="fal fa-history"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $clientes_cadastrados->links() }}
                    @else
                        <div class="card-body">
                            <h5>Nenhum cliente cadastrado.</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar Notificação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input class="form-control form-control-sm" type="text" placeholder="Descrição da Notificação">
                    </div>
                    <label for="">Data Notificação</label>
                    <div class="mb-3">
                        <input class="form-control form-control-sm" type="date">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success botao-padrao">
                        Adicionar Notificação
                    </button>
                </div>
            </div>
        </div>
    </div>


    @component('dashboard.componentes.footer')
    @endcomponent



    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
        $('.phone').mask('(00) 0 0000-0000');

        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        $('.excluirCliente').on('click', function() {
            var id = $(this).data("id");
            var url = '/excluir-cliente';
            var _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: url,
                type: "POST",
                dataType: "json",
                data: {
                    id: id,
                    _token: _token
                }
            }).done(function(data) {
                Swal.fire({
                    title: data.title,
                    text: data.message,
                    icon: data.icon,
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                })
                location.reload();
            }).fail(function(jqXHR, textStatus, data) {
                Swal.fire({
                    title: "Error",
                    text: jqXHR,
                    icon: "error",
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                })
                location.reload();
            });
        })
    </script>
