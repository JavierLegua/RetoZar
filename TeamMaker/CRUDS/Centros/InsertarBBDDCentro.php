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
           $direccion=$_POST['direccion'];
           $centro=$_POST['idCentro'];

    
    //Escribir Consulta
    $sql1="INSERT INTO CENTRO VALUES (\"$centro\",\"$nombre\",\"$direccion\")"; 
    //echo "<br>".$sql."<br>"; 

    try {
        $consulta = $conexion->prepare($sql1);
        $consulta->execute();
    } catch (Exception $e) {
        echo("Centro ya introducido <br>");
        echo "Redirigiendo al menu de creación de centros";
        header("refresh:3;url=CrearCentro.php");
    }
    // Ejecutar consulta

    
    


    // contar numero de filas
    $nfilas=$consulta->rowCount();
    
    if($nfilas==1){

        echo "Centro creado correctamente <br>";
        header("refresh:3;url=CrearCentro.php");
        echo "Redireccionando en 3 segundos";


    }else{
        header("refresh:3;url=CrearCentro.php");
        echo "Redireccionando en 3 segundos";
    }
          

        $conexion = null;

    ?>



<body>
</html>