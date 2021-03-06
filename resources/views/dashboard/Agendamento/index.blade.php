@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">{{ $titulo }}</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard.index') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Agendamento</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Calendário</h4>
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    @foreach ($agendamentos as $agendamento)
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-1">Pet:</h5>
                                <div style="display: flex">
                                    <div class="col col-5">
                                        <span class="font-light">Cliente:</span></br>
                                        <span class="font-light">Contato:
                                            <a href="https://wa.me/+554199283748" target="_blank">
                                                <i class="fab fa-whatsapp" style="color:#24CC63"></i>
                                            </a></span></br>
                                        <span class="font-light">Obs:</span></br>
                                    </div>
                                    <div class="col col-5">
                                        <span class="font-light">Horário:</span></br>
                                        <span class="font-light">Pacote:</span></br>
                                        <span class="font-light">
                                            Servico: <i class="fas fa-cut"></i> |<i class="fal fa-shower"></i> |
                                            <iclass="fas fa-paw"></i>
                                        </span></br>
                                    </div>
                                    <div class="col col-2">
                                        <a type="button" class="btn btn-secondary float-end"
                                            href="{{ route('agendamento.show', ['id' => $agendamento->id_cliente]) }}">
                                            Visualizar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Modal Agendamento -->
        <div class="modal fade" id="modalAgendamento" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $titulo }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="col col-12 mb-3">
                            <label>Já possui cadastro?</label>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                        value="option1">
                                    <label class="form-check-label" for="inlineRadio1">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                        value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Não</label>
                                </div>
                            </div>
                        </div>
                        <div class="col col-12 mb-3">
                            @component('dashboard.componentes.buscaModal')
                            @endcomponent
                        </div>
                        <div class="col col-12 mb-3">
                            <label for="appt">Selecione o serviço</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected disabled>Qual o serviço?</option>
                                <option value="1">Serviço 1</option>
                                <option value="2">Serviço 2</option>
                                <option value="3">Serviço 3</option>
                            </select>
                        </div>
                        <div class="col col-12 mb-3">
                            <label for="appt">Selecione o horário a time:</label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col col-12 mb-3">
                            <label>Pacote Promocional?</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                        value="option1">
                                    <label class="form-check-label" for="inlineRadio1">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                        value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Não</label>
                                </div>
                            </div>
                        </div>
                        <div class="col col-12 mb-3">
                            <select class="form-select" aria-label="Default select example">
                                <option selected disabled>Selecione o Pacote Promocional</option>
                                <option value="1">Pacote 1</option>
                                <option value="2">Pacote 2</option>
                                <option value="3">Pacote 3</option>
                            </select>
                        </div>
                        <div class="col col-12 mb-3">
                            <label for="appt">Observações</label>
                            <textarea name="" id="" cols="3" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary float-end">
                                Cancelar
                            </button>
                            <button type="button" class="btn btn-success botao-padrao float-end">
                                Agendar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scriptExtras')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

        <script>
            $(document).ready(function() {
                var SITEURL = "{{ url('/') }}";
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var calendar = $('#calendar').fullCalendar({
                    editable: true,
                    events: SITEURL + "/agendamento",
                    displayEventTime: false,
                    editable: true,
                    eventRender: function(event, element, view) {
                        if (event.allDay === 'true') {
                            event.allDay = true;
                        } else {
                            event.allDay = false;
                        }
                    },
                    selectable: true,
                    selectHelper: true,
                    select: function(start, end, allDay) {
                        $('#modalAgendamento').modal('show');

                        return false;
                        if (title) {
                            var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                            var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                            $.ajax({
                                url: SITEURL + "/agendamentoAjax",
                                data: {
                                    title: title,
                                    start: start,
                                    end: end,
                                    type: 'add'
                                },
                                type: "POST",
                                success: function(data) {
                                    displayMessage("Agendamento Criado com sucesso");
                                    calendar.fullCalendar('renderEvent', {
                                        id: data.id,
                                        title: title,
                                        start: start,
                                        end: end,
                                        allDay: allDay
                                    }, true);
                                    calendar.fullCalendar('unselect');
                                }
                            });
                        }
                    },
                    eventDrop: function(event, delta) {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

                        $.ajax({
                            url: SITEURL + '/agendamentoAjax',
                            data: {
                                title: event.title,
                                start: start,
                                end: end,
                                id: event.id,
                                type: 'update'
                            },
                            type: "POST",
                            success: function(response) {
                                displayMessage("Agendamento atualizado.");
                            }
                        });
                    },
                    eventClick: function(event) {
                        var deleteMsg = confirm("Deseja realmente excluir este agendamento?");
                        if (deleteMsg) {
                            $.ajax({
                                type: "POST",
                                url: SITEURL + '/agendamentoAjax',
                                data: {
                                    id: event.id,
                                    type: 'delete'
                                },
                                success: function(response) {
                                    calendar.fullCalendar('removeEvents', event.id);
                                    displayMessage("Agendamento excluído.");
                                }
                            });
                        }
                    }

                });

            });

            function displayMessage(message) {
                toastr.success(message, 'Event');
            }
        </script>
    @endsection
