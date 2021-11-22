<?php
    session_start();
    include "../../BBDD/includes/funciones.php";

    $conexion=conectarBD();

    $nombre=$_POST['nombre'];
    $idcurso=$_POST['idCurso'];
    $centro=$_POST['idCentro'];

    $sql = "SELECT * FROM CURSO";

    $consulta=$conexion->prepare($sql);
    $consulta->execute();

    $curso=$consulta->fetch();

    $idCursoViejo=$curso->idCurso;


    $sql2 = "UPDATE CURSO SET idCurso=\"".$idcurso."\", nombre=\"".$nombre."\",CENTRO_idCentro =\"".$centro."\" WHERE idCurso=\"".$idCursoViejo."\"";


    $consulta1=$conexion->prepare($sql2);
    $consulta1->execute(); 
    
    $nfilas=$consulta->rowCount();

    if($nfilas==1){
        header("refresh:0.01;url=ListarCurso.php?situacion=0");
    }else{
        header("refresh:0.01;url=ListarCurso.php?situacion=1");
    }
    ?>
