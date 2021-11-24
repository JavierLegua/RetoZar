<?php

    session_start();
    include "../BBDD/includes/funciones.php";
    
    $conexion=conectarBD();

    $curso = $_GET['curso'];
    // $dni = $_GET['dni'];
    $azul = 0;
    $rojo = 0;
    $verde = 0;
    $amarillo = 0;
    echo "curso : ".$curso;
    // echo "<br>dni : ".$dni;

    $sql1="SELECT * FROM ALUMNO WHERE ALUMNO.id_curso =\"".$curso."\"";
    echo "<br>".$sql1;
    $consulta1=$conexion1->prepare($sql1);
    $consulta1->execute();
    $respuestas1=$consulta1->fetchAll();

    for ($i=0; $i < count($respuestas1); $i++) {

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

        echo "<br>".count($respuestas);
        echo "<br>Usuario ".$dni;
        echo "-----Azul(Cientifico) = ".(($azul/20)*100)."%";
        echo "-----Verde(Mediador) = ".(($verde/20)*100)."%";
        echo "-----Rojo(Lider) = ".(($rojo/20)*100)."%";
        echo "-----Amarillo(Creativo) = ".(($amarillo/20)*100)."%";

    }

    // $sql="SELECT PREGUNTA.Enunciado, responde.RESPUESTA_Valor_Respuesta, ALUMNO.USUARIO_DNI, PREGUNTA.idPregunta, ALUMNO.id_curso from PREGUNTA, responde, ALUMNO 
    // WHERE responde.ALUMNO_USUARIO_DNI=ALUMNO.USUARIO_DNI and \"".$curso."\" = ALUMNO.id_curso and PREGUNTA.idPregunta=responde.PREGUNTA_idPregunta";
    
    

    // $id=$respuestas->idPregunta;
    // $pregunta=$respuestas->Enunciado;
    // $usuario=$respuestas->USUARIO_DNI;
    // $respuesta=$respuestas->RESPUESTA_Valor_Respuesta;
    // for ($i=0; $i < count($respuestas); $i++) { 
    //     // echo $respuestas[$i]->Enunciado."-------".$respuestas[$i]->USUARIO_DNI."-------".$respuestas[$i]->RESPUESTA_Valor_Respuesta."<br>";
    
    //     if ($dni == $respuestas[$i]->USUARIO_DNI && ($respuestas[$i]->idPregunta > 0 && $respuestas[$i]->idPregunta < 21) && $respuestas[$i]->RESPUESTA_Valor_Respuesta == 'VERDADERO') {
    //         $azul += 1;
    //     }
        
    //     if ($dni == $respuestas[$i]->USUARIO_DNI && ($respuestas[$i]->idPregunta > 20 && $respuestas[$i]->idPregunta < 41) && $respuestas[$i]->RESPUESTA_Valor_Respuesta == 'VERDADERO') {
    //          $verde += 1;
    //     }
        
    //     if ($dni == $respuestas[$i]->USUARIO_DNI && ($respuestas[$i]->idPregunta > 40 && $respuestas[$i]->idPregunta < 61) && $respuestas[$i]->RESPUESTA_Valor_Respuesta == 'VERDADERO') {
    //         $rojo += 1;
    //     }
        
    //     if ($dni == $respuestas[$i]->USUARIO_DNI && ($respuestas[$i]->idPregunta > 60 && $respuestas[$i]->idPregunta < 81) && $respuestas[$i]->RESPUESTA_Valor_Respuesta == 'VERDADERO') {
    //         $amarillo += 1;
    //     }
        
    // }  

?>