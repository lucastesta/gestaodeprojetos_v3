$(document).ready(function() {
        $('button').click(function() {
        var status = $('#statusBusca').val();
        var unidade = $('#unidadeBusca').val();
        $.ajax({
            url: "http://gestaodeprojetos_v3.local/buscar",
            type: 'POST',
            data: 'status='+status+'&unidade='+unidade,
            success: function(data) {
               $('#tabela1').html(data);
            }
        });
    });
});
