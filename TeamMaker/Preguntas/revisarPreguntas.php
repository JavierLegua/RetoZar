<?php
    session_start();
    include "../BBDD/includes/funciones.php";
    $dni_usuario = $_SESSION['usuario'];
    $conexion=conectarBD();

    if (isset($_POST['modificar'])) {

      $nuevaRespuesta=$_POST['radio'];
      $idPregunta=$_POST['idPregunta'];
      
      
      $sql1="UPDATE responde SET RESPUESTA_Valor_Respuesta = '$nuevaRespuesta' WHERE responde.PREGUNTA_idPregunta = '$idPregunta' AND responde.ALUMNO_USUARIO_DNI = '$dni_usuario'";

      $consulta1 = $conexion->prepare($sql1);
      $consulta1->execute();  

    }

    $sql="SELECT PREGUNTA.Definicion as definicion, PREGUNTA.Enunciado as enunciado, PREGUNTA.idPregunta, responde.RESPUESTA_Valor_Respuesta as respuesta FROM responde, PREGUNTA WHERE responde.ALUMNO_USUARIO_DNI = \"$dni_usuario\" AND PREGUNTA.idPregunta=responde.PREGUNTA_idPregunta";

    $consulta = $conexion->prepare($sql);
    $consulta->execute();  

    $respuestas=$consulta->fetchAll();

    // contar numero de filas
    $nfilas=$consulta->rowCount();

    

    ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Revisar respuestas</title>
    <link rel="stylesheet" href="../Estilos/Style.css">
    <link rel="icon" type="image/x-icon" href="../Estilos/Logo.png">
</head>
<body class='listarBody'>
  <header class="listarHeader">
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
<div class="listTodo">
    <?php
        if ($nfilas==0) {
          echo "<h1>Primero debes contestar a las preguntas</h1><br>";
          echo "<input type='button' value='Volver' class='inputEditUsEnviar' onclick='redirigir(\"alumno\")'>";
        }else{
          echo "<h2>MODIFICA TUS RESPUESTAS</h2>";
          for ($i=0; $i < count($respuestas); $i++) {   

            

            echo '<h4 title="' .$respuestas[$i]->definicion.'">'.$respuestas[$i]->idPregunta. '-'. $respuestas[$i]->enunciado.'</h4>'. '<br>';

            $id=$respuestas[$i]->idPregunta;
            
            echo "<form id='formRev' action='revisarRespuesta' name='form' method='post'>";
            echo "<input type='hidden' name='idPregunta' value='$id'>";
            if (($respuestas[$i]->respuesta)=="VERDADERO") {
              echo "<input type='radio' class='radioRev' name='radio' value='VERDADERO' checked><label for='verdadero' class='labels'><strong>VERDADERO</strong></label><br>";
              echo "<input type='radio' class='radioRev'< t name='radio' value='FALSO' ><label for='falso' class='labels'><strong>FALSO</strong></label>";
            }elseif (($respuestas[$i]->respuesta)=="FALSO") {

              echo "<input type='radio' class='radioRev' name='radio' value='VERDADERO' ><label for='verdadero' class='labels'><strong>VERDADERO</strong></label><br>";
              echo "<input type='radio' class='radioRev' name='radio' value='FALSO' checked><label for='falso' class='labels'><strong>FALSO</strong></label>";
            }
            
            
            echo "<br><br>";

            echo "<input type='submit' class='ModificarRev' name='modificar' value='MODIFICAR' id='MODIFICAREV'><br>";
            echo "<input class='inputEditUsRev' type='button' value='Volver' id='inputEditUsRev' onclick='redirigir(\"alumno\")'>";
            
            echo "</form>";
          }
        }
      ?>
  </div> 
  <footer class="listFoot">
    <div id="img_footer0"></div>
    <div id="img_footer1"></div>
    <div id="img_footer2"></div>
    <div id="img_footer3"></div>
    <div id="img_footer4"></div>
    <div id="img_footer5"></div>
  </footer> 
</body>
</html>