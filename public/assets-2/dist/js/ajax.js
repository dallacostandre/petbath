$('.money2').mask('000.000.000.000.000,00', {
    reverse: true
});
$('.percent').mask('0.000,00%', {
    reverse: true
});

$('#adicionarProduto').on('click', function(e) {
    e.preventDefault();

    var url = "/cadastraProduto";
    var nomeProduto = $('#nomeProduto').val();
    var codigoProduto = $('#codigoProduto').val();
    var custoProduto = $('#custoProduto').val();
    var precoVendaProduto = $('#precoVendaProduto').val();
    var percentualLucro = $('#porcentagemLucroProduto').val();
    var lucroProduto = $('#lucroProduto').val();
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        type: 'POST',
        url: url,
        method: 'POST',
        dataType: 'JSON',
        data: {
            nome_produto: nomeProduto,
            codigo_produto: codigoProduto,
            custo_produto: custoProduto,
            preco_de_venda_produto: precoVendaProduto,
            percentual_lucro: percentualLucro,
            lucro_produto: lucroProduto,
            _token: token
        },
        success: function(data) {
            Swal.fire({
                title: data.title,
                text: data.mensagem,
                icon: data.icone,
                button: "Ótimo!",
            });
            setTimeout(function() {
                location.reload();
            }, 1000);
        },
        error: function(data) {
            Swal.fire({
                icon: 'error',
                title: 'Atenção',
                text: 'Não foi possível adicionar o produto',
                button: "Voltar!",
            });
        }
    });
});

$('.removerProduto').on('click', function(e) {
    e.preventDefault();

    var url = "/removerProduto";
    var idProduto = $(this).data('id');
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        type: 'POST',
        url: url,
        method: 'DELETE',
        dataType: 'JSON',
        data: {
            id: idProduto,
            _token: token
        },
        success: function(data) {
            Swal.fire({
                title: data.title,
                text: data.mensagem,
                icon: data.icone,
                button: "Ótimo!",
            });
            setTimeout(function() {
                location.reload();
            }, 1000);
        },
        error: function(data) {
            Swal.fire({
                icon: 'error',
                title: 'Atenção',
                text: 'Não foi possível adicionar o produto',
            });
        }
    });
});

$('#porcentagemLucroProduto').on('change', function() {
    var custo = $('#custoProduto').val();
    var porcentagem = $('#porcentagemLucroProduto').val();
    var precoSugeridoProduto = (parseFloat(custo)) * (parseFloat(porcentagem) / 100) + parseFloat(custo);

    if (custo === "") {
        return false;
    } else {
        $('#precoSugeridoProduto').val(precoSugeridoProduto);
        $('#precoVendaProduto').val(precoSugeridoProduto);
        var lucroProduto = (parseFloat(custo)) * (parseFloat(porcentagem) / 100);
        $('#lucroProduto').val(lucroProduto);
    }
});

$('#custoProduto').on('change', function() {
    var custo = $('#custoProduto').val();
    var porcentagem = $('#porcentagemLucroProduto').val();
    var precoSugeridoProduto = (parseFloat(custo)) * (parseFloat(porcentagem) / 100) + parseFloat(custo);

    if (porcentagem === "") {
        return false;
    } else {
        $('#precoSugeridoProduto').val(precoSugeridoProduto);
        $('#precoVendaProduto').val(precoSugeridoProduto);
        var lucroProduto = (parseFloat(custo)) * (parseFloat(porcentagem) / 100);
        $('#lucroProduto').val(lucroProduto);
    }
});


$('#adicionarServico').on('click', function(e) {
    e.preventDefault();

    var url = "/cadastraServico";
    var servico_nome = $('#servico_nome').val();
    var servico_pet_raca = $('#servico_pet_raca').val();
    var servico_pet_porte = $('#servico_pet_porte').val();
    var servico_codigo = $('#servico_codigo').val();
    var servico_custo = $('#servico_custo').val();
    var servico_porcentagem_lucro = $('#servico_porcentagem_lucro').val();
    var servico_preco_de_venda = $('#servico_preco_de_venda').val();
    var servico_lucro = $('#servico_lucro').val();
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        type: 'POST',
        url: url,
        method: 'POST',
        dataType: 'JSON',
        data: {
            servico_nome: servico_nome,
            servico_pet_raca: servico_pet_raca,
            servico_pet_porte: servico_pet_porte,
            servico_codigo: servico_codigo,
            servico_custo: servico_custo,
            servico_porcentagem_lucro: servico_porcentagem_lucro,
            servico_preco_de_venda: servico_preco_de_venda,
            servico_lucro: servico_lucro,
            _token: token
        },
        success: function(data) {
            Swal.fire({
                title: data.title,
                text: data.mensagem,
                icon: data.icone,
                button: "Ótimo!",
            });
            setTimeout(function() {
                location.reload();
            }, 1000);
        },
        error: function(data) {
            Swal.fire({
                icon: 'error',
                title: 'Atenção',
                text: 'Não foi possível adicionar o serviço!',
                button: "Voltar",
            });
        }
    });
});

// CADASTRO DE CLIENTES