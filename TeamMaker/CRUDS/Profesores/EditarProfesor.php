<?php

//Listamos los alumnos en una tabla html

session_start();
include "../../BBDD/includes/funciones.php";

$dni = $_GET['dni'];

$_SESSION['DNI_VIEJO']=$dni;

$conexion=conectarBD();

$sql = "SELECT USUARIO.DNI as DNI, USUARIO.NOMBRE as nombre, PROFESOR.Rol as Rol FROM PROFESOR, USUARIO WHERE PROFESOR.USUARIO_DNI=USUARIO.DNI and PROFESOR.USUARIO_DNI=\"".$dni."\"";

$consulta=$conexion->prepare($sql);
$consulta->execute();

$profesores=$consulta->fetch();

$dni=$profesores->DNI;
$nombre=$profesores->nombre;
$rol=$profesores->Rol;


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/Style.css">
    <title>Editar profesor</title>
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
    <main class="mainEditProfesor">
    <h1 class="h1EditUs">Introduce los nuevos datos del profesor</h1>
        <form action="actualizarProfesor" method="post">
            <input class="inputEditUs" type="text" name="nombre" id="nombre" placeholder="<?php echo $nombre?>" required>         
            <input type="hidden" name="DNI" value="<?php echo $dni?>">
            <!-- <input class="inputEditUs" type="password" name="Clave" id="Clave" placeholder="Clave" onblur="this.value = document.getElementById('DNI').value" required> -->
            <input class="inputEditUs" type="text" name="Rol" id="Rol" placeholder="<?php echo $rol?>" required><br>
            <input class="inputEditUsEnviar" id="crearTeacher" type="submit" value="Editar" name="Editar" onclick="redirigir_alumnos(editarProfesor,<?php $dni?>)"><br>
            <input type='button' value='Volver' class='inputEditUsEnviar' onclick="redirigir('listarProfesor')">
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