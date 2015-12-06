function editaregistro_genero(id){
    $("#formulario_generos #id").val(id);
   
    $("#formulario_generos #nombre").val($("#nombre_"+id).html());
   
    //$("#formulario_usuarios #nombre").val($("#nombre_"+id).html());
    $("#formulario_generos #titulo_formulario").html("Editar genero.");
    $("#formulario_generos .box-body").show("slow");
    $("#formulario_generos #accion").val("e");
}
function enviar_form_generos(){
    
    var json = {
        id: $("#formulario_generos #id").val() ,          
        nombre: $("#formulario_generos #nombre").val(),
        accion: "e"
    };
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/generos_data.php',
        success: function(data){/*
                if (data.error == 0){
                        //alert('success!');
                        //$('#flex1').flexReload();
                }else{
                       // alert(data.msg);
                }*/
                alert(data.msg);
                refreshDivs('cuerpocentro','pages/layout/generos.php');
                proces = 0;
        }
   });
}
function borrar_genero(id){
    var json = {
        id: id,
        accion: "d"
    };
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/generos_data.php',
        success: function(data){/*
                if (data.error == 0){
                        //alert('success!');
                        //$('#flex1').flexReload();
                }else{
                       // alert(data.msg);
                }*/
                alert(data.msg);
                refreshDivs('cuerpocentro','pages/layout/generos.php');
                proces = 0;
        }
   });
}