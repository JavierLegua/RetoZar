<?php
    session_start();
    include "../../BBDD/includes/funciones.php";

    $conexion=conectarBD();


    $dni = $_GET['dni'];


    $sql = "DELETE FROM USUARIO WHERE DNI=\"".$dni."\"";


    $consulta=$conexion->prepare($sql);
    $consulta->execute(); 

    
    $nfilas=$consulta->rowCount();
  

    if($nfilas==1){
        // echo "Usuario eliminado correctamente <br>";
        // echo "Redirigiendo a la lista de profesores";
        header("refresh:0.01;url=listarProfesor?situacion=2");
    }else{
        // echo "Ha habido un error a la hora de eliminar el profesor";
        header("refresh:0.01;url=listarProfesor?situacion=2");
    }
    ?>