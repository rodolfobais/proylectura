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
        success: function(data){/*
                if (data.error == 0){
                        //alert('success!');
                        //$('#flex1').flexReload();
                }else{
                       // alert(data.msg);
                }*/
                //alert(data.msg);
                $('#lista_notificaciones').html(data.salida);
                $('#cantidad_notificaciones').html(data.cantidad);
                //refreshDivs('cuerpocentro','pages/layout/notificacion.php');
                proces = 0;
        }
   });
}
