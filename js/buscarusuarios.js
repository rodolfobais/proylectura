function solicitaramistad(id){
    var json = {
        id: id,
        accion: "solicitaramistad"
    };
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/buscaramigos_data.php',
        success: function(data){
            alert(data.msg);
            refreshDivs('cuerpocentro','pages/layout/buscaamigos_lista.php');
            formateartabla();
        }
   });
}

function terminaramistad(id){
    var json = {
        id: id,
        accion: "d"
    };
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/buscaramigos_data.php',
        success: function(data){
            alert(data.msg);
            refreshDivs('cuerpocentro','pages/layout/VER.php');
        }
   });
}
