<?php
    session_start();
    include "../../BBDD/includes/funciones.php";

    $conexion=conectarBD();

    $nombre=$_POST['nombre'];
    $usuario=$_POST['DNI'];
    $clave=$_POST['Clave'];
    $curso=$_POST['curso'];
    $dni = $_SESSION['DNI_VIEJO'];

    $sql3 = "UPDATE ALUMNO SET id_curso=\"".$curso."\" WHERE USUARIO_DNI=\"$usuario\"";

    $sql2 = "UPDATE USUARIO SET DNI=\"".$usuario."\", nombre=\"".$nombre."\",Clave =\"".$clave."\" WHERE DNI=\"".$dni."\"";


    $consulta1=$conexion->prepare($sql2);
    $consulta1->execute(); 


    $consulta=$conexion->prepare($sql3);
    $consulta->execute();
    
    $nfilas=$consulta->rowCount()+$consulta1->rowCount();

    if($nfilas==1 || $nfilas==2){
        echo "Usuario actualizado correctamente <br>";
        echo "Redirigiendo a la lista de alumnos";
        header("refresh:3;url=ListarAlumnos.php");
    }else{
        echo "Ha habido un error a la hora de actualizar el alumno";
    }
    ?>
