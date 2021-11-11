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
           $usuario=$_POST['DNI'];
           $clave=$_POST['Clave'];
           $curso=$_POST['curso'];

    
    //Escribir Consulta
    $sql1="INSERT INTO USUARIO VALUES (\"$usuario\",\"$nombre\",\"$clave\")"; 
    //echo "<br>".$sql."<br>"; 

    try {
        $consulta = $conexion->prepare($sql1);
        $consulta->execute();
    } catch (Exception $e) {
        echo("Usuario ya introducido <br>");
    }
    // Ejecutar consulta

    
    


    // contar numero de filas
    $nfilas=$consulta->rowCount();
    
    if($nfilas==1){
        //Escribir Consulta
        $sql="INSERT INTO ALUMNO VALUES (\"$usuario\",\"$curso\")"; 
   /*      echo "<br>".$sql."<br>";  */

        // Ejecutar consulta

        $consulta = $conexion->prepare($sql);
        $consulta->execute();


        // contar numero de filas
        $nfilas=$consulta->rowCount();
/*         echo("$sql");
        echo("$nfilas"); */
        if($nfilas==1){
            echo "Usuario insertado correctamente";
        }else{
            echo "Error al insertar en tabla alumno";
        }

    }else{
        header("refresh:3;url=CrearAlumno.php");
        echo "Redireccionando en 3 segundos";
    }
          

        $conexion = null;

    ?>



<body>
</html>