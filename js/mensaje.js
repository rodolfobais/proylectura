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
function vertodoslosmensajes(){
    refreshDivs('cuerpocentro','pages/layout/mailbox.php','verleid=n');
    
}

function vermensajeseleccionado(id){
    refreshDivs('cuerpocentro','pages/layout/mailbox.php','verleid=n');
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

function marcarMensajeLeido(id){
    var json = {
        id: id,
        accion: "marcar"
    };
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/mensaje_data.php',
        success: function(){
            mostrar_notificacion();
        }
   });
}