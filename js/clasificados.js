function editaregistro_clasificado(id){
    var json = {
        id: id,
        accion: "obtener_datos"
    };
    
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/clasificados_data.php',
        success: function(data){
            //alert(data.msg);
            $("#formulario_clasificados #id").val(id);
            $("#formulario_clasificados #texto_corto").val(data.texto_corto);
            $("#formulario_clasificados #texto_largo").val(data.texto_largo);
            $("#formulario_clasificados #libro").val(data.libro);
            
            $("#formulario_clasificados #titulo_formulario").html("Editar clasificado.");
            $("#formulario_clasificados .box-body").show("slow");
            $("#formulario_clasificados #accion").val("e");
        }
   });
}
function enviar_form_clasificado(){
    var json = {
        id: $("#formulario_clasificados #id").val() , 
        texto_corto: $("#formulario_clasificados #texto_corto").val() , 
        texto_largo: $("#formulario_clasificados #texto_largo").val() , 
        libro: $("#formulario_clasificados #libro").val(),
        accion: $("#formulario_clasificados #accion").val()
    };
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/clasificados_data.php',
        success: function(data){
                alert(data.msg);
                refreshDivs('cuerpocentro','pages/layout/clasificados.php');
        }
   });
}
function borrar_clasificado(id){
    var json = {
        id: id,
        accion: "d"
    };
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/clasificados_data.php',
        success: function(data){
            alert(data.msg);
            refreshDivs('cuerpocentro','pages/layout/clasificados.php');
        }
   });
}
function formateartabla(){
    $("#lista_clasif").DataTable( {
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron registros",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontraron registros",
            "infoFiltered": "(_MAX_ registros totales)",
            "paginate": {
                "previous": "Anterior",
                "next": "Siguiente"
            },
            "search": "Filtrar:"
        }
    } );
}
function solicitarcolaborar(id){
    var json = {
        id: id,
        accion: "solicitarcolaborar"
    };
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/clasificados_data.php',
        success: function(data){
            alert(data.msg);
            refreshDivs('cuerpocentro','pages/layout/clasificados_lista.php');
            formateartabla();
        }
   });
}


