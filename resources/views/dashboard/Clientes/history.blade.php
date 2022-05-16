@extends('layouts.app')
@section('cssExtras')
    <style>
        .notificationIcon:hover {
            color: crimson;
        }

    </style>
@endsection
@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 align-self-center">
                    <div style="justify-content:space-between;display: flex;">
                        <h4 class="page-title" id="name_title">
                            {{ $titulo }}
                        </h4>
                    </div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('cliente.index') }}">Cliente</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('cliente.index') }}">Histórico</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $cliente }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-1">Histórico Pet</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-1">Notificações</h5>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class="border-top-0">Data</th>
                                                            <th class="border-top-0">Descricão</th>
                                                            <th class="border-top-0">Serviço</th>
                                                            <th class="border-top-0">Status</th>
                                                            <th class="border-top-0">Remover</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($objNotificacoesCliente as $notificacao)
                                                            <tr>
                                                                <td class="txt-oflo">
                                                                    {{ date('d/m/Y H:i ', strtotime($notificacao->notificacao_data)) }}
                                                                </td>
                                                                <td class="txt-oflo">
                                                                    {{ $notificacao->notificacao_descricao }}
                                                                </td>
                                                                <td class="txt-oflo">
                                                                    {{ $notificacao->notificacao_servico ? $notificacao->notificacao_servico : 'Não Definido' }}
                                                                </td>
                                                                @if (Carbon\Carbon::today() > $notificacao->notificacao_data)
                                                                    <td>
                                                                        <span class="label label-danger label-rounded">
                                                                            Atrasado
                                                                        </span>
                                                                    </td>
                                                                @else
                                                                    <td>
                                                                        <span class="label label-warning label-rounded">
                                                                            Agendado
                                                                        </span>
                                                                    </td>
                                                                @endif
                                                                <td class="notificationIcon excluirNotificacao"
                                                                    data-id="{{ $notificacao->id }}">
                                                                    <i class="fas fa-bell-slash"></i>
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
                    </div>
                </div>
            @endsection

            @section('scriptExtras')
                <script>
                    $('.excluirNotificacao').on('click', function() {
                        var id = $(this).data("id");
                        var url = '/excluir-notificacao';
                        var _token = $('meta[name="csrf-token"]').attr('content');

                        $.ajax({
                            url: url,
                            type: "DELETE",
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
                                html: 'Aguarde <b></b> millisegundos.',
                                timer: 20000,
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
                </script>
            @endsection
