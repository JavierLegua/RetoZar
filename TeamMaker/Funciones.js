function comprobarDni(dni_user){

    var vLetras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
    var numerosDni= dni_user.substring(0,8);
    var letraDni= dni_user.substring(8,9);
    var resto = parseInt(numerosDni)%23;
    if(vLetras[resto] != letraDni){
        alert("El dni introducido no es valido");
    } else  {
        console.log();
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
    ev.dataTransfer.setData("dragElementId", ev.target.id);
}

function drop(ev, grupos) {
    ev.preventDefault();

    let dragElementId = ev.dataTransfer.getData("dragElementId");
    let groupId = ev.currentTarget.id;

    // ev.currentTarget es el contenedor donde sueltas el elemento
    ev.currentTarget.appendChild(document.getElementById(dragElementId));

    let alumno;

    let selectedGroupIndex;
    let foundStudent = false;
    let foundGroup = false;
    for (let i = 0; i < grupos.length && (!foundStudent || !foundGroup); i++) {
        if (!foundGroup && grupos[i][0] == groupId) {
            selectedGroupIndex = i;
            foundGroup = true;
        }
        for (let j = 0; j < grupos[i][1].length && !foundStudent; j++) {
            if (grupos[i][1][j][1] == dragElementId) { // La ID del elemento es el DNI del alumno
                // Se elimina el alumno del grupo
                alumno = grupos[i][1].splice(j, 1)[0];
                foundStudent = true;
            }
        }
    }

    grupos[selectedGroupIndex][1].push(alumno);
}