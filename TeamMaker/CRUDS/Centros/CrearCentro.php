


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/Style.css">
    <title>Crear centro</title>
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

    <main class="crudMain">
    <nav class="menuAdminTop">
            <ul>
            <li><a href="../../Gestiones/GestionarCentros.php">Gestionar centros</a>
            <ul>
            <li><a href="#">Crear centro</a></li>
            <li><a href="../Centros/ListarCentro.php">Menu gestión de centros</a></li>
            </ul>
            </li>
            <li><a href="../../PaginasUsuario/Profesor.php">Funciones del profesor</a>
            <ul>
            <li><a href="../../Gestiones/GestionarAlumno.php">Gestionar alumnos</a></li>
            <li><a href="../../Preguntas/verRespuestas.php">Ver respuestas</a></li>
            <li><a href="#">Equipos sugeridos</a></li>
            </ul>
            <li><a href="../../Gestiones/GestionarAdmin.php">Gestionar administrador de centros</a>
            <ul>
            <li><a href="../Administradores/CrearAdmin.php">Crear administrador</a></li>
            <li><a href="../Administradores/ListarAdmin.php">Menu de administradores</a></li>
            </ul>
            </li>
            <li><a href="../../PaginasUsuario/Admin.php">Funciones de administrador de centros</a>
            <ul>
            <li><a href="../../Gestiones/GestionarProfesor.php">Gestionar profesores</a></li>
            <li><a href="../../Gestiones/GestionarCurso.php">Gestionar cursos</a></li>
            <li><a href="../../PaginasUsuario/Profesor.php">Funciones de profesor</a></li>
            </ul>
            </li>
            <li><a href="../../Login/Login.php">Salir</a></li>
            </ul>
            </nav>
        <h1 class="crudH1">Creación de centros</h1>

        <form method="post" action="InsertarBBDDCentro.php">

            <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="inputGr" required><br>
            <input type="text" name="direccion" id="direccion" placeholder="direccion" class="inputGr" required><br>
            <input type="text" name="idCentro" id="idCentro" placeholder="idCentro" class="inputGr" required><br>
            <?php 
                $situacion = $_GET['situacion'];
                if (isset($situacion)) {
                    switch ($situacion) {
                        case '0':
                            echo "<br><br><p>Centro ya introducido</p>";
                        break;
                        case '1':
                            echo "<br><br><p>Centro creado correctamente</p>";
                        break;                       
                        case '2':
                            echo "<br><br><p>Error al crear centro</p>";
                        break;
                    }
                }
            ?>
            <input id="crear" type="submit" name="Crear Centro" class="inputGrEnviar"><br>
            <input id="crear" type="button" value="Volver" name="Volver" onclick="redirigir('../../Gestiones/GestionarCentro.php')" class="inputGrVolver">

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