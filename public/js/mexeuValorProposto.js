$(document).ready(function() {
    $('input[name=valorProposto]').focus(function() {
        $('input[name=mexeuValorProposto]').val('1');
    });
    
    $('input[name=valorPago]').focus(function() {
        $('input[name=mexeValor]').val('1');
    });
    
    $('input[name=investimentoFeito]').focus(function() {
        $('input[name=mexeuInvestimento]').val('1');
    });
});