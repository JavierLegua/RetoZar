<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos/Style.css">
    <title>Profesor</title>
    <script src="../Funciones.js"></script>
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
    
    <main class="profesorMain">
    <nav id="menuProfesor">
        <ul>
            <li><a href="../gestionarAlumno">Gestionar alumnos</a>
                <ul>
                    <li><a href="../anadirAlumno">Añadir alumno</a></li>
                    <li><a href="../listarAlumno">Menu alumnos</a></li>
                </ul>
            </li>
            <li><a href="../verRespuesta">Ver respuestas</a></li>
            <li><a href="#">Equipos sugeridos</a></li>
            <li><a href="../inicio">Salir</a></li>
        </ul>
        </nav>
        <h1 class="profesorH1">Bienvenido <?php echo $_SESSION['nombre'] ?></h1>

        <input type="button" value="Gestionar alumnos" class="profesor" onclick="redirigir('../gestionarAlumno')">
        <!-- <input type="button" value="Ver respuestas" class="profesor" onclick="redirigir('../verRespuesta')"> <br> -->
        <!-- <input type="button" value="Gestionar clase" class="profesor" onclick="redirigir('../Gestiones/GestionarClase.php')" > -->
        <input type="button" value="Equipos sugeridos" class="profesor"> <br>
        <input type="button" value="Salir" class="profesorSalir" onclick="redirigir('../inicio')">

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