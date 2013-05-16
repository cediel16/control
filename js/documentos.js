$(document).ready(function(e) {
    $("#form_respuesta").submit(function() {
        $("#msj_respuesta").html('<img src="../img/cargando.gif" />');
        if ($("#respuesta").val() === '') {
            $("#msj_respuesta").html('<span class = "text-error">Debe escribir una respuesta.</span>');
        } else {
            $.ajax({
                type: "POST",
                url: 'ajax.php',
                dataType: 'json',
                data: $("#this").serialize() + '&band=add_resp',
                success: function(data) {
                    alert(data.resp);
                    if (data.resp === 1) {
                        $("#msj_respuesta").html('');
                        window.reload(true);
                    } else {
                        $("#msj_respuesta").html('<span class="text-error">' + data.msj + '</span>');
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert(textStatus.toUpperCase() + ' ' + xhr.status + ' - ' + errorThrown);
                    notificacion('error', textStatus.toUpperCase() + ' ' + xhr.status + ' - ' + errorThrown);
                }
            });
        }
        return false;
    });
});