<?php
    session_start();
    include "../BBDD/includes/funciones.php";
    $dni_usuario = $_SESSION['usuario'];
    $conexion=conectarBD();

    $sql="SELECT PREGUNTA.Enunciado as enunciado, PREGUNTA.idPregunta, responde.RESPUESTA_Valor_Respuesta as respuesta FROM responde, PREGUNTA WHERE responde.ALUMNO_USUARIO_DNI = \"$dni_usuario\" AND PREGUNTA.idPregunta=responde.PREGUNTA_idPregunta";

    $consulta = $conexion->prepare($sql);
    $consulta->execute();  

    $respuestas=$consulta->fetchAll();

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
          echo $respuestas[$i]->enunciado."<br>".$respuestas[$i]->respuesta;
          echo "";
          echo "<br><br><br>";
          
        }
      ?>
      </tbody>
    </table>
  </div> 
</body>
</html>