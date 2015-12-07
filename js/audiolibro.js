function editaregistroaudio(id){
    $("#formulario_audiolibros #id").val(id);
    $("#formulario_audiolibros #nombreaudio").val($("#nombreaudio_"+id).html());
    $("#formulario_audiolibros #hasharchivo").val($("#hasharchivo_"+id).html());
    //$("#formulario_usuarios #nombre").val($("#nombre_"+id).html());
    $("#formulario_audiolibros #titulo_formulario").html("Editar audiolibro.");
    $("#formulario_audiolibros .box-body").show("slow");
    $("#formulario_audiolibros #accion").val("e");
}

function enviar_form_audiolibros() {
            //console.log("submit event");
            var fd = new FormData(document.getElementById("formmp3"));
            //fd.append("label", "WEBUPLOAD");
            $.ajax({
              url: "pages/layout/mp3_data.php",
              type: "POST",
              data: fd,
              enctype: 'multipart/form-data',
              processData: false,  // tell jQuery not to process the data
              contentType: false   // tell jQuery not to set contentType
            }).done(function( data ) {
                alert(data);
                refreshDivs('cuerpocentro','pages/layout/subirmp3.php');
            });
            return false;
        }
        
        
/*function enviar_form_audiolibros(){
    var json = {
        id: $("#formulario_audiolibros #id").val() , 
        nombreaudio: $("#formulario_audiolibros #nombreaudio").val() ,  
        //hash: $("#formulario_audiolibros #hasharchivo").val() ,  
        accion: $("#formulario_audiolibros #accion").val()
    };
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/mp3_data.php',
        success: function(data){/*
                if (data.error == 0){
                        //alert('success!');
                        //$('#flex1').flexReload();
                }else{
                       // alert(data.msg);
                }*/
               // alert(data.msg);
               // refreshDivs('cuerpocentro','pages/layout/subirmp3.php');
                //proces = 0;
       // }
//}*/
function borrar_audiolibro(id){
    var json = {
        id: id,
        accion: "d"
    };
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/mp3_data.php',
        success: function(data){/*
                if (data.error == 0){
                        //alert('success!');
                        //$('#flex1').flexReload();
                }else{
                       // alert(data.msg);
                }*/
                alert(data.msg);
                refreshDivs('cuerpocentro','pages/layout/subirmp3.php');
                proces = 0;
        }
   });
}