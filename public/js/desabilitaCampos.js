$(document).ready(function() {
    var pagina = (window.location.pathname).split("/");
    if((pagina[1] == 'acompanhamento')) {
        $('input[name=cliente]').attr('disabled', 'disabled');
        $('input[name=tituloProjeto]').attr('disabled', 'disabled');
        $('input[name=subProjetoFAI').attr('disabled', 'disabled');
        $('select[name=unidade]').attr('disabled', 'disabled');
        $('input[name=dataPreInicio]').attr('disabled', 'disabled');
        $('input[name=dataPreTermino]').attr('disabled', 'disabled');
    }
    
});