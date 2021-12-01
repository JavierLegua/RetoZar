<?php
    session_start();
    include "../../BBDD/includes/funciones.php";

    $conexion=conectarBD();

    $nombre=$_POST['nombre'];
    $usuario=$_POST['dni'];
    /* $clave=$_POST['Clave']; */
    $curso=$_POST['curso'];

    $sql3 = "UPDATE ALUMNO SET id_curso=\"".$curso."\" WHERE USUARIO_DNI=\"$usuario\"";

    $sql2 = "UPDATE USUARIO SET DNI=\"".$usuario."\", nombre=\"".$nombre."\" WHERE DNI=\"".$usuario."\"";


    $consulta1=$conexion->prepare($sql2);
    $consulta1->execute(); 


    $consulta=$conexion->prepare($sql3);
    $consulta->execute();
    
    $nfilas=$consulta->rowCount()+$consulta1->rowCount();

    if($nfilas==1 || $nfilas==2){
        header("refresh:0.01;url=listarAlumno?situacion=1");
    }else{
        header("refresh:0.01;url=listarAlumno?situacion=0");
    }
    ?>
