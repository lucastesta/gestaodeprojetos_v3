$(document).ready(function() {
        $('#submitBuscaAlteracao').click(function() {
        var status = $('#statusBusca').val();
        var unidade = $('#unidadeBusca').val();
        $.ajax({
            url: "http://www.gestaodeprojetos.ccdm.ufscar.br/buscar",
            type: 'POST',
            dataType: 'html',
            data: 'status='+status+'&unidade='+unidade,
            success: function(data) {
                $('#tabela1').html(data);
                $('#tabela1').css('width', '100%');
                $('#tabela1').css('margin', '0');
                
                
                $('#tabela1').dataTable({
                    "sPaginationType": "full_numbers",
                    "aLengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
                    "iDisplayLength": 5,
                    "oLanguage": {
                          "sInfo": "Visualizando _START_ -  _END_  || Número de Registros: _TOTAL_",
                           "sLengthMenu": "Exibir _MENU_ registros",
                           "sEmptyTable": "Nenhum registro encontrado",
                            "sInfoEmpty": "Nenhum registro encontrado",
                            "sZeroRecords": "Nenhum registro encontrado",
                            "sProcessing": "Pensando...",
                            "sSearch": "Pesquisar: ",
                            "oPaginate": {
                                "sFirst": "Primeiro",
                                "sLast": "Ultimo",
                                "sNext": "Próximo",
                                "sPrevious": "Anterior"
                              }
                        }
                });
            }
        });
    });
});


$(document).ready(function() {
        $('#submitBuscaAcompanhamento').click(function() {
        var status = $('#statusBusca').val();
        var unidade = $('#unidadeBusca').val();
        $.ajax({
            url: "http://www.gestaodeprojetos.ccdm.ufscar.br/buscar",
            type: 'POST',
            dataType: 'html',
            data: 'status='+status+'&unidade='+unidade,
            success: function(data) {
                $('#tabela1').html(data);
                $('#tabela1').css('width', '100%');
                $('#tabela1').css('margin', '0');


                $('#tabela1').dataTable({
                    "sPaginationType": "full_numbers",
                    "aLengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
                    "iDisplayLength": 5,
                    "oLanguage": {
                          "sInfo": "Visualizando _START_ -  _END_  || Número de Registros: _TOTAL_",
                           "sLengthMenu": "Exibir _MENU_ registros",
                           "sEmptyTable": "Nenhum registro encontrado",
                            "sInfoEmpty": "Nenhum registro encontrado",
                            "sZeroRecords": "Nenhum registro encontrado",
                            "sProcessing": "Pensando...",
                            "sSearch": "Pesquisar: ",
                            "oPaginate": {
                                "sFirst": "Primeiro",
                                "sLast": "Ultimo",
                                "sNext": "Próximo",
                                "sPrevious": "Anterior"
                              }
                        }
                });
            }
        });
    });
});


$(document).ready(function() {
        $('#submitBuscaRelatorios').click(function() {
        var status = $('#statusBusca').val();
        var unidade = $('#unidadeBusca').val();
        $.ajax({
            url: "http://www.gestaodeprojetos.ccdm.ufscar.br/buscar",
            type: 'POST',
            dataType: 'html',
            data: 'status='+status+'&unidade='+unidade+'&relatorio=1',
            success: function(data) {
                $('#tabela1').html(data);
                $('#tabela1').css('width', '100%');
                $('#tabela1').css('margin', '0');


                $('#tabela1').dataTable({
                    "sPaginationType": "full_numbers",
                    "aLengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
                    "iDisplayLength": 5,
                    "oLanguage": {
                          "sInfo": "Visualizando _START_ -  _END_  || Número de Registros: _TOTAL_",
                           "sLengthMenu": "Exibir _MENU_ registros",
                           "sEmptyTable": "Nenhum registro encontrado",
                            "sInfoEmpty": "Nenhum registro encontrado",
                            "sZeroRecords": "Nenhum registro encontrado",
                            "sProcessing": "Pensando...",
                            "sSearch": "Pesquisar: ",
                            "oPaginate": {
                                "sFirst": "Primeiro",
                                "sLast": "Ultimo",
                                "sNext": "Próximo",
                                "sPrevious": "Anterior"
                              }
                        }
                });
            }
        });
    });
});
