function carrega(id) {
     $.ajax({
       url:  "http://gestaodeprojetos_v3.local/buscar",
            type: "GET",
            dataType: "html",
            data: "id=" + id,
            success: function(data) {                
                var valores = data.split(";");
                $('#id_altera').val(valores[0]);
       
             
		$('select[name=status]').val(valores[1]);
                $('input[name=cliente]').val(valores[2]);
                $('input[name=tituloProjeto]').val(valores[3]);
                $('input[name=subProjetoFAI]').val(valores[4]);
                $('#unidade').val(valores[5]);
                $('#resumo').val(valores[6]);
                $('#origem').val(valores[7]);
                $('input[name=dataAprovacao]').val(valores[8]);
                $('input[name=duracaoProjeto]').val(valores[9]);
                $('input[name=dataPrevistaIni]').val(valores[10]);
                $('input[name=dataPrevistaTer]').val(valores[11]);
                $('input[name=valorProposto]').val(valores[12]);
               
                $('input[name=valorPago]').val(valores[17]);
                $('input[name=investimentoFeito]').val(valores[18]);
                
                $('#ob').val(valores[14]);
                
                if(valores[13] === "1")
                    $('#categoria-1').attr('checked', true);
                else
                    $('#categoria-2').attr('checked', true);
                
                $('input[name=investimentoPrevisto]').val(valores[19]);
                $('input[name=dataInicio]').val(valores[15]);
                $('input[name=dataTermino]').val(valores[16]);
                $('input[name=valorInvestimento]').val(valores[19]);
               
                $('.buscador').slideToggle(500);
            },  
            error: function() {
                    alert('error');
            }
        });
    }
    
    
