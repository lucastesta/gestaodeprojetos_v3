$(document).ready(function() {
         var tabela = $('#tabela1').dataTable({
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
    
    $('#submitBuscaAlteracao').click(function() {
        tabela.fnDestroy();
    });

	$('#submitBuscaAcompanhamento').click(function() {
		tabela.fnDestroy();
	});

	$('#submitBuscaRelatorios').click(function() {
			tabela.fnDestroy();
	});
});
