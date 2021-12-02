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
        header("refresh:0.01;url=listarAlumno?situacion=2");
    }else{
        header("refresh:0.01;url=listarAlumno?situacion=3");
    }
    ?>