function playlistxml(id, idlibro){
    var json = {
        id: id, idlibro:idlibro
    };
    $.ajax({
        data: {json: $.toJSON(json) },
        type: 'POST',
        dataType: 'json',
        url: 'pages/layout/listaxml.php',
        success: function(data){
            //alert(data.nombrearchivo);
        document.getElementById('contenedorReproductor').innerHTML='<embed src="reproductor/dewplayer-playlist.swf" height="200" width="240" wmode="transparent" flashvars="xml='+data.nombrearchivo+'&autoplay=0&autoreplay=1&randomplay=0&volume=100"></embed>';	
        }
   });
    
    
}