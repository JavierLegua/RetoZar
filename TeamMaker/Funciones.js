    
function comprobacionDni(dni_user){

    var vLetras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
    var numerosDni= dni_user.substring(0,8);
    var letraDni= dni_user.substring(8,9);
    var resto = parseInt(numerosDni)%23;
    if(vLetras[resto] != letraDni){
        document.getElementById("errorDni").innerHTML="El dni introduciodo no es correcto";
    } else  {
        document.getElementById("errorDni").innerHTML="";
    }

}


function comprobacionPass(password, dni){
    dni = dni.toString();
    var numerosDni = dni.substring(0,8);
    var letraDni = dni.substring(8,9);
    var dni_final = numerosDni + letraDni;
    if(password != dni_final){
        document.getElementById("password_error").innerHTML="La contraseña no coincide o es incorrecta";
    } else  {
        document.getElementById("password_error").innerHTML="";
    }

}

function redirigir(ruta){
    location.href=ruta;
}

function redirigir_alumnos(ruta){
    location.href=ruta;
}

function redirigir_curso(ruta, curso){
    location.href=ruta+curso;
}

function redirigir_centro(ruta, centro){
    location.href=ruta+centro;
}

$(document).ready(menu);

var contador = 1;

function menu () {
	$('.icon-menu2').unbind().click(function(){
		if (contador == 1) {
			$('#navMovil').animate({
				left: '0'
			});
           contador = 0
          //  console.log(contador)
		} else {
            contador=1
            $('#navMovil').animate({
				left: '-100%'
			});
          // console.log(contador)
        }
	});

	// Mostramos y ocultamos submenus
	$('.submenu').unbind().click(function(){
		$(this).children('.children').slideToggle();
	});

}

 //Editar grupos funciones de drag and drop
function allowDrop(ev) {
    ev.preventDefault();
}
  
function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}
  
function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));

    if ( ev.target.className == "divGrupo" ) {
        //document.getElementById("demo").style.color = "";
        ev.target.style.border = "";
        var newT=ev.target 
        newT.appendChild(document.getElementById(data));
    } 

    if ( ev.target.parentElement.className == "divGrupo" ) { 
        ev.target.style.border = "";
        var newT=ev.target.parentElement
        newT.appendChild(document.getElementById(data));     
    }

    if ( ev.target.parentElement.parentElement.className == "divGrupo" ) {
        ev.target.style.border = "";
        var newT=ev.target.parentElement.parentElement
        newT.appendChild(document.getElementById(data));    
    }

    if ( ev.target.parentElement.parentElement.parentElement.className == "divGrupo" ) {
        ev.target.style.border = "";
        var newT=ev.target.parentElement.parentElement.parentElement
        newT.appendChild(document.getElementById(data));     }
}