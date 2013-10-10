$(document).ready(function() {
    $('button').click(function() {
        $.ajax({
            url: "http://gestaodeprojetos_v1.local/buscar",
            type: 'GET',
            success: function(data) {
                alert(data);
            }
        });
    });
});
