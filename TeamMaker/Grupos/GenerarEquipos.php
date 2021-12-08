<?php

    session_start();
    include "../BBDD/includes/funciones.php";

    $conexion=conectarBD();

    $sqlCurso="SELECT idCurso, Nombre from CURSO";
    $consultaCurso=$conexion->prepare($sqlCurso);
    $consultaCurso->execute();

    $cursos=$consultaCurso->fetchAll();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <script src="../Funciones.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/Style.css">
    <title>Generar equipos</title>
</head>
<body>
    <header>
        <div id="img_header0"></div>
        <div id="img_header1"></div>
        <div id="img_header2"></div>
        <div id="img_header3"></div>
        <div id="img_header4"></div>
        <div id="img_header5"></div>
        <div id="img_header6"></div>
        <div id="img_header7"></div>
        <div id="img_header8"></div>
        <?php
        $rol = $_SESSION['rol'];
        
        switch ($rol) {
            case 'SuperAdmin':    
                echo "<div class='menuMovil'>".menuMovil($rol)."</div>";
            break;
            
            case 'Admin':
                echo "<div class='menuMovil'>".menuMovil($rol)."</div>";
            break;

            case 'Profesor':
                echo "<div class='menuMovil'>".menuMovil($rol)."</div>";
            break;
        }
    ?>
    </header>
    <main>
    <?php
        $rol = $_SESSION['rol'];
        
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
    ?>
        <form action="verGrupos" method="post">

        <select name="curso" id="curso" class="genEquipos">
            <option value="0">Seleccione un curso</option>
            <?php
                for ($i=0; $i < count($cursos); $i++) { 
                    echo "<option value=\"".$cursos[$i]->idCurso."\">".$cursos[$i]->idCurso."</option>";
                }
            ?>
        </select>
        <br>

        <select name="numGrupos" id="numGrupos" class="genEquipos">
            <option value="1">Seleccione un numero de grupos</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <br>
        
        <?php
            echo"<input type='submit' class='genEquiposButton' value='Generar equipos' onclick=\"redirigir('verGrupos')\">"
        ?>

        </form>

        <input type='button' value='Volver' class='genEquiposButtonSalir' onclick="redirigir('profesores')">
    </main>
    <footer>
        <div id="img_footer0"></div>
        <div id="img_footer1"></div>
        <div id="img_footer2"></div>
        <div id="img_footer3"></div>
        <div id="img_footer4"></div>
        <div id="img_footer5"></div>
    </footer>
</body>
</html>