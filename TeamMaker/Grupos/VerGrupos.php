<?php

    session_start();
    include "../BBDD/includes/funciones.php";

    $conexion=conectarBD();

    $sqlEquipo="select * from EQUIPO";
    
    $consulta1=$conexion->prepare($sqlEquipo);
    $consulta1->execute();

    $equipos=$consulta1->fetchAll();

    $nombreGrupo=$equipos->Nombre;
    $idCurso=$equipos->CURSO_idCurso; 
    var_dump ($nombreGrupo);
    
    /* echo "Nombre: ".$nombreGrupo; */
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../Estilos/fonts.css">
    <script src="../jquery-latest.js"></script>
    <link rel="stylesheet" href="../Estilos/Style.css">
    <link rel="icon" type="image/x-icon" href="../Estilos/Logo.png">
    <title>Ver Equipos</title>
    <script src="../Funciones.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
</head>
<body>

   <!--  <header>
            <div id="img_header0"></div>
            <div id="img_header1"></div>
            <div id="img_header2"></div>
            <div id="img_header3"></div>
            <div id="img_header4"></div>
            <div id="img_header5"></div>
            <div id="img_header6"></div>
            <div id="img_header7"></div>
            <div id="img_header8"></div> 
    </header> -->

    <main>



    </main>

   <!--  <footer>
        <div id="img_footer0"></div>
        <div id="img_footer1"></div>
        <div id="img_footer2"></div>
        <div id="img_footer3"></div>
        <div id="img_footer4"></div>
        <div id="img_footer5"></div>
    </footer> -->
    
</body>
</html>