function editaregistro(id){
    $("#formulario_usuarios #id").val(id);
    $("#formulario_usuarios #nombre").val($("#nombre_"+id).html());
    $("#formulario_usuarios #mail").val($("#mail_"+id).html());
    $("#formulario_usuarios #password").val($("#password_"+id).html());
    //$("#formulario_usuarios #nombre").val($("#nombre_"+id).html());
    $("#formulario_usuarios #titulo_formulario").html("Editar usuario.");
    $("#formulario_usuarios .box-body").show("slow");
    $("#formulario_usuarios #accion").val("e");
}
function enviar_form_usuarios(){
    var json = {
        id: $("#formulario_usuarios #id").val() , 
        nombre: $("#formulario_usuarios #nombre").val() , 
        mail: $("#formulario_usuarios #mail").val() , 
        password: $("#formulario_usuarios #password").val() , 
        accion: $("#formulario_usuarios #accion").val()
    };
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/usuarios_data.php',
        success: function(data){/*
                if (data.error == 0){
                        //alert('success!');
                        //$('#flex1').flexReload();
                }else{
                       // alert(data.msg);
                }*/
                alert(data.msg);
                refreshDivs('cuerpocentro','pages/layout/usuarios.php');
                proces = 0;
        }
   });
}
function borrar_usuario(id){
    var json = {
        id: id,
        accion: "d"
    };
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/usuarios_data.php',
        success: function(data){/*
                if (data.error == 0){
                        //alert('success!');
                        //$('#flex1').flexReload();
                }else{
                       // alert(data.msg);
                }*/
                alert(data.msg);
                refreshDivs('cuerpocentro','pages/layout/usuarios.php');
                proces = 0;
        }
   });
}

function editaperfil(id){
    $("#formulario_usuarios #id").val(id);
    $("#formulario_usuarios #nombre").val($("#nombre_"+id).html());
    $("#formulario_usuarios #mail").val($("#mail_"+id).html());
    $("#formulario_usuarios #password").val($("#password_"+id).html());
    //$("#formulario_usuarios #nombre").val($("#nombre_"+id).html());
    $("#formulario_usuarios #titulo_formulario").html("Editar usuario.");
    $("#formulario_usuarios .box-body").show("slow");
    $("#formulario_usuarios #accion").val("e");
}

function editaperfilfoto() {
            //console.log("submit event");
            var fd = new FormData(document.getElementById("formfoto"));
            //fd.append("label", "WEBUPLOAD");
            $.ajax({
              url: "pages/layout/perfil_data.php",
              type: "POST",
              data: fd,
              enctype: 'multipart/form-data',
              processData: false,  // tell jQuery not to process the data
              contentType: false   // tell jQuery not to set contentType
            }).done(function( data ) {
                alert(data);
                refreshDivs('cuerpocentro','pages/layout/perfil.php');
            });
            return false;
        }