function SomenteNumero(e){
    var unicode = e.charCode ? e.charCode : e.keyCode;
    if(unicode != 8 && unicode != 9){	
	if(unicode<48 || unicode >57)
        	return false;				
	}	
}

$.fn.message = function() {
  alert('kkkkk');
};


function teste() {
    $.fn.message();
}



