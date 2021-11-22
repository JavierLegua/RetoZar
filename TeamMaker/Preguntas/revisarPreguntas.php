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
          echo $respuestas[$i]->enunciado."<br>".$respuestas[$i]->respuesta. '<br>';
          if (($respuestas[$i]->respuesta)=="VERDADERO") {
            echo "<input type='radio' name='radio' value='VERDADERO' class='radio' required>";
            echo "<label for='verdadero'><strong><h3>VERDADERO</h3></strong></label>";
            echo "<input type='radio' name='radio' value='FALSO' class='radio' required>";
            echo "<label for='falso'><strong><h3>FALSO</h3></strong></label>";
          }elseif (($respuestas[$i]->respuesta)=="FALSO") {
            echo "<input type='radio' name='radio' value='VERDADERO' class='radio' required>";
            echo "<label for='verdadero'><strong><h3>VERDADERO</h3></strong></label>";
            echo "<input type='radio' name='radio' value='FALSO' class='radio' required>";
            echo "<label for='falso'><strong><h3>FALSO</h3></strong></label>";
          }
          
          
          echo "<br><br>";

          echo "<input type='submit' name='modificar' value='MODIFICAR' id='MODIFICAR'>";

          echo "<br><br><br><br>";
          
        }
      ?>
      </tbody>
    </table>
  </div> 
</body>
</html>