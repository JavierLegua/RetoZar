<?php
    session_start();
    include "../BBDD/includes/funciones.php";
    $dni_usuario = $_SESSION['usuario'];
    $conexion=conectarBD();

    $sql="SELECT PREGUNTA.Enunciado as enunciado, PREGUNTA.idPregunta, responde.RESPUESTA_Valor_Respuesta as respuesta FROM responde, PREGUNTA WHERE responde.ALUMNO_USUARIO_DNI = \"$dni_usuario\" AND PREGUNTA.idPregunta=responde.PREGUNTA_idPregunta";

    $consulta = $conexion->prepare($sql);
    $consulta->execute();  

    $respuestas=$consulta->fetchAll();


    if (isset($_POST['modificar'])) {

      /*
    $sql1="UPDATE responde SET RESPUESTA_Valor_Respuesta = 'VERDADERO' WHERE 
    responde.PREGUNTA_idPregunta = 1 AND responde.ALUMNO_USUARIO_DNI = '21746379V' AND responde.RESPUESTA_Valor_Respuesta = 'FALSO'";
*/
    }
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Revisar respuestas</title>
</head>
<body>
<div class="listTodo">
    <table class="table" id="tableProfesor">
      <tbody>
      <?php
        for ($i=0; $i < count($respuestas); $i++) {   
          echo $respuestas[$i]->enunciado."<br>"/*.$respuestas[$i]->respuesta. '<br>'*/;
          
          echo "<form action='revisarPreguntas.php' name='form' method='post'>";

          if (($respuestas[$i]->respuesta)=="VERDADERO") {

            echo "<input type='radio' name='radio' value='VERDADERO' checked><label for='verdadero'><strong>VERDADERO</strong></label><br>";
            echo "<input type='radio' name='radio' value='FALSO' ><label for='falso'><strong>FALSO</strong></label>";
          }elseif (($respuestas[$i]->respuesta)=="FALSO") {

            echo "<input type='radio' name='radio' value='VERDADERO' ><label for='verdadero'><strong>VERDADERO</strong></label><br>";
            echo "<input type='radio' name='radio' value='FALSO' checked><label for='falso'><strong>FALSO</strong></label>";
          }
          
          
          echo "<br><br>";

          echo "<input type='submit' name='modificar' value='MODIFICAR' id='MODIFICAR'>";

          echo "<br><br><br><br>";
          
          echo "</form>";
        }
      ?>
      </tbody>
    </table>
  </div> 
</body>
</html>