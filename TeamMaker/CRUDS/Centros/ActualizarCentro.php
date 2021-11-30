<?php
    session_start();
    include "../../BBDD/includes/funciones.php";

    $conexion=conectarBD();

    $nombre=$_POST['nombre'];
    $idcentro=$_POST['idCentro'];
    $direccion=$_POST['direccion'];

    $sql = "SELECT * FROM CENTRO";

    $consulta=$conexion->prepare($sql);
    $consulta->execute();

    $centro=$consulta->fetch();

    $idCentroViejo=$centro->idCentro;


    $sql2 = "UPDATE CENTRO SET idCentro=\"".$idcentro."\", nombre=\"".$nombre."\",Direccion =\"".$direccion."\" WHERE idCentro=\"".$idCentroViejo."\"";


    $consulta1=$conexion->prepare($sql2);
    $consulta1->execute(); 
    
    $nfilas=$consulta->rowCount();

    if($nfilas==1){
        header("refresh:0.01;url=listarCentro?situacion=0");
    }else{
        header("refresh:0.01;url=listarCentro?situacion=1");
    }
    ?>
