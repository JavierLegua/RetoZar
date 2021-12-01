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
        header("refresh:0.01;url=crearCentro?situacion=0");
    }
    // Ejecutar consulta

    
    


    // contar numero de filas
    $nfilas=$consulta->rowCount();
    
    if($nfilas==1){
        header("refresh:0.01;url=crearCentro?situacion=1");
    }else{
        header("refresh:0.01;url=crearCentro?situacion=2");
    }
          

        $conexion = null;

    ?>



<body>
</html>