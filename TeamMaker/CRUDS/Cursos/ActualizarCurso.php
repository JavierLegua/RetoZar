<?php
    session_start();
    include "../../BBDD/includes/funciones.php";

    $conexion=conectarBD();

    $nombre=$_POST['nombre'];
    $idcurso=$_POST['idCurso'];
    $centro=$_POST['idCentro'];

    $sql2 = "UPDATE CURSO SET idCurso=\"".$idcurso."\", nombre=\"".$nombre."\",CENTRO_idCentro =\"".$centro."\" WHERE idCurso=\"".$idcurso."\"";


    $consulta1=$conexion->prepare($sql2);
    $consulta1->execute(); 
    
    $nfilas=$consulta1->rowCount();

    if($nfilas==1){
        header("refresh:0.01;url=listarCurso?situacion=1");
    }else{
        header("refresh:0.01;url=listarCurso?situacion=0");
    }
    ?>
