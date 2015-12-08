var tiempoActualizaAut = 10000;
function iniciarcarousel(){
    $('.carousel').carousel();
}
function actualizacionesAutomaticas(){
    mostrar_notificacion();
    mostrar_solicitud();
    mostrar_mensaje();
    setTimeout(function(){ 
        actualizacionesAutomaticas();
    } , tiempoActualizaAut);
}