<?php
    session_start();
    include "../../BBDD/includes/funciones.php";

    $conexion=conectarBD();


    $idCursoViejo=$_GET['curso'];


    $sql = "DELETE FROM CURSO WHERE idCurso=\"".$idCursoViejo."\"";


    $consulta=$conexion->prepare($sql);
    $consulta->execute(); 

    
    $nfilas=$consulta->rowCount();
  

    if($nfilas==1){
        header("refresh:0.01;url=ListarCurso.php?situacion=2");
    }else{
        header("refresh:0.01;url=ListarCurso.php?situacion=3");
    }
    ?>