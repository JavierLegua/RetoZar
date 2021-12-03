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
    $numPersonas = $_POST['numPersonas'];



    echo $curso."-----------------".$numPersonas."<br>";
    $sql1="SELECT ALUMNO.USUARIO_DNI as dni FROM ALUMNO WHERE ALUMNO.id_curso =\"".$curso."\"";
    $consulta1=$conexion->prepare($sql1);
    $consulta1->execute();
    $respuestas1=$consulta1->fetchAll();

    $numGrupos = calcularGrupos(count($respuestas1),$numPersonas);
    echo "<br>Grupos : ".$numGrupos;

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

        $colores["rojo"][] = $rojo;
        $colores["azul"][] = $azul;
        $colores["verde"][] = $verde;
        $colores["amarillo"][] = $amarillo;

        echo "<br>Usuario ".$respuestas1[$i]->dni;
        echo "-----Azul(Cientifico) = ".$azul."/20";
        echo "-----Verde(Mediador) = ".$verde."/20";
        echo "-----Rojo(Lider) = ".$rojo."/20";
        echo "-----Amarillo(Creativo) = ".$amarillo."/20";

    }

    rsort($colores["rojo"]);
    shuffle($colores["azul"]);
    shuffle($colores["verde"]);
    shuffle($colores["amarillo"]);


    echo "<br><br>";

    for ($i = 0; $i < $numGrupos; $i++) { 
        $grupo[$i]= "grupo ".($i + 1);
        echo "<br>".$grupo[$i]." Liderazgo : ".$colores["rojo"][$i]."/20"." Cientifico : ".$colores["azul"][$i]."/20"." Mediador : ".$colores["verde"][$i]."/20"." Creativo : ".$colores["amarillo"][$i]."/20";
        $colores["rojo"][$i]=null;
        $colores["azul"][$i]=null;
        $colores["verde"][$i]=null;
        $colores["amarillo"][$i]=null;
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos</title>
</head>
<body>
    <br><input type='button' value='Volver' class='inputEditUsEnviar' onclick="redirigir('profesores')">
</body>
</html>