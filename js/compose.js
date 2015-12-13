
function enviar_mensaje(){
    alert("funcion envio mensajes");
    var json = {
        id: $("#formulario_mensajes #id").val(),
        id_usuario_remitente: $("#formulario_mensajes #id_usuario_remitente").val(),
        id_usuario_destinatario: $("#formulario_mensajes #id_usuario_destinatario").val() , 
        mensaje: $("#formulario_mensajes #mensaje").val(),
        leido: $("#formulario_mensajes #leido").val(),
        accion: "n"//$("#formulario_mensajes #accion").val()
    };
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/compose_data.php',
        success: function(data){/*
                if (data.error == 0){
                        //alert('success!');
                        //$('#flex1').flexReload();
                }else{
                       // alert(data.msg);
                }*/
                alert(data.msg);
                refreshDivs('cuerpocentro','pages/layout/compose.php');
                proces = 0;
        }
   });
}
