function SomenteNumero(e){
    var unicode = e.charCode ? e.charCode : e.keyCode;
    if(unicode != 8 && unicode != 9){	
	if(unicode<48 || unicode >57)
        	return false;				
	}	
}

$(document).ready(function() {
    $('input[name=Alterar]').click(function() {
        jAlert('mensagem', 'Alert Dialog');
    });
});










