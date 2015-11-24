function habilitareditor(id){
    CKEDITOR.replace('editor1');
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
                proces = 0;
        }
   });
}
function guardarlibro(){
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
                proces = 0;
        }
   });
}