function formatearlista(){
    $("#lista_libro").DataTable( {
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

function formatearperfil(){
    $("#lista_perfil").DataTable( {
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
            "search": "Buscar usuario:"
        }
    } );
}
