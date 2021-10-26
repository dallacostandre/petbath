@component('componentes.header')@endcomponent
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Adicionar Serviço</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nome Serviço</label>
                                        <input type="text" class="form-control" placeholder="Insira o Serviço"
                                            name="servico_nome" id="servico_nome">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Raça</label>
                                        {{-- FOREACH E RAÇAS --}}
                                        <select class="form-control" name="pet_raca" id="pet_raca" required>
                                            <option disabled>Selecione uma raça</option>
                                            @foreach ($raca_pet as $raca)
                                                <option value="{{ $raca->id }}">{{ $raca->nome_raca }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 ">
                                    <label>Porte</label>
                                    <select class="form-control" name="servico_pet_porte" id="servico_pet_porte">
                                        <option selected disabled>Selecione o Porte</option>
                                        <option value="pequeno">Pequeno</option>
                                        <option value="medio">Médio</option>
                                        <option value="grande">Grande</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tempo Serviço</label>
                                        <input type="time" class="form-control" placeholder="Username"
                                            name="servico_tempo" id="servico_tempo">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Preço Serviço</label>
                                        <input type="text" class="form-control money2" placeholder="Insira o preço"
                                            name="servico_preco" id="servico_preco">
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-info btn-fill float-end"
                                id="cadastrarServico">Salvar</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@component('componentes.footer')
@endcomponent

<script>
    $('.money2').mask("#.##0,00", {
        reverse: true
    });
</script>

<script>
    $('#cadastrarServico').on('click', function() {
        event.preventDefault();
        var url = '/add-novo-servico';
        var servico_nome = $('#servico_nome').val();
        var servico_tempo = $('#servico_tempo').val();
        var servico_preco = $('#servico_preco').val();
        var servico_pet_porte = $('#servico_pet_porte').val();
        var _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: url,
            type: "post",
            dataType: "json",
            data: {
                servico_nome: servico_nome,
                servico_tempo: servico_tempo,
                servico_preco: servico_preco,
                servico_pet_porte: servico_pet_porte,
                _token: _token
            }
        }).done(function(data) {
            Swal.fire({
                title: data.title,
                message: data.message,
                icon: data.icon,
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
            if (data.url) {
                window.location.href = data.url;
            }

        }).fail(function(jqXHR, textStatus, data) {
            Swal.fire({
                title: "Error",
                message: jqXHR,
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
