<?php
    session_start();
    include "../../BBDD/includes/funciones.php";

    $conexion=conectarBD();

    $nombre=$_POST['nombre'];
    $usuario=$_POST['DNI'];
    /* $clave=$_POST['Clave']; */
    $rol=$_POST['Rol'];

    $sql3 = "UPDATE PROFESOR SET Rol=\"".$rol."\" WHERE USUARIO_DNI=\"$usuario\"";

    $sql2 = "UPDATE USUARIO SET DNI=\"".$usuario."\", nombre=\"".$nombre."\" WHERE DNI=\"".$usuario."\"";


    $consulta1=$conexion->prepare($sql2);
    $consulta1->execute(); 


    $consulta=$conexion->prepare($sql3);
    $consulta->execute();
    
    $nfilas=$consulta->rowCount()+$consulta1->rowCount();

    if($nfilas==1 || $nfilas==2){
        // echo "Usuario actualizado correctamente <br>";
        // echo "Redirigiendo a la lista de profesores";
        header("refresh:0.01;url=listarProfesor?situacion=1");
    }else{
        // echo "Ha habido un error a la hora de actualizar el profesor<br>";
        // echo "Redirigiendo a la lista de profesores";
        header("refresh:0.01;url=listarProfesor?situacion=0");
    }
    ?>
