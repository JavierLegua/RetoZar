<?php
    session_start();
    include "../../BBDD/includes/funciones.php";

    $conexion=conectarBD();

    $nombre=$_POST['nombre'];
    $usuario=$_POST['DNI'];
    $clave=$_POST['Clave'];
    $curso=$_POST['curso'];

    $sql2 = "UPDATE ALUMNO, USUARIO SET USUARIO.DNI=\"".$usuario."\", USUARIO.nombre=\"".$nombre."\",USUARIO.Clave =\"".$clave."\", ALUMNO.id_curso= \"".$curso."\" WHERE USUARIO.DNI=\"".$dni."\"";

    $consulta=$conexion->prepare($sql2);
    $consulta->execute();
    
    $nfilas=$consulta->rowCount();

    if($nfilas==1){
        echo "Usuario actualizado correctamente";
        echo "Redirigiendo a la lista de alumnos";
        header("refresh:3;url=ListarAlumnos.php");
    }else{
        echo "Ha habido un error a la hora de actualizar el alumno";
    }
    ?>
