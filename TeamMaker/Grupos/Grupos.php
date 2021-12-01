<?php

    session_start();
    include "../BBDD/includes/funciones.php";
  
    $conexion=conectarBD();


    $curso = $_POST['curso'];
    $numPersonas = $_POST['numPersonas'];

    echo $curso."-----------------".$numPersonas;

?>