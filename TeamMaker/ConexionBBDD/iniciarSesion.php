<?php
session_start();
?>

<html>

<head>
<?php
   
   include "includes/funciones.php";

?>

</head>

<body>
    <h4> PRUEBA CONEXIÓN BASE DE DATOS</H4>

    <?php

        if(!isset($_POST['Entrar']))
            {
                header("refresh:3;url=index.php");
                echo "Redireccionando en 3 segundos";
                die();
            }


        $conexion=conectarBD();

           $usuario=$_POST['usuario'];
           $clave=$_POST['clave'];
           
           //Escribir Consulta
                $sql="SELECT * FROM usuarios WHERE login=\"$usuario\" and password =\"$clave\""; 
           

           // Ejecutar consulta
        
                $consulta = $conexion->prepare($sql);
                $consulta->execute();

            // contar numero de filas
                $nfilas=$consulta->rowCount();
                echo "El número de filas devuelto es: $nfilas";
                echo "<br>";
            
            // verificar el LOGIN
                if($nfilas==1)
                    {
                        $fila = $consulta->fetch();   
                        $_SESSION['usuario']=$fila->login;
                        header("refresh:3;url=inicio.php");
                    
                    
                    } 
                else if ($nfilas==0)
                    {

                        echo "Nombre de usuario y/o contraseña incorrecto. Será redireccionado en 2 segundos";
                    }
                else
                    {
                        echo "Error fatal, contacte con el administrador";
                    }
           
           
         /*Escribir Resultados
                    while ($fila = $consulta->fetch()) {
                    echo $fila->nombre . '<br>';*/


        $conexion = null;

    ?>



<body>
</html>