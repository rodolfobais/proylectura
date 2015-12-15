function mostrar_panel_enviado(id){
   var json = {
        id: id
    };
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/mensaje_enviado.php',
        success: function(data){
            $('#divMensaje').html(data.html);
        }
   });
}
