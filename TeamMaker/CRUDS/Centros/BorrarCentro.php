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
        echo "Centro eliminado correctamente <br>";
        echo "Redirigiendo a la lista de centros";
        header("refresh:3;url=ListarCentro.php");
    }else{
        echo "Ha habido un error a la hora de eliminar el centro";
        echo "Redirigiendo a la lista de centro";
        header("refresh:3;url=ListarCentro.php");
    }
    ?>