<?php
    session_start();
    include "../BBDD/includes/funciones.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../Estilos/Style.css"> -->
    <title>TEST</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
</head>
<body>
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
                $idPregunta=$fila->idPregunta;
                $enunciado=$fila->Enunciado; 
           

/*                 for ($i=1; $i < $nfilas +1; $i++) { 
                    echo "<br>".$idPregunta;
                    echo "<br>".$enunciado."<br>";
                    $fila = $consulta->fetch();
                    $idPregunta=$fila->idPregunta;
                    $enunciado=$fila->Enunciado; 
                }
    */
    
    if(isset($_POST['siguiente']))
        {
            $respuesta = $_POST['radio'];
            
            echo $_SESSION['usuario']." ". "iniciado <br>";
            $dni_usuario = $_SESSION['usuario'];

            //CARGAR PREGUNTA.
            $sql2 = "SELECT * FROM PREGUNTA WHERE idPregunta NOT IN (SELECT PREGUNTA_idPregunta FROM responde where ALUMNO_USUARIO_DNI = DNI)";
            echo $sql2;

            $consulta2 = $conexion->prepare($sql2);
            $consulta2->execute();


            echo "prueba";
            echo $idPregunta;
            echo "<br>".$enunciado;
            echo "<br>";
            echo "El usuario ".$_SESSION['nombre']." ha respondido ".$respuesta;
            $sql1="INSERT INTO responde VALUES (\"$idPregunta\",\"$dni_usuario\",\"$respuesta\")";
            //echo $sql1;
    
            $consulta1 = $conexion->prepare($sql1);
            $consulta1->execute();

            
             
         $conexion = null;
        }
        
       
    ?>

    <header>
        <div id="img_header0"></div>
        <div id="img_header1"></div>
        <div id="img_header2"></div>
        <div id="img_header3"></div>
        <div id="img_header4"></div>
        <div id="img_header5"></div>
        <div id="img_header6"></div>
        <div id="img_header7"></div>
        <div id="img_header8"></div>
    </header>

    <main class="alumnoMain">
        <h1>AQUI COMIENZA EL TEST</h1>
        <br><br>

        <form action="Test.php" name="form" method="post">
            <input type="hidden" name="idPregunta" value="idPregunta">
            <input type="radio" name="radio" value="VERDADERO" class="radio">
            <label for="verdadero"><strong><h3>VERDADERO</h3></strong></label>
            <input type="radio" name="radio" value="FALSO" class="radio">
            <label for="falso"><strong><h3>FALSO</h3></strong></label><br>
            <br><br>
            <input type="submit" name="siguiente" value="Siguiente" id="Siguiente" >
        </form>
    </main>

    <footer>
        <div id="img_footer0"></div>
        <div id="img_footer1"></div>
        <div id="img_footer2"></div>
        <div id="img_footer3"></div>
        <div id="img_footer4"></div>
        <div id="img_footer5"></div>
    </footer>

</body>
</html>