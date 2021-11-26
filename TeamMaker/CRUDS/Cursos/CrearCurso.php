


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/Style.css">
    <title>Crear Curso</title>
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
    <nav class="menuAdmin">
            <ul>
            <li><a href="../../gestionarProfesor">Gestionar profesores</a>
            <ul>
            <li><a href="../crearProfesor">Añadir profesores</a></li>
            <li><a href="../listarProfesor">Menú de profesores</a></li>
            </ul>
            </li>
            <li><a href="../../gestionarCurso">Gestionar cursos</a>
            <ul>
            <li><a href="../crearCurso">Crear curso</a></li>
            <li><a href="../listarCurso">Menú de cursos</a></li>
            </ul>
            </li>
            <li><a href="../../profesores">Funciones del profesor</a>
            <ul>
            <li><a href="../../gestionarAlumno">Gestionar alumnos</a></li>
            <li><a href="../../verRespuesta">Ver respuestas</a></li>
            <li><a href="#">Equipos sugeridos</a></li>
            </ul>
            </li>
            <li><a href="../../inicio">Salir</a></li>
            </ul>
            </nav>

        <h1 class="crudH1">Creación de cursos</h1>

        <form method="post" action="InsertarBBDDCurso.php">

            <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="inputGr" required><br>
            <input type="text" name="idCurso" id="idCurso" placeholder="idCurso" class="inputGr" required><br>
            <input type="text" name="idCentro" id="idCentro" placeholder="idCentro" class="inputGr" required><br>

            <?php 
                $situacion = $_GET['situacion'];
                if (isset($situacion)) {
                    switch ($situacion) {
                        case '0':
                            echo "<br><br><p>Curso ya introducido</p>";
                        break;
                        case '1':
                            echo "<br><br><p>Curso creado correctamente</p>";
                        break;
                        case '2':
                            echo "<br><br><p>Error al insertar el curso</p>";
                        break;
                    }
                }
            ?>

            <input id="crear" type="submit" name="Crear Curso" class="inputGrEnviar"><br>
            <input id="crear" type="button" value="Volver" name="Volver" onclick="redirigir('../../gestionarCurso')" class="inputGrVolver">

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