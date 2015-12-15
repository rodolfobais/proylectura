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

function vertodaslasnotificaciones(){
    refreshDivs('cuerpocentro','pages/layout/notificaciones_listado.php','verleid=n');
    formateartabla_notificaciones();
}
function listadonotificacionesverleidos(){
    if($("#listado_notificaciones_ver_leidos").prop("checked")){
        refreshDivs('cuerpocentro','pages/layout/notificaciones_listado.php','verleid=s');
    }else{
        refreshDivs('cuerpocentro','pages/layout/notificaciones_listado.php','verleid=n');
    }
    formateartabla_notificaciones();
}

function formateartabla_notificaciones(){
    $("#lista_clasif").DataTable( {
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron registros",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontraron registros",
            "infoFiltered": "(_MAX_ registros totales)",
            "paginate": {
                "previous": "Anterior",
                "next": "Siguiente"
            },
            "search": "Filtrar:"
        }
    } );
}