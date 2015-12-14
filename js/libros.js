function editaregistro_libro(id){
    $("#formulario_libros #accion").val("obtener_datos");
    $("#formulario_libros #id").val(id);
    var fd = new FormData(document.getElementById("formpdf"));
    
    $.ajax({
      url: "pages/layout/libros_data.php",
      type: "POST",
      data: fd,
      dataType: 'json',
      enctype: 'multipart/form-data',
      processData: false,  // tell jQuery not to process the data
      contentType: false   // tell jQuery not to set contentType
    }).done(function( data ) {
        $("#formulario_libros #id").val(id);
        $("#formulario_libros #nombrelibro").val(data.nombre);
        $("#formulario_libros #vinculogenero").val(data.genero);
        $("#formulario_libros #autor").val(data.autor);
        $("#formulario_libros #sinopsis").val(data.sinopsis);
        $("#formulario_libros #privacidad").val(data.privacidad);

        $("#formulario_libros #campo_imagen").hide();
        $("#formulario_libros #campo_pdf").hide();

        $("#formulario_libros #titulo_formulario").html("Editar libro.");
        $("#formulario_libros .box-body").show("slow");
        $("#formulario_libros #accion").val("e");
    });
    return false;
    
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/libros_data.php',
        success: function(data){
            //alert(data.msg);
            $("#formulario_libros #id").val(id);
            $("#formulario_libros #nombrelibro").val(data.nombre);
            $("#formulario_libros #vinculogenero").val(data.genero);
            $("#formulario_libros #autor").val(data.autor);
            $("#formulario_libros #sinopsis").val(data.sinopsis);
            $("#formulario_libros #privacidad").val(data.privacidad);
            
            $("#formulario_libros #campo_imagen").hide();
            $("#formulario_libros #campo_pdf").hide();
            
            $("#formulario_libros #titulo_formulario").html("Editar libro.");
            $("#formulario_libros .box-body").show("slow");
            $("#formulario_libros #accion").val("e");
        }
   });
}
function enviar_form_libro(){
    //console.log("submit event");
    var fd = new FormData(document.getElementById("formpdf"));
    //fd.append("label", "WEBUPLOAD");
    $.ajax({
      url: "pages/layout/libros_data.php",
      type: "POST",
      data: fd,
      enctype: 'multipart/form-data',
      processData: false,  // tell jQuery not to process the data
      contentType: false   // tell jQuery not to set contentType
    }).done(function( data ) {
        alert(data);
        refreshDivs('cuerpocentro','pages/layout/libros.php');
    });
    return false;
}

function borrar_libro(id){
    $("#formulario_libros #accion").val("d");
    $("#formulario_libros #id").val(id);
    var fd = new FormData(document.getElementById("formpdf"));
    $.ajax({
      url: "pages/layout/libros_data.php",
      type: "POST",
      data: fd,
      enctype: 'multipart/form-data',
      processData: false,  // tell jQuery not to process the data
      contentType: false   // tell jQuery not to set contentType
    }).done(function( data ) {
        alert(data);
        refreshDivs('cuerpocentro','pages/layout/libros.php');
    });
}

function recomendacion(){
    alert("Estoy dentro de libros.js y me llamo function recomendacion(), ME VEN TODOS LOS USUARIOS");
}

function bloquear(){
    alert("Estoy dentro de libros.js y me llamo function bloquear(), SOLO ME VE EL ADMINISTRADOR");
}

function votar(){
    alert("Estoy dentro de libros.js y me llamo function votar(), ME PUEDEN VOTAR TODOS LOS USUARIOS SOLO UNA VEZ");
}

function denunciar(){
    alert("Estoy dentro de libros.js y me llamo function denunciar(), ME PUEDEN DENUNCIAR TODOS LOS USUARIOS, MENOS YO MISMO");
}