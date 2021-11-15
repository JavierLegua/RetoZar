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
        echo "Curso eliminado correctamente <br>";
        echo "Redirigiendo a la lista de cursos";
        header("refresh:3;url=ListarCurso.php");
    }else{
        echo "Ha habido un error a la hora de eliminar el curso";
        echo "Redirigiendo a la lista de cursos";
        header("refresh:3;url=ListarCurso.php");
    }
    ?>