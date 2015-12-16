function mostrar_solicitud(){
    var json = {
        id: $("#lista_solicitudes #id").val(),
        mensaje: $("#lista_solicitudes #descripcion").val(),
        accion: "m"
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
                $('#cantidad_solicitudes').html(data.cantidad);
                //refreshDivs('cuerpocentro','pages/layout/solicitud.php');
                proces = 0;
        }
   });
}
 function aceptar_solicitud(id){

     var json = {
        
        id_usuarioamigo: id, 
    //    id_usuario_solicitado: ,
         estado: 0,
         accion : "n"
    };
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/solicitud_data.php',
        success: function(data){/*
                if (data.error == 0){
                        //alert('success!');
                        //$('#flex1').flexReload();
                }else{
                       // alert(data.msg);
                }*/
                alert(data.msg);
                refreshDivs('cuerpocentro','pages/layout/solicitud_listado.php');
                proces = 0;
        }
   });
     
 }
 
 function rechazar_solicitud(id){
     
     var json = {
        id: id,
        accion: "d"
    };
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/solicitud_data.php',
        success: function(data){/*
                if (data.error == 0){
                        //alert('success!');
                        //$('#flex1').flexReload();
                }else{
                       // alert(data.msg);
                }*/
               // alert(data.msg);
                refreshDivs('cuerpocentro','pages/layout/solicitud_listado.php');
                proces = 0;
        }
   });
     
 }
 
 function vertodaslassolicitudes(){
    refreshDivs('cuerpocentro','pages/layout/solicitudes_listado.php','verleid=n');
    formateartabla_notificaciones();
}