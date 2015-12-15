function mostrar_mensaje(){
    var json = {
        id: $("#lista_mensajes #id").val(),
        mensaje: $("#lista_mensajes #mensaje").val(),
        accion: "d"
    };
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/mensaje.php',
        success: function(data){/*
                if (data.error == 0){
                        //alert('success!');
                        //$('#flex1').flexReload();
                }else{
                       // alert(data.msg);
                }*/
                //alert(data.msg);
                $('#lista_mensajes').html(data.salida);
                $('#cantidad_mensajes').html(data.cantidad);
            //refreshDivs('cuerpocentro','pages/layout/mensaje.php');
                proces = 0;
        }
   });
}

function mostrar_panel_mensaje(id){
   
    var json = {
        id: id,
        accion: "l"
    };
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/mensaje_data.php',
        success: function(data){
            
            $('#div_mensaje').html(data.html);
        }
   });
}

function borrar_mensaje(id){
 
     var json = {
        id: id,
        accion: "d"
    };
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/mensaje_data.php',
        success: function(data){

                alert(data.msg);
                refreshDivs('cuerpocentro','pages/layout/mailbox.php');
                proces = 0;
        }
   });
}

function responder_mensaje(id){
 
     var json = {
        id: id,
        accion: "r"
    };
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/mensaje_data.php',
        success: function(data){
                $('#div_mensaje').html(data.html);
               // alert(data.msg);
              //  refreshDivs('cuerpocentro','pages/layout/solicitud.php');
                proces = 0;
        }
   });
}

function enviar_respuesta(){
  alert("funcion envio respuesta");
    
    var json = {
        id: $("#respuesta #id").val(),
        id_usuario_remitente: $("#respuesta #id_usuario_remitente").val(),
        id_usuario_destinatario: $("#respuesta #id_usuario_destinatario").val(),
        mensaje: $("#respuesta #mensaje").val(),
        leido: $("#respuesta #leido").val(),
        accion: "n"//$("#formulario_mensajes #accion").val()
    };
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/mensaje_data.php',
        success: function(data){/*
                if (data.error == 0){
                        //alert('success!');
                        //$('#flex1').flexReload();
                }else{
                       // alert(data.msg);
                }*/
                alert(data.msg);
                refreshDivs('cuerpocentro','pages/layout/mailbox.php');
                proces = 0;
        }
   });
}
