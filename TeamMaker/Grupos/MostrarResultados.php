<?php

    session_start();
    include "../BBDD/includes/funciones.php";
    
    $conexion=conectarBD();

    $dni = $_GET['dni'];
    $azul = 0;
    $rojo = 0;
    $verde = 0;
    $amarillo = 0;

    $sql="SELECT PREGUNTA.Enunciado, responde.RESPUESTA_Valor_Respuesta, ALUMNO.USUARIO_DNI, PREGUNTA.idPregunta from PREGUNTA, responde, ALUMNO 
    WHERE responde.ALUMNO_USUARIO_DNI=ALUMNO.USUARIO_DNI and \"".$dni."\" = ALUMNO.USUARIO_DNI and PREGUNTA.idPregunta=responde.PREGUNTA_idPregunta";
    
    $consulta=$conexion->prepare($sql);
    $consulta->execute();

    $respuestas=$consulta->fetchAll();

    $id=$respuestas->idPregunta;
    $pregunta=$respuestas->Enunciado;
    $usuario=$respuestas->USUARIO_DNI;
    $respuesta=$respuestas->RESPUESTA_Valor_Respuesta;
    

    for ($i=0; $i < count($respuestas); $i++) { 
        // echo $respuestas[$i]->Enunciado."-------".$respuestas[$i]->USUARIO_DNI."-------".$respuestas[$i]->RESPUESTA_Valor_Respuesta."<br>";

        if ($dni == $respuestas[$i]->USUARIO_DNI && ($respuestas[$i]->idPregunta > 0 && $respuestas[$i]->idPregunta < 21) && $respuestas[$i]->RESPUESTA_Valor_Respuesta == 'VERDADERO') {
            $azul += 1;
        }
    
        if ($dni == $respuestas[$i]->USUARIO_DNI && ($respuestas[$i]->idPregunta > 20 && $respuestas[$i]->idPregunta < 41) && $respuestas[$i]->RESPUESTA_Valor_Respuesta == 'VERDADERO') {
            $verde += 1;
        }
    
        if ($dni == $respuestas[$i]->USUARIO_DNI && ($respuestas[$i]->idPregunta > 40 && $respuestas[$i]->idPregunta < 61) && $respuestas[$i]->RESPUESTA_Valor_Respuesta == 'VERDADERO') {
            $rojo += 1;
        }
    
        if ($dni == $respuestas[$i]->USUARIO_DNI && ($respuestas[$i]->idPregunta > 60 && $respuestas[$i]->idPregunta < 81) && $respuestas[$i]->RESPUESTA_Valor_Respuesta == 'VERDADERO') {
            $amarillo += 1;
        }
    
    }

    echo "<br>Azul(Cientifico) = ".(($azul/20)*100)."%";
    echo "<br>Verde(Mediador) = ".(($verde/20)*100)."%";
    echo "<br>Rojo(Lider) = ".(($rojo/20)*100)."%";
    echo "<br>Amarillo(Creativo) = ".(($amarillo/20)*100)."%";
    

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../Funciones.js"></script>
    <title>Resultados alumno</title>
</head>
<body>
<input type='button' value='Volver' class='inputEditUsEnviar' onclick="redirigir('listarAlumno')">
</body>
</html>
