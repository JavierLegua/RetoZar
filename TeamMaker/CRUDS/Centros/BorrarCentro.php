<?php
    session_start();
    include "../../BBDD/includes/funciones.php";

    $conexion=conectarBD();


    $idCentroViejo=$_GET['centro'];


    $sql = "DELETE FROM CENTRO WHERE idCentro=\"".$idCentroViejo."\"";


    $consulta=$conexion->prepare($sql);
    $consulta->execute(); 

    
    $nfilas=$consulta->rowCount();
  

    if($nfilas==1){
        header("refresh:0.01;url=ListarCentro.php?situacion=2");
    }else{
        header("refresh:0.01;url=ListarCentro.php?situacion=3");
    }
    ?>