<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos/Style.css">
    <title>Administrador centro</title>
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

    <main class="mainAdmin">
            <!-- start nav -->
            <nav id="menu">
            <!-- start menu -->
            <ul>
            <li><a href="#">Gestionar profesores</a>
            <ul>
            <li><a href="#">Añadir profesores</a></li>
            <li><a href="#">Menu de profesores</a></li>
            </ul>
            </li>
            <li><a href="#">Gestionar cursos</a>
            <ul>
            <li><a href="#">Crear curso</a></li>
            <li><a href="#">Menu de cursos</a></li>
            </ul>
            </li>
            <li><a href="#">Funciones del profesor</a>
            <ul>
            <li><a href="#">Gestionar alumnos</a></li>
            <li><a href="#">Ver respuestas</a></li>
            <li><a href="#">Equipos sugeridos</a></li>
            </ul>
            </li>
            <li><a href="#">Salir</a></li>
            </ul>
            <!-- end menu -->
            </nav>
            <!-- end nav -->
        <h1 class="adminH1">Bienvenido <?php echo $_SESSION['nombre'] ?></h1>

        <input type="button" value="Gestionar profesores" class="admin" onclick="redirigir('../Gestiones/GestionarProfesor.php')">
        <input type="button" value="Gestionar cursos" class="admin" onclick="redirigir('../Gestiones/GestionarCurso.php')"> <br>
        <input type="button" value="Funciones de profesor" class="admin" onclick="redirigir('Profesor.php')"> <br>
        <input type="button" value="Salir" class="adminSalir" onclick="redirigir('../Login/Login.php')">

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