<?php
    session_start();
    include "../../BBDD/includes/funciones.php";

    $conexion=conectarBD();

    $sql = "SELECT * FROM CENTRO";

    $consulta=$conexion->prepare($sql);
    $consulta->execute();

    $centro=$consulta->fetchAll();

    $idCentroViejo=$centro->idCentro;

    echo $idCentroViejo;

    $nombre=$_POST['nombre'];
    $idcentro=$_POST['idCentro'];
    $direccion=$_POST['direccion'];

   /*  echo $nombre;
    echo $idcentro;
    echo $direccion; */

    $sql2 = "UPDATE CENTRO SET idCentro=\"".$idcentro."\", nombre=\"".$nombre."\",Direccion =\"".$direccion."\" WHERE idCentro=\"".$idCentroViejo."\"";

    $consulta1=$conexion->prepare($sql2);
    $consulta1->execute(); 
    
    $nfilas=$consulta->rowCount();

    /* if($nfilas==1){
        header("refresh:0.01;url=listarCentro?situacion=0");
    }else{
        header("refresh:0.01;url=listarCentro?situacion=1");
    } */
    ?>
