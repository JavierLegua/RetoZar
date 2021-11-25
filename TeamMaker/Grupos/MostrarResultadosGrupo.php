<?php

    session_start();
    include "../BBDD/includes/funciones.php";
    
    $conexion=conectarBD();

    $curso = $_GET['curso'];
    $azul = 0;
    $rojo = 0;
    $verde = 0;
    $amarillo = 0;

    echo"curso : ".$curso;
    $sql1="SELECT ALUMNO.USUARIO_DNI as dni FROM ALUMNO WHERE ALUMNO.id_curso =\"".$curso."\"";
    echo"<br>".$sql1;
    $consulta1=$conexion->prepare($sql1);
    $consulta1->execute();
    $respuestas1=$consulta1->fetchAll();

    print_r($respuestas1);
    for ($i=0; $i < count($respuestas1); $i++) {

        $sql="SELECT PREGUNTA.Enunciado, responde.RESPUESTA_Valor_Respuesta, ALUMNO.USUARIO_DNI, PREGUNTA.idPregunta from PREGUNTA, responde, ALUMNO 
        WHERE responde.ALUMNO_USUARIO_DNI=ALUMNO.USUARIO_DNI and \"".$respuestas1[$i]->dni."\" = ALUMNO.USUARIO_DNI and PREGUNTA.idPregunta=responde.PREGUNTA_idPregunta";
        echo"<br>".$sql;
        $consulta=$conexion->prepare($sql);
        $consulta->execute();

        $respuestas=$consulta->fetchAll();

        $id=$respuestas->idPregunta;
        $pregunta=$respuestas->Enunciado;
        $usuario=$respuestas->USUARIO_DNI;
        $respuesta=$respuestas->RESPUESTA_Valor_Respuesta;

        for ($i=0; $i < count($respuestas); $i++) { 
            // echo $respuestas[$i]->Enunciado."-------".$respuestas[$i]->USUARIO_DNI."-------".$respuestas[$i]->RESPUESTA_Valor_Respuesta."<br>";

            if ($dni[$i] == $respuestas[$i]->USUARIO_DNI && ($respuestas[$i]->idPregunta > 0 && $respuestas[$i]->idPregunta < 21) && $respuestas[$i]->RESPUESTA_Valor_Respuesta == 'VERDADERO') {
                $azul += 1;
            }
    
            if ($dni[$i] == $respuestas[$i]->USUARIO_DNI && ($respuestas[$i]->idPregunta > 20 && $respuestas[$i]->idPregunta < 41) && $respuestas[$i]->RESPUESTA_Valor_Respuesta == 'VERDADERO') { 
                $verde += 1;
            }
    
            if ($dni[$i] == $respuestas[$i]->USUARIO_DNI && ($respuestas[$i]->idPregunta > 40 && $respuestas[$i]->idPregunta < 61) && $respuestas[$i]->RESPUESTA_Valor_Respuesta == 'VERDADERO') {
                $rojo += 1;
            }
        
            if ($dni[$i] == $respuestas[$i]->USUARIO_DNI && ($respuestas[$i]->idPregunta > 60 && $respuestas[$i]->idPregunta < 81) && $respuestas[$i]->RESPUESTA_Valor_Respuesta == 'VERDADERO') {
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