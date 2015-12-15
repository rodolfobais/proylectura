function validar_frm_registro(){
    var errMsg = "";
    
    if($("#psw1").val() != $("#psw2").val()){
        errMsg += "Las password deben ser iguales.\n";  $("#psw1").focus();
    }
    if($("#nombre").val() == ""){
        errMsg += "Debe completar el campo nombre.\n"; $("#nombre").focus();
    }
    if($("#psw1").val() == ""){
        errMsg += "Debe completar los campos password.\n"; $("#psw1").focus();
    }
    if($("#mail").val() == ""){
        errMsg += "Debe completar el campo mail"; $("#mail").focus();
    }else{
        if (ValidaEmail($("#mail").val()) == false){
            errMsg += "Ingrese un correo válido.\n"; $("#mail").focus();
        }
    }
    
    if(errMsg == ""){
        $("#form_registro").submit();
    }else{
        alert(errMsg);
    }
}

function ValidaEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}