function mostrar_solicitud(){
    var json = {
        id: $("#lista_solicitudes #id").val(),
        mensaje: $("#lista_solicitudes #descripcion").val(),
        accion: "d"
    };
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/solicitud.php',
        success: function(data){/*
                if (data.error == 0){
                        //alert('success!');
                        //$('#flex1').flexReload();
                }else{
                       // alert(data.msg);
                }*/
                //alert(data.msg);
                $('#lista_solicitudes').html(data.salida);
                $('cantidad_solicitudes').html(data.cantidad);
                //refreshDivs('cuerpocentro','pages/layout/solicitud.php');
                proces = 0;
        }
   });
}
