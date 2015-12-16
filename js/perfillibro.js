function votar_libro(puntos){
    var json = {
        puntos: puntos, 
        libro: $("#pefillibro_idlibro").val(),
        accion: "votar"
    };
    //alert($("#formeditor #editor1").val());
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/perfillibro_data.php',
        success: function(data){
            $("#estrellas_voto").hide();
            $("#puntaje_voto").html(data.html);
        }
   });
}

function bloquear_libro(){
    var json = {
        libro: $("#pefillibro_idlibro").val(),
        accion: "bloquear"
    };
    //alert($("#formeditor #editor1").val());
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/perfillibro_data.php',
        success: function(data){
            alert(data.msg);
        }
   });
}