function flashdata(op, msj) {
    /*
     <div class="alert">
     <button type="button" class="close" data-dismiss="alert">&times;</button>
     <strong>Warning!</strong> Best check yo self, you're not looking too good.
     </div>
     */
    $("#flashdata").html('');
    $("<div><strong>" + msj + "</strong></div>").addClass("alert alert-" + op).attr("id", "alert").appendTo("#flashdata");
    
}

function cargando_lista(id){
    $(id).html('<div class="cargando_lista"><img src="../img/cargando_lista.gif" /></div>');   
}