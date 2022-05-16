@extends('layouts.app')
@section('cssExtras')
    <style>
        .ui-autocomplete {
            z-index: 1050 !important;
            width: 100px;
        }

        .ui-menu-item .ui-menu-item-wrapper.ui-state-active {
            background: #874242 !important;
            font-weight: bold !important;
            color: #ffffff !important;
        }

        .ui-autocomplete {
            background-color: inherit;
        }

        ul.ui-autocomplete {
            max-height: 400px;
            overflow-y: scroll;
        }

        ul.ui-autocomplete {
            list-style: none;
            text-decoration: none;
        }

    </style>
@endsection

@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 align-self-center">
                    <div style="justify-content:space-between;display: flex;">
                        <h4 class="page-title" id="name_title">Pacotes Promocionais</h4>
                        <a type="button" aria-hidden="true" href="{{ route('pacotes.promocionais.create') }}"
                            class="btn btn-success botao-padrao">
                            Cadastrar
                        </a>
                    </div>
                </div>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard.index') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Pacotes </li>
                </ol>
            </nav>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="container pt-4"><input class="form-control" type="text" id="myInput"
                                onkeyup="pesquisarPor()" placeholder="Pesquise por pacotes promocionais..."></div>
                        <div class="table-responsive">
                            <table class="table table-hover text-center" id="servicosTable">
                                <thead>
                                    <th>Codigo</th>
                                    <th>Nome Pacote</th>
                                    <th>Porte</th>
                                    <th>Preço Sugerido</th>
                                    <th>Preço Venda</th>
                                    <th>Desconto</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody>
                                    @foreach ($pacotePromocional as $pacote)
                                        @if ($pacote->pacote_status == 0)
                                            <tr class="text-center">
                                                <td class="text-muted">{{ $pacote->unique_pacote_promocional }}</td>
                                                <td class="text-muted">{{ $pacote->pacote_nome }}</td>
                                                <td class="text-muted">{{ $pacote->pacote_pet_porte ? ucfirst( $pacote->pacote_pet_porte): 'Sem Porte' }}</td>
                                                <td class="text-muted">R$ {{ number_format($pacote->pacote_total_preco_sugerido, 2, ',', '.') }}</td>
                                                <td class="text-muted">R$ {{ number_format($pacote->pacote_total_preco_de_venda, 2, ',', '.') }}</td>
                                                <td class="text-muted">{{ $pacote->pacote_porcentagem_desconto }}%</td>
                                                <td>
                                                    <a href="{{ url('editar-servico/') }}" data-toggle="tooltip"
                                                        data-placement="top" title="Editar Servico">
                                                        <i class="fas fa-user-edit"></i>
                                                    </a>
                                                    &nbsp;&nbsp;
                                                    <a href="#" data-toggle="tooltip" data-placement="top"
                                                        class="excluirPacotePromocional" data-id="{{ $pacote->id }}"
                                                        title="Excluir Pacote Promocional">
                                                        <i class="fad fa-trash"></i>
                                                    </a>
                                                    &nbsp;&nbsp;
                                                    <a href="#" data-toggle="tooltip" data-placement="top"
                                                        class="desativar-ativar-pacote" data-id="{{ $pacote->id }}"
                                                        title="Ativar Pacote Promocional">
                                                        <i class="far fa-play"></i>
                                                    </a>
                                                    &nbsp;&nbsp;
                                                </td>
                                            </tr>
                                        @else
                                            <tr class="text-center">
                                                <td>{{ $pacote->unique_pacote_promocional }}</td>
                                                <td>{{ $pacote->pacote_nome }}</td>
                                                <td>{{ $pacote->pacote_pet_porte ? ucfirst( $pacote->pacote_pet_porte): 'Sem Porte' }}</td>
                                                <td>R$ {{ number_format($pacote->pacote_total_preco_sugerido, 2, ',', '.') }}</td>
                                                <td>R$ {{ number_format($pacote->pacote_total_preco_de_venda, 2, ',', '.') }}</td>
                                                <td>{{ $pacote->pacote_porcentagem_desconto }}%</td>
                                                <td>
                                                    <a href="{{ url('editar-servico/') }}" data-toggle="tooltip"
                                                        data-placement="top" title="Editar Servico">
                                                        <i class="fas fa-user-edit"></i>
                                                    </a>
                                                    &nbsp;&nbsp;
                                                    {{-- <a href="#" data-toggle="tooltip" data-placement="top"
                                                        class="excluirPacotePromocional" data-id="{{ $pacote->id }}"
                                                        title="Excluir Pacote Promocional">
                                                        <i class="fad fa-trash"></i>
                                                    </a> --}}
                                                    &nbsp;&nbsp;
                                                    <a href="#" data-toggle="tooltip" data-placement="top"
                                                        class="desativar-ativar-pacote" data-id="{{ $pacote->id }}"
                                                        title="Desativar Pacote Promocional">
                                                        <i class="far fa-stop"></i>
                                                    </a>
                                                    &nbsp;&nbsp;
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $pacotePromocional->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptExtras')
    <script>
        $(document).ready(function() {
            $('.excluirPacotePromocional').on('click', function() {
                var id = $(this).data('id');
                var url = '/excluir-pacote-promocional';
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

            $('.desativar-ativar-pacote').on('click', function() {
                var id = $(this).data('id');
                var url = '/desativar-pacote-promocional';
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
                });
            });

        });
    </script>
@endsection
