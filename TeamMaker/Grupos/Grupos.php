
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/Style.css">
    <link rel="icon" type="image/x-icon" href="../Estilos/Logo.png">
    <script src="../Funciones.js"></script>
    <title>Equipos</title>
</head>
<body class="listarBody">
    <header class="TeamHeader">
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



            echo "Equipos generados sobre el curso : ".$curso."<br>";
            $sql1="SELECT ALUMNO.USUARIO_DNI as dni, USUARIO.NOMBRE as nombre FROM ALUMNO, USUARIO WHERE ALUMNO.id_curso =\"".$curso."\" AND ALUMNO.USUARIO_DNI = USUARIO.DNI";
            $consulta1=$conexion->prepare($sql1);
            $consulta1->execute();
            $respuestas1=$consulta1->fetchAll();
            $nombre=$respuestas1->nombre;
            $dni=$respuestas1->dni;
            /*
            for ($i=0; $i < count($respuestas1); $i++) { 
                echo "<br>".$respuestas1[$i]->nombre; 
            }
            */
            
            $numPersonas = calcularPersonas(count($respuestas1),$numGrupos);
            //echo "<br>Personas por grupo : ".$numPersonas;

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
                    $colorPrincipal = "red";
                    $colorPrincipalRojo++;
                }elseif ($azul > $rojo && $azul > $verde && $azul > $amarillo) {
                    $colorPrincipal = "blue";
                    $colorPrincipalAzul++;
                }elseif ($verde > $rojo && $verde > $azul && $verde > $amarillo) {
                    $colorPrincipal = "green";
                    $colorPrincipalVerde++;
                }else {
                    $colorPrincipal = "yellow"; 
                    $colorPrincipalAmarillo++;
                }

                $colores["rojo"][] = [$respuestas1[$i]->nombre, $respuestas1[$i]->dni] ;
                $colores["azul"][] = [$respuestas1[$i]->nombre, $respuestas1[$i]->dni];
                $colores["verde"][] = [$respuestas1[$i]->nombre, $respuestas1[$i]->dni];
                $colores["amarillo"][] = [$respuestas1[$i]->nombre, $respuestas1[$i]->dni];


                //echo "<br>Usuario ".$respuestas1[$i]->dni;
                //echo "-----Azul(Cientifico) = ".$azul."/20";
                //echo "-----Verde(Mediador) = ".$verde."/20";
                //echo "-----Rojo(Lider) = ".$rojo."/20";
                //echo "-----Amarillo(Creativo) = ".$amarillo."/20";

            }


            /*El rol principal a la hora de crear grupos seria el rojo*/
            rsort($colores["rojo"]);
            shuffle($colores["azul"]);
            shuffle($colores["verde"]);
            shuffle($colores["amarillo"]);

            /* print_r($colores["rojo"]); */

            // $arrayAlumnos = array_merge($colores["rojo"],$colores["azul"],$colores["verde"],$colores["amarillo"]);
            /*Definimos la matriz de grupos*/
            $grupo = [];

            $newGroup = shouldCreateGroup((count($respuestas1) % $numGrupos), $numPersonas);

            if ($newGroup) {
                $numGrupos++;
            }

            for ($i=0; $i < $numGrupos; $i++) {
                $grupo[$i] = [];
                $grupo[$i][0] = "Grupo".($i + 1);
                $grupo[$i][1][] = $colores["rojo"][0];

                array_shift($colores["rojo"]);
            }

            shuffle($colores["rojo"]);
            $arrayAlumnos = $colores["rojo"]; 

            //echo "<br>Numero personas: $numPersonas<br>";

            for ($i = 0; $i < $numGrupos; $i++) {
                for ($j = count($grupo[$i][1]); $j < $numPersonas && count($arrayAlumnos) > 0; $j++) {
                    // Array push y el statement de abajo son lo mismo
                    array_push($grupo[$i][1], $arrayAlumnos[0]);
                    // $grupo[$i][1][] = $arrayAlumnos[0];
                    array_shift($arrayAlumnos);
                }
            }

            if (!$newGroup && count($respuestas1) % $numGrupos > 0) {
                for ($i = 0; $i < count($arrayAlumnos); $i++) {
                    $grupo[$i % count($grupo)][1][] = $arrayAlumnos[$i];

                    // con tres grupos
                    // primer alumno => primer grupo (0 % 3 = 0)
                    // segundo alumno => segundo grupo (1 % 3 = 1)
                    // tercer alumno => tercer grupo (2 % 3 = 2)
                    // cuarto alumno => primer grupo (3 % 3 = 0)
                    // y asi sucesivamente...
                }
            }

            echo "<br>";
      
            foreach ($grupo as $g) {
                echo "<br><div class='divGrupo' id='$g[0]' ondragover='allowDrop(event)'><strong>$g[0]</strong>";
                /* echo $dni=$respuestas1->dni."<br>"; */
                foreach ($g[1] as $alumno) {
                    //var_dump($alumno);
                    echo "<div class='divAlumno' id='$alumno[1]' draggable='true' ondragstart='drag(event)'>".$alumno[0]."</div>";
                }
                echo "</div>"; 
            }

            echo "<br><br>";

            // for ($i = 0; $i < count($arrayAlumnos); $i++) { 
            //     // $grupo[$cont][1][] = $arrayAlumnos[$i]; // Esto hace lo mismo que array push
            //     array_push($grupo[$cont][1], $arrayAlumnos[$i]); 
            //     /* print_r ($cont."-------".$i."<br>"); */
            //     if ($cont==$numPersonas-1) {
            //         $cont=0;
            //     } else {
            //         $cont++;
            //     }
            //     unset($arrayAlumnos[$i]);
                
            // }

            //print_r($grupo);

            

        ?>
        <form action="insertarGrupos" method="post" id="formGrupos">
            <input type="hidden" name="curso" value="<?php echo $curso ?>">
            <input type="hidden" name="grupos" id="arrayGrupos">
            <br><input id="confirmarTeam" type='submit' value='Confirmar equipos' class='TeamButton'>
        </form>
        <br><br><br><input type='button' value='Volver' class='TeamButton' onclick="redirigir('profesores')">
    </main>

    <footer class="TeamFooter">
        <div id="img_footer0"></div>
        <div id="img_footer1"></div>
        <div id="img_footer2"></div>
        <div id="img_footer3"></div>
        <div id="img_footer4"></div>
        <div id="img_footer5"></div>
    </footer>

    <script>
        // $arrayEjemplo = ["hola", "mundo"];

        // { 0: "hola", 1: "mundo" }
        
        // $arrayEjemplo = ["palabra1" = "hola", "palabra2" = "mundo"];

        // { palabra1: "hola", palabra2: "mundo" }

        var grupos = <?php echo json_encode($grupo); ?>;

        let divGrupos = document.querySelectorAll(".divGrupo");

        for (let divGrupo of divGrupos) {
            divGrupo.addEventListener("drop", (e) => drop(e, grupos));
        }

        document.getElementById("formGrupos").addEventListener("submit", function(e) {
            document.getElementById("arrayGrupos").setAttribute("value", JSON.stringify(grupos));

            return true;
        });
    </script>
</body>
</html>