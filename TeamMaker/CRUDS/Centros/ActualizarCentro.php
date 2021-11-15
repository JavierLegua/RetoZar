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
        echo "Centro actualizado correctamente <br>";
        echo "Redirigiendo a la lista de centro";
        header("refresh:3;url=ListarCentro.php");
    }else{
        echo "Ha habido un error a la hora de actualizar el centro <br>";
        echo "Redirigiendo a la lista de centro";
        header("refresh:3;url=ListarCentro.php");
    }
    ?>
