<?php
session_start();
?>

<html>

<head>
<?php
   
   include "../../BBDD/includes/funciones.php";

?>

</head>

<body>

    <?php

    $conexion=conectarBD();

    //Cogemos los datos introducidos en los campos
           $nombre=$_POST['nombre'];
           $curso=$_POST['idCurso'];
           $centro=$_POST['idCentro'];

    
    //Escribir Consulta
    $sql1="INSERT INTO CURSO VALUES (\"$curso\",\"$nombre\",\"$centro\")"; 
    //echo "<br>".$sql."<br>"; 

    try {
        $consulta = $conexion->prepare($sql1);
        $consulta->execute();
    } catch (Exception $e) {
        echo("Curso ya introducido <br>");
        echo "Redirigiendo al menu de creación de alumnos";
        header("refresh:3;url=CrearCurso.php");
    }
    // Ejecutar consulta

    
    


    // contar numero de filas
    $nfilas=$consulta->rowCount();
    
    if($nfilas==1){

        echo "Curso creado correctamente <br>";
        header("refresh:3;url=CrearCurso.php");
        echo "Redireccionando en 3 segundos";


    }else{
        header("refresh:3;url=CrearCurso.php");
        echo "Redireccionando en 3 segundos";
    }
          

        $conexion = null;

    ?>



<body>
</html>