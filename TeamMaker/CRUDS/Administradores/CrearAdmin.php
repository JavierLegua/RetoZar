<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/Style.css">
    <title>Crear Administrador</title>
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

    <main class="crudMainUsuario">
    <nav class="menuAdminTop">
        <ul>
        <li><a href="gestionarCentro">Gestionar centros</a>
        <ul>
        <li><a href="crearCentro">Crear centro</a></li>
        <li><a href="listarCentro">Menu gestión de centros</a></li>
        </ul>
        </li>
        <li><a href="profesores">Funciones del profesor</a>
        <ul>
        <li><a href="#">Gestionar alumnos</a></li>
        <li><a href="verRespuesta">Ver respuestas</a></li>
        <li><a href="#">Equipos sugeridos</a></li>
        </ul>
        <li><a href="gestionAdmin">Gestionar administrador de centros</a>
        <ul>
        <li><a href="crearAdmin">Crear administrador</a></li>
        <li><a href="listarAdmin">Menu de administradores</a></li>
        </ul>
        </li>
        <li><a href="admins">Funciones de administrador de centros</a>
        <ul>
        <li><a href="gestionarProfesor">Gestionar profesores</a></li>
        <li><a href="gestionarCurso">Gestionar cursos</a></li>
        <li><a href="profesores">Funciones de profesor</a></li>
        </ul>
        </li>
        <li><a href="inicio">Salir</a></li>
        </ul>
        </nav>
        <h1 class="crudH1">Creación de administradores</h1>

        <form method="post" action="InsertarBBDDAdmin.php">

            <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="inputUs" required>
            <input type="text" name="DNI" id="DNI" placeholder="DNI" class="inputUs" required>
            <input type="password" name="Clave" id="Clave" placeholder="Clave" onblur="this.value = document.getElementById('DNI').value" class="inputUs" required>
            <input type="text" name="Rol" id="Rol" placeholder="Rol" onblur="this.value = 'Admin'" class="inputUs" required><br>
            <?php 
                $situacion = $_GET['situacion'];
                if (isset($situacion)) {
                    switch ($situacion) {
                        case '0':
                            echo "<br><br><p>Usuario ya introducido</p>";
                        break;
                        case '1':
                            echo "<br><br><p>Administrador creado correctamente</p>";
                        break;
                        case '2':
                            echo "<br><br><p>Error al insertar el administrador</p>";
                        break;                        
                        case '3':
                            echo "<br><br><p>Error desconocido</p>";
                        break;
                    }
                }
            ?>
            <input id="crear" type="submit" name="Crear Admin" class="inputUsEnviar"><br>
            <input id="crear" type="button" value="Volver" name="Volver" onclick="redirigir('gestionAdmin')" class="inputUsVolver">

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