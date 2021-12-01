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
        /* echo("Usuario ya introducido <br>");
        echo "Redirigiendo al menu de creación de alumnos"; */
        header("refresh:0.01;url=anadirAlumno?situacion=0");
    }
    

    
    


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
            /* echo "Usuario insertado correctamente <br>";
            echo "Redirigiendo al menu de creación de alumnos"; */
            header("refresh:0.01;url=anadirAlumno?situacion=1");
        }else{
            /* echo "Error al insertar en tabla alumno"; */
            header("refresh:0.01;url=anadirAlumno?situacion=2");
        }

    }else{
        header("refresh:0.01;url=anadirAlumno?situacion=3");
        /* echo "Redireccionando en 3 segundos"; */
    }
          

        $conexion = null;

    ?>



<body>
</html>