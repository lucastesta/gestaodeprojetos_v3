$(document).ready(function() {
    var pagina = (window.location.pathname).split("/");
    if((pagina[1] === 'acompanhamento')) {
        $('input[name=cliente]').attr('disabled', 'disabled');
        $('input[name=tituloProjeto]').attr('disabled', 'disabled');
        $('input[name=subProjetoFAI').attr('disabled', 'disabled');
        $('select[name=unidade]').attr('disabled', 'disabled');
        $('input[name=dataPrevistaIni]').attr('disabled', 'disabled');
        $('input[name=dataPrevistaTer').attr('disabled', 'disabled');       
        $('input[name=valorProposto]').attr('disabled', 'disabled');
        $('input[name=investimentoPrevisto]').attr('disabled', 'disabled');
        
    }
    
});