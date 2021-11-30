<?php
    session_start();
    include "../../BBDD/includes/funciones.php";

    $conexion=conectarBD();


    $idcurso=$_GET['curso'];


    $sql = "DELETE FROM CURSO WHERE idCurso=\"".$idcurso."\"";


    $consulta=$conexion->prepare($sql);
    $consulta->execute(); 

    
    $nfilas=$consulta->rowCount();
  

    if($nfilas==1){
        header("refresh:0.01;url=listarCurso?situacion=2");
    }else{
        header("refresh:0.01;url=listarCurso?situacion=3");
    }
    ?>