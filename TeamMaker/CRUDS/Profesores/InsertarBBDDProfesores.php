<?php
session_start();
?>
<?php
   
   include "../../BBDD/includes/funciones.php";

?>


    <?php

    $conexion=conectarBD();

    //Cogemos los datos introducidos en los campos
           $nombre=$_POST['nombre'];
           $usuario=$_POST['DNI'];
           $clave=$_POST['Clave'];
           $rol=$_POST['Rol'];
           $centro=$_POST['centro'];
           $curso=$_POST['curso'];

           /* echo $centro."----------".$curso."-----".$rol; 
        

          */

    
    //Escribir Consulta
    $sql1="INSERT INTO USUARIO VALUES (\"$usuario\",\"$nombre\",\"$clave\")"; 
    //echo "<br>".$sql."<br>"; 

    try {
        $consulta = $conexion->prepare($sql1);
        $consulta->execute();
    } catch (Exception $e) {
        // echo("Usuario ya introducido <br>");
        // echo "Redirigiendo al menu de creación de profesores";
        header("refresh:0.01;url=crearProfesor?situacion=0");
    }
    // Ejecutar consulta

    
    


    // contar numero de filas
    $nfilas=$consulta->rowCount();
    
    if($nfilas==1){
        //Escribir Consulta
        $sql="INSERT INTO PROFESOR VALUES (\"$usuario\",\"$rol\")";
        $sqlCurso="INSERT INTO pertenece VALUES (\"$usuario\",\"$curso\",\"$centro\")" ;
   /*      echo "<br>".$sql."<br>";  */

        // Ejecutar consulta

        /* echo $sqlCurso; */
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
       
        $consultaCurso = $conexion->prepare($sqlCurso);
        $consultaCurso->execute();


        // contar numero de filas
        $nfilas=$consulta->rowCount();
        $nfilas2=$consultaCurso->rowCount();
/*         echo("$sql");
        echo("$nfilas"); */
        if($nfilas==1&&$nfilas2==1){
            // echo "Usuario insertado correctamente <br>";
            // echo "Redirigiendo al menu de creación de profesores";
            header("refresh:0.01;url=crearProfesor?situacion=1");
        }else{
            // echo "Error al insertar en tabla profesor<br>";
            // echo "Redirigiendo al menu de creación de profesores";
            header("refresh:0.01;url=crearProfesor?situacion=2");
        }

    }else{
        header("refresh:0.01;url=crearProfesor?situacion=3");
        // echo "Redireccionando en 3 segundos";
    }
          

        $conexion = null;
    ?>