
function comprobarDni(dni_user){

    var vLetras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
    var numerosDni= dni_user.substring(0,8);
    var letraDni= dni_user.substring(8,9);
    var resto = parseInt(numerosDni)%23;
    if(vLetras[resto] != letraDni.toUpperCase()){
        document.getElementById("dni_error").innerHTML="El usuario introducido no existe";
    } else  {
        document.getElementById("dni_error").innerHTML="";
    }

}

function comprobarPass(password, dni){
    dni = toString(dni);
    var numerosDni = dni.substring(0,8);
    var letraDni = dni.substring(8,9);
    var dni_final = numerosDni + letraDni.toUpperCase();
    if(password != dni_final){
        document.getElementById("password_error").innerHTML="La contraseña no coincide o es incorrecta";
        document.write(password + " " + dni)
    } else  {
        document.getElementById("password_error").innerHTML="";
        document.write(password + " " + dni)
    }

}