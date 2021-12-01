<?php
    session_start();
    include "../../BBDD/includes/funciones.php";

    $conexion=conectarBD();


    $idCentro=$_GET['idCentro'];


    $sql = "DELETE FROM CENTRO WHERE idCentro=\"".$idCentro."\"";


    $consulta=$conexion->prepare($sql);
    $consulta->execute(); 

    
    $nfilas=$consulta->rowCount();
  

    if($nfilas==1){
        header("refresh:0.01;url=listarCentro?situacion=2");
    }else{
        header("refresh:0.01;url=listarCentro?situacion=3");
    }
    ?>