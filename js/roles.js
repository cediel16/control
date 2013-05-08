function del(rol_id) {
    alert(rol_id);
}

$(document).ready(function(e) {
    $("#form_add").submit(function() {
        $.ajax({
            type: "POST",
            url: 'ajax.php',
            dataType: 'json',
            data: $("#form_add").serialize() + '&band=add',
            success: function(data) {
                if (data.resp === 1) {
                    not_type = 'info';
                    $("#rol").val('');
                    $("#lista").html(data.lista);
                } else if (data.resp === 2) {
                    not_type = 'warning';
                } else {
                    not_type = 'error';
                }
                notificacion(not_type, data.msj);
            },
            error: function(xhr, textStatus, errorThrown) {
                flashdata('error', textStatus.toUpperCase() + ' ' + xhr.status + ' - ' + errorThrown);
                alert(textStatus.toUpperCase() + ' ' + xhr.status + ' - ' + errorThrown);
            }
        });
        return false;
    });

    $("#form_edit").submit(function() {
        $.ajax({
            type: "POST",
            url: 'ajax.php',
            dataType: 'json',
            data: $("#form_edit").serialize() + '&band=edit',
            success: function(data) {
                //alert(data); return false;
                if (data.resp === 1) {
                    not_type = 'info';
                } else if (data.resp === 2) {
                    not_type = 'warning';
                } else {
                    not_type = 'error';
                }
                notificacion(not_type, data.msj);
            },
            error: function(xhr, textStatus, errorThrown) {
                flashdata('error', textStatus.toUpperCase() + ' ' + xhr.status + ' - ' + errorThrown);
                alert(textStatus.toUpperCase() + ' ' + xhr.status + ' - ' + errorThrown);
            }
        });
        $(".cargando").css('display', 'none');
        $("#rol").removeAttr("readonly");
        $("#btn_volver").removeAttr("disabled");
        $("#btn_editar").removeAttr("disabled");
        return false;
    });

    $("#btn_volver").click(function() {
        window.location = '.';
    });


});