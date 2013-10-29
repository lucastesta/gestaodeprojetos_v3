$(document).ready(function() {
    var d = $('#parcelas');
    var i = $('#parcelas p').size();
    
    $('#addParcela').live('click', function() {
        $('<p><label>Parcela:</label><input type="text" size="1" value="' + i +  '" disabled/><input type="text" size="9" id="data'+i+'"class="money" placeholder="Parcela" name="parcela' + i +'" /><input type="text" name="data' + i +'" size="10" placeholder="Data" /></p>').appendTo(d);
        $('input[name=data'+i+']').datepicker({dateFormat:'dd/mm/yy', separator: ' ', changeMonth: true, changeYear: true});
        $('input[name=parcela' + i + ']').maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});
        $('#valorPagoLabel').text(i);
        i++; 
    });
});