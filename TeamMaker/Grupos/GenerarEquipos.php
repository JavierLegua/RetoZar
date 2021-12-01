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
    <title>Generar equipos</title>
</head>
<body>
    
    <form action="verGrupos" method="post">

    <select name="curso" id="curso">
        <option value="0">Seleccione un curso</option>
        <?php
            for ($i=0; $i < count($cursos); $i++) { 
            echo "<option value=\"".$cursos[$i]->idCurso."\">".$cursos[$i]->idCurso."</option>";
            }
        ?>
      <br>
    </select>

    <select name="numPersonas" id="numPersonas">
        <option value="0">Seleccione un numero de personas</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>

    
    <?php
        echo"<input type='submit' class='buttonList3' value='Ver clase' onclick=\"redirigir('verGrupos')\">"
    ?>

    </form>

    <input type='button' value='Volver' class='inputEditUsEnviar' onclick="redirigir('profesores')">

</body>
</html>