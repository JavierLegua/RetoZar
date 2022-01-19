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
    <link rel="icon" type="image/x-icon" href="../Estilos/Logo.png">
</head>
<body>
<div class="listTodo">
    <table class="table" id="tableProfesor">
      <tbody>
      <?php

      echo "<strong><h2>Estas son las respuestas de ". $_SESSION['nombre']. ".</h2></strong>";
      echo "<br>";
        for ($i=0; $i < count($respuestas); $i++) {   
            echo "<tr><td>".$respuestas[$i]->enunciado."</td><td>".$respuestas[$i]->respuesta."</td></tr>";
        }
      ?>
      </tbody>
    </table>
  </div> 
</body>
</html>