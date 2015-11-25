function filtrarversiones(libro){
    var json = {idlibro: libro, acc: "filtrar"};
    //alert($("#formeditor #editor1").val());
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/revision_de_modificaciones_data.php',
        success: function(data){
                $("#listado").html(data.html);
        }
   });
}

function comparar(){
    var cant = 0;
    var versiones = []; 
    $("#listado input[type=checkbox]:checked").each(function(){
        versiones[cant] = $(this).val();
	//alert($(this).val());
        cant++;
    });
    if(cant != 2){
        alert("Debe seleccionar 2 versiones para comparar");
    }else{
        var json = {versiones: versiones, acc: "comparar"};
        //alert($("#formeditor #editor1").val());
        $.ajax({
            data: {json: $.toJSON(json) },
            type: 'POST',
            dataType: 'json',
            url: 'pages/layout/revision_de_modificaciones_data.php',
            success: function(data){
                    $("#listado").html(data.html);
            }
       });
    }
}