function editaregistro_libro(id){
    //alert(id);
    $("#formulario_libros #id").val(id);
   
    $("#formulario_libros #nombre").val($("#nombre_"+id).html());
    
    $("#formulario_libros #sinopsis").val($("#sinopsis_"+id).html());
    //$("#formulario_usuarios #nombre").val($("#nombre_"+id).html());
    $("#formulario_libros #titulo_formulario").html("Editar libro.");
    $("#formulario_libros .box-body").show("slow");
    $("#formulario_libros #accion").val("e");
}
function enviar_form_libro(){
    
    var json = {
        id: $("#formulario_libros #id").val() ,          
        nombre: $("#formulario_libros #nombre").val() , 
       
        sinopsis: $("#formulario_libros #sinopsis").val(),
        accion: "n" 
    };
   
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/libros_data.php',
        success: function(data){/*
                if (data.error == 0){
                        //alert('success!');
                        //$('#flex1').flexReload();
                }else{
                       // alert(data.msg);
                }*/
                alert(data.msg);
                refreshDivs('cuerpocentro','pages/layout/libros.php');
                proces = 0;
        }
   });
}
function borrar_libro(id){
    //alert(id);
    var json = {
        id: id,
        accion: "d"
    };
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/libros_data.php',
        success: function(data){
            
            /*
                if (data.error == 0){
                        //alert('success!');
                        //$('#flex1').flexReload();
                }else{
                       // alert(data.msg);
                }*/
                alert(data.msg);
                refreshDivs('cuerpocentro','pages/layout/libros.php');
                proces = 0;
        }
   });
}