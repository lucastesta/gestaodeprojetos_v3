$(document).ready(function() {
    $('input[name=valorProposto]').focus(function() {
        $('input[name=mexeuValorProposto]').val('1');
    });
});