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
                header("refresh:3;url=../Login/Login.php");
                echo "Redireccionando en 3 segundos";
                die();
            }


        $conexion=conectarBD();

           $usuario=$_POST['DNI'];
           $clave=$_POST['clave'];
           
           //Escribir Consulta
                $sql="SELECT * FROM USUARIO WHERE DNI=\"$usuario\" and Clave =\"$clave\""; 
                //echo "<br>".$sql."<br>"; 

           // Ejecutar consulta
        
                $consulta = $conexion->prepare($sql);
                $consulta->execute();

            // contar numero de filas
                $nfilas=$consulta->rowCount();
            
            // verificar el LOGIN
                if($nfilas==1)
                    {
                        $fila = $consulta->fetch();   
                        $_SESSION['usuario']=$fila->DNI;

                        $sql="SELECT * from USUARIO,PROFESOR WHERE USUARIO.DNI=\"$usuario\" and USUARIO.DNI = PROFESOR.USUARIO_DNI";
                        // Ejecutar consulta
        
                        $consulta = $conexion->prepare($sql);
                        $consulta->execute();
                        // contar numero de filas
                        $nfilas=$consulta->rowCount();
                        if($nfilas==1){
                            
                            echo "1 fila";
                        }else{
                            $sql="SELECT * from USUARIO WHERE USUARIO.DNI=\"$usuario\"";
                            $consulta = $conexion->prepare($sql);
                            $consulta->execute();
                            $fila = $consulta->fetch();  
                            $_SESSION['nombre']=$fila->Nombre;
                            header("refresh:0;url=../Paginas usuario/Alumno.php");
                        }
                    



                    
                    } 
                else if ($nfilas==0)
                    {

                        echo "Nombre de usuario y/o contraseña incorrecto. Será redireccionado en 2 segundos";
                        header("refresh:2;url=../Login/Login.php");
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