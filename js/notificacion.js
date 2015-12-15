function mostrar_notificacion(){
    var json = {
        id: $("#lista_notificaciones #id").val(),
        mensaje: $("#lista_notificaciones #descripcion").val(),
        accion: "d"
    };
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/notificacion.php',
        success: function(data){
            $('#lista_notificaciones').html(data.salida);
            $('#cantidad_notificaciones').html(data.cantidad);
        }
    });
}

function marcarnotificacionleida(id){
    var json = {
        id: id,
        accion: "marcar_leida"
    };
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/notificacion_data.php',
        success: function(){
            mostrar_notificacion();
        }
   });
}