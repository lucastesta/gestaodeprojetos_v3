function carrega(id) {
     $.ajax({
       url:  "http://gestaodeprojetos_v3.local/buscar",
            type: "GET",
            dataType: "html",
            data: "id=" + id,
            success: function(data) {
                alert(data);
            },
            error: function() {
                    alert('error');
            }
        });
    }
