@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 align-self-center">
                    <div style="justify-content:space-between;display: flex;">
                        <h4 class="page-title" id="name_title">
                            Clientes
                        </h4>
                        <a type="button" aria-hidden="true" href="{{ route('cliente.create') }}"
                            class="btn btn-success botao-padrao">
                            Cadastrar
                        </a>
                    </div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard.index') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Clientes</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @if (!$clientes_cadastrados->isEmpty())
                            <div class="container pt-4">
                                <input class="form-control form-control-sm" type="text" id="myInput"
                                    onkeyup="pesquisarPor()" placeholder="Pesquise pelo nome...">
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover" id="clienteTable">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Status</th>
                                            <th>Nome</th>
                                            <th>Instagram</th>
                                            <th>Whats App</th>
                                            <th>Pets</th>
                                            <th>A????es</th>
                                            <th>Hist??rico</th>
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
                                                        href="{{ route('pet.index', ['uniqueIdCliente' => $cliente->unique_cliente]) }}">
                                                        <i class="fas fa-dog"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('cliente.edit', ['id' => $cliente->id]) }}"
                                                        data-bs-toggle="tooltip">
                                                        <i class="fas fa-user-edit"></i>
                                                    </a> &nbsp;&nbsp;
                                                    <a href="javascript:void(0)" class="excluirCliente"
                                                        data-id="{{ $cliente->id }}">
                                                        <i class="fad fa-trash"></i>
                                                    </a>&nbsp;&nbsp;
                                                    <a href="#" class="abrirModalNotificacao" data-id="{{ $cliente->id }}"
                                                        data-bs-target="#notificacaoModal">
                                                        <i class="fad fa-bells"></i>

                                                    </a>&nbsp;&nbsp;
                                                </td>
                                                <td>
                                                    <a href="{{ route('cliente.history', ['id' => $cliente->id]) }}">
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
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Adicionar Notifica????o</h5>
                        <button type="button" id="close_modal" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="">Servi??o</label>
                        <div class="mb-3">
                            <select class="form-control form-control-sm" id="servicoNotificacao">
                                <option selected disabled>Selecione o servi??o...</option>
                                @foreach ($servicos as $servico)
                                    <option value="{{$servico->servico_nome}}">{{$servico->servico_nome}}</option>
                                @endforeach
                            </select>
                            <div id="emailHelp" class="form-text">A sele????o do servi??o ?? opcional.</div>
                        </div>
                        <label for="">Descri????o Notifica????o</label>
                        <div class="mb-3">
                            <textarea class="form-control form-control-sm" rows="2" type="text" placeholder="Descri????o da Notifica????o"
                                id="descricaoNotificacao"></textarea>
                        </div>
                        <label for="">Data Notifica????o</label>
                        <div class="mb-3">
                            <input class="form-control form-control-sm" type="datetime-local" id="dataNotificacao">
                        </div>
                        <div class="form-text">Data para lembrar seu pet-shop.</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success botao-padrao" id="adicionarNotificacao" data-id="">
                            Adicionar Notifica????o
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptExtras')
    <script>
        $('.phone').mask('(00) 0 0000-0000');
        document.getElementById('dataNotificacao').valueAsDate = new Date();

        function pesquisarPor() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("clienteTable");
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
                    html: 'I will close in <b></b> milliseconds.',
                    timer: 2000,
                    timerProgressBar: true,
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    },
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                });
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

            });
        })

        $('.abrirModalNotificacao').on('click', function() {
            var id = $(this).data('id');
            $('#adicionarNotificacao').attr('data-id', id);
            $('#staticBackdrop').modal('show');
        });

        $('#adicionarNotificacao').on('click', function() {
            event.preventDefault();
            let id = $(this).attr('data-id');
            let url = '/cadastrar-notificacao';
            let descricaoNotificacao = $('#descricaoNotificacao').val()
            let dataNotificacao = $('#dataNotificacao').val()
            let servicoNotificacao = $('#servicoNotificacao').val()
            let _token = $('meta[name="csrf-token"]').attr('content');

            if (descricaoNotificacao === '') {
                Swal.fire({
                    title: "Aten????o",
                    html: 'Ops, parece que o campo de <b>Descri????o</b> esta vazio!',
                    icon: "warning",
                    confirmButtonText: 'Preencher',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    },
                })
                $('#descricaoNotificacao').css('border-color', 'red');
                setTimeout(() => {
                    $('#descricaoNotificacao').css('border-color', '');
                }, 3000)
                exit();
            }
            if (dataNotificacao === '') {
                Swal.fire({
                    title: "Aten????o",
                    html: 'Ops, parece que o campo de <b>data</b> esta vazio!',
                    icon: "warning",
                    confirmButtonText: 'Preencher',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    },
                })
                $('#dataNotificacao').css('border-color', 'red');
                setTimeout(() => {
                    $('#dataNotificacao').css('border-color', '');
                }, 3000)
                exit();
            }

            $.ajax({
                url: url,
                type: "POST",
                dataType: "json",
                data: {
                    id: id,
                    descricaoNotificacao: descricaoNotificacao,
                    dataNotificacao: dataNotificacao,
                    servicoNotificacao: servicoNotificacao,
                    _token: _token
                }
            }).done(function(data) {
                $("#close_modal").trigger('click');
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
            });
        });
    </script>
@endsection
