<?php

//Listamos los alumnos en una tabla html

session_start();
include "../../BBDD/includes/funciones.php";


$conexion=conectarBD();

$idCursoViejo=$_GET['curso'];

$sql = "SELECT * FROM CURSO WHERE idCurso=\"".$idCursoViejo."\"";

$consulta=$conexion->prepare($sql);
$consulta->execute();

$curso=$consulta->fetch();

$idCurso=$curso->idCurso;
$nombre=$curso->Nombre;
$centro=$curso->CENTRO_idCentro;


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/Style.css">
    <title>Editar Curso</title>
    <link rel="icon" type="image/x-icon" href="../../Estilos/Logo.png">
    <script src="../../Funciones.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
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
    </header>
    <main class="mainEditC">
    <h1 class="h1EditUs">Introduce los nuevos datos del curso</h1>
        <form action="actualizarCurso" method="post">
            <input type="hidden" name="idCurso" value="<?php echo $idCurso?>">
            <input class="inputEditUs" type="text" name="nombre" id="nombre" placeholder="<?php echo $nombre?>" required>
            <input class="inputEditUs" type="text" name="idCentro" id="idCentro" placeholder="<?php echo $centro?>" required><br>
            <input class="inputEditUsEnviar" id="crearTeacher" type="submit" value="Editar" name="Editar" onclick="redirigir(editarCurso)"><br>
            <input type='button' value='Volver' class='adminSalir' onclick="redirigir('listarCurso')">
        </form>
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