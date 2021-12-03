<?php

    session_start();
    include "../BBDD/includes/funciones.php";
  
    $conexion=conectarBD();
    $curso = $_POST['curso'];
    $rol=$_SESSION['rol'] ;
    $azul = 0;
    $rojo = 0;
    $verde = 0;
    $amarillo = 0;
    $colorPrincipal="";
    $colorPrincipalRojo=0;
    $colorPrincipalVerde=0;
    $colorPrincipalAzul=0;
    $colorPrincipalAmarillo=0;
    $arrayRojo = [];
    $numGrupos = $_POST['numGrupos'];



    echo $curso."-----------------".$numGrupos."<br>";
    $sql1="SELECT ALUMNO.USUARIO_DNI as dni FROM ALUMNO WHERE ALUMNO.id_curso =\"".$curso."\"";
    $consulta1=$conexion->prepare($sql1);
    $consulta1->execute();
    $respuestas1=$consulta1->fetchAll();

    $numPersonas = calcularPersonas(count($respuestas1),$numGrupos);
    echo "<br>Personas por grupo : ".$numPersonas;

    for ($i=0; $i < count($respuestas1); $i++) {

        $sql="SELECT PREGUNTA.Enunciado, responde.RESPUESTA_Valor_Respuesta, ALUMNO.USUARIO_DNI, PREGUNTA.idPregunta from PREGUNTA, responde, ALUMNO 
        WHERE responde.ALUMNO_USUARIO_DNI=ALUMNO.USUARIO_DNI and \"".$respuestas1[$i]->dni."\" = ALUMNO.USUARIO_DNI and PREGUNTA.idPregunta=responde.PREGUNTA_idPregunta";
        $consulta=$conexion->prepare($sql);
        $consulta->execute();

        $respuestas=$consulta->fetchAll();

        $id=$respuestas->idPregunta;
        $pregunta=$respuestas->Enunciado;
        $usuario=$respuestas->USUARIO_DNI;
        $respuesta=$respuestas->RESPUESTA_Valor_Respuesta;


        for ($j=0; $j < count($respuestas); $j++) { 
            // echo $respuestas[$i]->Enunciado."-------".$respuestas[$i]->USUARIO_DNI."-------".$respuestas[$i]->RESPUESTA_Valor_Respuesta."<br>";

            if ($respuestas1[$i]->dni == $respuestas[$j]->USUARIO_DNI && ($respuestas[$j]->idPregunta > 0 && $respuestas[$j]->idPregunta < 21) && $respuestas[$j]->RESPUESTA_Valor_Respuesta == 'VERDADERO') {
                $azul += 1;
            }
        
            if ($respuestas1[$i]->dni == $respuestas[$j]->USUARIO_DNI && ($respuestas[$j]->idPregunta > 20 && $respuestas[$j]->idPregunta < 41) && $respuestas[$j]->RESPUESTA_Valor_Respuesta == 'VERDADERO') { 
                $verde += 1;
            }
        
            if ($respuestas1[$i]->dni == $respuestas[$j]->USUARIO_DNI && ($respuestas[$j]->idPregunta > 40 && $respuestas[$j]->idPregunta < 61) && $respuestas[$j]->RESPUESTA_Valor_Respuesta == 'VERDADERO') {
                $rojo += 1;
            }
            
            if ($respuestas1[$i]->dni == $respuestas[$j]->USUARIO_DNI && ($respuestas[$j]->idPregunta > 60 && $respuestas[$j]->idPregunta < 81) && $respuestas[$j]->RESPUESTA_Valor_Respuesta == 'VERDADERO') {
                $amarillo += 1;
            }
        
        }

        if ($rojo > $azul && $rojo > $verde && $rojo > $amarillo) {
            $colorPrincipal = "rojo";
            $colorPrincipalRojo++;
        }elseif ($azul > $rojo && $azul > $verde && $azul > $amarillo) {
            $colorPrincipal = "azul";
            $colorPrincipalAzul++;
        }elseif ($verde > $rojo && $verde > $azul && $verde > $amarillo) {
            $colorPrincipal = "verde";
            $colorPrincipalVerde++;
        }else {
            $colorPrincipal = "amarillo"; 
            $colorPrincipalAmarillo++;
        }

        $colores["rojo"][] = $respuestas1[$i]->dni;
        $colores["azul"][] = $respuestas1[$i]->dni;
        $colores["verde"][] = $respuestas1[$i]->dni;
        $colores["amarillo"][] = $respuestas1[$i]->dni;

        echo "<br>Usuario ".$respuestas1[$i]->dni;
        echo "-----Azul(Cientifico) = ".$azul."/20";
        echo "-----Verde(Mediador) = ".$verde."/20";
        echo "-----Rojo(Lider) = ".$rojo."/20";
        echo "-----Amarillo(Creativo) = ".$amarillo."/20";

    }
    

    /*El rol principal a la hora de crear grupos seria el rojo*/
    rsort($colores["rojo"]);
    shuffle($colores["azul"]);
    shuffle($colores["verde"]);
    shuffle($colores["amarillo"]);

    /* print_r($colores["rojo"]); */

    $arrayAlumnos = array_merge($colores["rojo"],$colores["azul"],$colores["verde"],$colores["amarillo"]);

    print_r($arrayAlumnos);

    /*Definimos la matriz de grupos*/
        $grupo = []; 

     for ($i=0; $i < $numGrupos; $i++) { 
        $grupo[$i] = [];
        $grupo[$i][0] = "grupo ".($i + 1);
        $grupo[$i][1] = [];
    } 

    echo "<br><br>";

    $cont=0;

    /* echo count($arrayAlumnos)."<br>"; */

    for ($i = 0; $i < count($arrayAlumnos); $i++) { 
        array_push($grupo[$cont][1], $arrayAlumnos[$i]); 
        /* print_r ($cont."-------".$i."<br>"); */
        if ($cont==$numPersonas-1) {
            $cont=0;
        }else{
            $cont++;
        }
        unset($arrayAlumnos[$i]);
        
    }

    print_r($grupo);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos</title>
</head>
<body>
    <br><br><br><input type='button' value='Volver' class='inputEditUsEnviar' onclick="redirigir('profesores')">
</body>
</html>