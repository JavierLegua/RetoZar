<?php
    session_start();
    include "../BBDD/includes/funciones.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/Style.css">
    <title>Editar alumnos</title>
    <script src="../../Funciones.js"></script>
</head>
<body class="listarBody">
  <header class="listarHeader">
    <div id="img_header0"></div>
    <div id="img_header1"></div>
    <div id="img_header2"></div>
    <div id="img_header3"></div>
    <div id="img_header4"></div>
    <div id="img_header5"></div>
    <div id="img_header6"></div>
    <div id="img_header7"></div>
    <div id="img_header8"></div>
  </header>
  <main>
    <?php
        $conexion=conectarBD();
        
        $curso = $_GET['curso'];
        $rol=$_SESSION['rol'] ;
        $azul = 0;
        $rojo = 0;
        $verde = 0;
        $amarillo = 0;

        switch ($rol) {
            
            case 'SuperAdmin':
                echo"<div class='crear_menu'>".crear_menu($rol)."</div>";    
            break;
            
            case 'Admin':
                echo"<div class='crear_menu'>".crear_menu($rol)."</div>";
            break;
    
            case 'Profesor':
                echo"<div class='crear_menu'>".crear_menu($rol)."</div>";
            break;
        }

        $sql1="SELECT ALUMNO.USUARIO_DNI as dni FROM ALUMNO WHERE ALUMNO.id_curso =\"".$curso."\"";
        $consulta1=$conexion->prepare($sql1);
        $consulta1->execute();
        $respuestas1=$consulta1->fetchAll();

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

            echo "<br>Usuario ".$respuestas1[$i]->dni;
            echo "-----Azul(Cientifico) = ".(($azul/20)*100)."%";
            echo "-----Verde(Mediador) = ".(($verde/20)*100)."%";
            echo "-----Rojo(Lider) = ".(($rojo/20)*100)."%";
            echo "-----Amarillo(Creativo) = ".(($amarillo/20)*100)."%";

        }
        
            
        ?>
  </main>
  <footer class="listFoot">
    <div id="img_footer0"></div>
    <div id="img_footer1"></div>
    <div id="img_footer2"></div>
    <div id="img_footer3"></div>
    <div id="img_footer4"></div>
    <div id="img_footer5"></div>
  </footer>
</body>
</html>

