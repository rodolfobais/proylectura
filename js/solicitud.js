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
                $('#cantidad_solicitudes').html(data.cantidad);
                //refreshDivs('cuerpocentro','pages/layout/solicitud.php');
                proces = 0;
        }
   });
}
 function aceptar_solicitud(id){
alert(id);
//alert(id2);
     var json = {
        
        //id_usuario_solicitado: $reg->get
        id_usuario_solicitante: $("#formulario_solicitud #id_usuario_solicitante").val(),        
        estado: $("#formulario_solicitud #estado").val(),
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
                //refreshDivs('cuerpocentro','pages/layout/solicitud.php');
                proces = 0;
        }
   });
     
 }
 
 function rechazar_solicitud(id){
     alert(id);
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
                alert(data.msg);
              //  refreshDivs('cuerpocentro','pages/layout/solicitud.php');
                proces = 0;
        }
   });
     
 }