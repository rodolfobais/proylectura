var tiempoGuardAut = 30000;

function habilitareditor(){
    VerificarActividad();
    CKEDITOR.replace('editor1');
    setTimeout(function(){ 
        guardadoAutomatico();
    } , tiempoGuardAut);
    CKEDITOR.instances['editor1'].on('change', 
        function() {
            marcarAccionUsuario();
        }
    );
}
function guardadoAutomatico(){
    if($("#idlibro").val() != "" && $("#nombrelibro").val() != ""){
        guardarlibro();
        setTimeout(function(){ 
            guardadoAutomatico();
        } , tiempoGuardAut);
    }
}
function guardarversion(){
    var texto = CKEDITOR.instances['editor1'].getData();
    //alert(value);return;
    var json = {
        texto: btoa(texto),
        idlibro: $("#idlibro").val(),
        nombrelibro: $("#nombrelibro").val(),
        acc: "version"
    };
    //alert($("#formeditor #editor1").val());
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/editor_data.php',
        success: function(data){
            //alert(data.msg);
            $("#idlibro").val(data.idlibro);
            guardarlibro();
        }
   });
}
function guardarlibro(){
    if($("#nombrelibro").val() == ""){
        alert("Debe completar el nombre del libro");
    }
    var texto = CKEDITOR.instances['editor1'].getData();
    //alert(value);return;
    var json = {
        texto: btoa(texto),
        idlibro: $("#idlibro").val(),
        nombrelibro: $("#nombrelibro").val(),
        acc: "guardar"
    };
    //alert($("#formeditor #editor1").val());
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/editor_data.php',
        success: function(data){
            //alert(data.msg);
            $("#idlibro").val(data.idlibro);
            mostrarEtiquetaGuardado();
        }
   });
}

function mostrarEtiquetaGuardado(){
    $("#etiquetaGuardado").show("slow");
    setTimeout(function(){ 
        $("#etiquetaGuardado").hide("slow"); }
    , 5000);
}
function marcarAccionUsuario(){
    if($("#idlibro").val() == ""){return;}
    var json = {
        idlibro: $("#idlibro").val(),
        acc: "marcarAccionUsuario"
    };
    //alert($("#formeditor #editor1").val());
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/editor_data.php',
        success: function(data){
            $("#ultimaaccion").val(data.fecha);
        }
   });
}
function marcarActividad(){
    if($("#idlibro").val() == ""){return;}
    var json = {
        idlibro: $("#idlibro").val(),
        acc: "marcarActividad"
    };
    //alert($("#formeditor #editor1").val());
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/editor_data.php',
        success: function(data){
            $("#ultimaaccion").val(data.fecha);
        }
   });
}
function VerificarActividad(){
    if($("#idlibro").val() == ""){return;}
    var json = {
        idlibro: $("#idlibro").val(),
        acc: "VerificarActividad"
    };
    
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/editor_data.php',
        success: function(data){
            //alert(data.diferencia_minutos);
            if(data.diferencia_minutos < 5){
                $("#cuerpocentro").html("El proyecto esta siendo modificado por el usuario "+data.usuario_bloqueador+".");
            }
            
        }
   });
}
function vistaPrevia(){
    guardarlibro();
    var json = {
        idlibro: $("#idlibro").val(),
        acc: "vistaPrevia"
    };
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/editor_data.php',
        success: function(data){
            $("#vistaPrevia").html(data.html);
        }
   });
}
function verPdf(){
    guardarlibro();
    window.location.href = "pages/layout/generarlibropdf.php?id="+$("#idlibro").val();
}