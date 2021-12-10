<?php

    session_start();
    include "../BBDD/includes/funciones.php";

    $conexion=conectarBD();

    $idEquipo=$_GET['idEquipo'];

    $borrar="delete from EQUIPOS where idEquipo=\"".$idEquipo."\"";

    $consulta=$conexion->prepare($borrar);
    $consulta->execute(); 

    $nfilas=$consulta->rowCount();
  

    if($nfilas==1){
        header("refresh:0.01;url=verGrupos");
    }else{
        header("refresh:0.01;url=verGrupos");
    }

?>