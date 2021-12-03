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
</head>
<body>
<div class="listTodo">
    <table class="table" id="tableProfesor">
      <tbody>
      <?php
       
        if ($nfilas==0) {
          echo "<h1>Primero debes contestar a las preguntas</h1><br>";
          echo "<input type='button' value='Volver' class='inputEditUsEnviar' onclick='redirigir(\"alumno\")'>";
        }else{
        for ($i=0; $i < count($respuestas); $i++) {   

          echo "<h1>MODIFICA TUS RESPUESTAS</h1>";

          echo '<h4 title="' .$respuestas[$i]->definicion.'">'.$respuestas[$i]->idPregunta. '-'. $respuestas[$i]->enunciado.'</h4>'. '<br>';

          $id=$respuestas[$i]->idPregunta;
          
          echo "<form action='revisarRespuesta' name='form' method='post'>";
          echo "<input type='hidden' name='idPregunta' value='$id'>";
          if (($respuestas[$i]->respuesta)=="VERDADERO") {
            echo "<input type='radio' name='radio' value='VERDADERO' checked><label for='verdadero'><strong>VERDADERO</strong></label><br>";
            echo "<input type='radio' name='radio' value='FALSO' ><label for='falso'><strong>FALSO</strong></label>";
          }elseif (($respuestas[$i]->respuesta)=="FALSO") {

            echo "<input type='radio' name='radio' value='VERDADERO' ><label for='verdadero'><strong>VERDADERO</strong></label><br>";
            echo "<input type='radio' name='radio' value='FALSO' checked><label for='falso'><strong>FALSO</strong></label>";
          }
          
          
          echo "<br><br>";

          echo "<input type='submit' name='modificar' value='MODIFICAR' id='MODIFICAR'><br>";
          echo "<input type='button' value='Volver' class='inputEditUsEnviar' onclick='redirigir(\"alumno\")'>";

          echo "<br><br><br><br>";
          
          echo "</form>";
        }
        }
      ?>
      </tbody>
    </table>
  </div> 
</body>
</html>