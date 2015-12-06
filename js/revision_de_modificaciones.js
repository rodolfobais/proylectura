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
                    $("#comparacion").html(data.resultado);
            }
       });
    }
}

function aprobarversion(libro, version){
    var json = {libro: libro, version: version, acc: "aprobarversion"};
    //alert($("#formeditor #editor1").val());
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/revision_de_modificaciones_data.php',
        success: function(data){
            alert(data.msg);
            refreshDivs('cuerpocentro','pages/layout/revision_de_modificaciones.php');    
            //$("#listado").html(data.html);
        }
   });
}