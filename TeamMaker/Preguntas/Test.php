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
    <script src="../Funciones.js"></script>
</head>
<body>
    <?php
        $conexion=conectarBD();

        $dni_usuario = $_SESSION['usuario'];

        $cont = "SELECT count(PREGUNTA_idPregunta) FROM responde";
        if(isset($_POST['siguiente'])){
      
            $respuesta = $_POST['radio'];
            $idPreguntaAnterior = $_POST['idPregunta'];
            //echo "<br>--".$respuesta."--<br>";

            $sql1="INSERT INTO responde VALUES (\"$idPreguntaAnterior\",\"$dni_usuario\",\"$respuesta\")";
            //echo $sql1;

            $consulta1 = $conexion->prepare($sql1);
            $consulta1->execute();  
            
            $cont --;
        }

          //Escribir Consulta
          $sql="SELECT * FROM PREGUNTA WHERE idPregunta NOT IN (SELECT PREGUNTA_idPregunta FROM responde where ALUMNO_USUARIO_DNI = \"$dni_usuario\") ORDER BY rand()"; 
          //echo "<br>".$sql."<br>"; 

          // Ejecutar consulta
  
          $consulta = $conexion->prepare($sql);
          $consulta->execute();

          // contar numero de filas
          $nfilas=$consulta->rowCount();

          $fila = $consulta->fetch();
          $idPregunta=$fila->idPregunta;
          $enunciado=$fila->Enunciado;     
             
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
        <h1> <?php if ($enunciado == "") {
            echo "TEST FINALIZADO, GRACIAS POR COMPLETARLO<br><br>";
            header("refresh:2;url=revisarPreguntas.php");
          }else{
            echo "RESPONDE A LA PREGUNTA ";
            echo "<br>Te quedan ".$nfilas." preguntas";
          }?>  </h1>
        <br><br>

        <?php echo $enunciado; ?>

        <br><br>

        <form action="Test.php" name="form" method="post">
            <input type="hidden" name="idPregunta" value="<?php echo $idPregunta; ?>">
            <input type="radio" name="radio" value="VERDADERO" class="radio" required>
            <label for="verdadero"><strong><h3>VERDADERO</h3></strong></label>
            <input type="radio" name="radio" value="FALSO" class="radio" required>
            <label for="falso"><strong><h3>FALSO</h3></strong></label><br>
            <br><br>
            <input type="submit" name="siguiente" value="Siguiente" id="Siguiente" >
            <br><br>
        </form>

        <button class="Salir" onclick="redirigir('../PaginasUsuario/Alumno.php')" >Salir del Test</button>
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