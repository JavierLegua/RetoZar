<?php

    session_start();
    include "../BBDD/includes/funciones.php";
  
    $conexion=conectarBD();


    $curso = $_POST['curso'];
    $numPersonas = $_POST['numPersonas'];

    echo $curso."-----------------".$numPersonas;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos</title>
</head>
<body>
    <input type='button' value='Volver' class='inputEditUsEnviar' onclick="redirigir('profesores')">
</body>
</html>l