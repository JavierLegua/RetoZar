<?php
session_start();
?>

<html>

<head>
<?php
   
   include "../ConexionBBDD/includes/funciones.php";

?>

</head>

<body>
    <h4> PRUEBA CONEXIÓN BASE DE DATOS</H4>

    <?php


        $conexion=conectarBD();
        

           //Escribir Consulta
                $sql="SELECT * FROM PREGUNTA"; 
                //echo "<br>".$sql."<br>"; 

           // Ejecutar consulta
        
                $consulta = $conexion->prepare($sql);
                $consulta->execute();

            // contar numero de filas
                $nfilas=$consulta->rowCount();

                $fila = $consulta->fetch();
                $_SESSION['idPregunta']=$fila->idPregunta;
                $_SESSION['enunciado']=$fila->Enunciado;
                $idPregunta = $_SESSION['idPregunta'];
                $enunciado = $_SESSION['enunciado'];
            
                echo "<br>$idPregunta";
                echo "<br>$enunciado";

               /*  header("refresh:2;url=../Preguntas/Test.php");
                echo "</br>Redireccionando al Test en 2 segundos";
                die(); */

                
            
                for ($i=1; $i < $nfilas + 1  ; $i++) { 
                    echo "<br>$idPregunta";
                }
                /*
                    {
                        $fila = $consulta->fetch();   
                        $_SESSION['usuario']=$fila->DNI;
                        $usuario=$_SESSION['usuario'];

                        $sql="SELECT * from USUARIO,PROFESOR WHERE USUARIO.DNI=\"$usuario\" and USUARIO.DNI = PROFESOR.USUARIO_DNI";
                        // Ejecutar consulta
        
                        $consulta = $conexion->prepare($sql);
                        $consulta->execute();
                        // contar numero de filas
                        $nfilas=$consulta->rowCount();
                        if($nfilas==1){
                            $sql="SELECT * from USUARIO WHERE USUARIO.DNI=\"$usuario\"";
                            $consulta = $conexion->prepare($sql);
                            $consulta->execute();
                            $fila = $consulta->fetch();  
                            $_SESSION['nombre']=$fila->Nombre;

                            $sql="SELECT Rol from USUARIO,PROFESOR WHERE USUARIO.DNI=\"$usuario\" and USUARIO.DNI = PROFESOR.USUARIO_DNI";
                            $consulta = $conexion->prepare($sql);
                            $consulta->execute();
                            $fila = $consulta->fetch();  
                            $_SESSION['rol']=$fila->Rol;

                            if($_SESSION['rol']=='Profesor'){
                                header("refresh:0;url=../PaginasUsuario/Profesor.php");
                            }else if($_SESSION['rol']=='SuperAdmin'){
                                header("refresh:0;url=../PaginasUsuario/Admin_top.php");
                            }else{
                                header("refresh:0;url=../PaginasUsuario/Admin.php");
                            }

                        }else{
                            $sql="SELECT * from USUARIO WHERE USUARIO.DNI=\"$usuario\"";
                            $consulta = $conexion->prepare($sql);
                            $consulta->execute();
                            $fila = $consulta->fetch();  
                            $_SESSION['nombre']=$fila->Nombre;
                            header("refresh:0;url=../PaginasUsuario/Alumno.php");
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
           
           */
         /*Escribir Resultados
                    while ($fila = $consulta->fetch()) {
                    echo $fila->nombre . '<br>';*/


        $conexion = null;

    ?>



<body>
</html>