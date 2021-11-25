<?php
    session_start();
    include "../BBDD/includes/funciones.php";
?>

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

    <nav class="menuAdmin">

    <?php

        $conexion=conectarBD();

        $dni_usuario = $_SESSION['usuario'];

        $sql="SELECT * FROM PROFESOR WHERE USUARIO_DNI = \"$dni_usuario\"";
        echo $sql;

        $consulta = $conexion->prepare($sql);
        $consulta->execute();

        $fila = $consulta->fetch();
        $rol=$fila->Rol;

        echo "<br>".$rol."<br>";

    ?>
    <?php
    if ($rol == 'Admin') {
        ?>
        <nav id="menu">
            <!-- start menu -->

            <ul>
            <li><a href="../Gestiones/GestionarProfesor.php">Gestionar profesores</a>
            <ul>
            <li><a href="../CRUDS/Profesores/CrearProfesor.php">Añadir profesores</a></li>
            <li><a href="../CRUDS/Administradores/ListarProfesores.php">Menú de profesores</a></li>
            </ul>
            </li>
            <li><a href="../Gestiones/GestionarCurso.php">Gestionar cursos</a>
            <ul>
            <li><a href="../CRUDS/Cursos/CrearCurso.php">Crear curso</a></li>
            <li><a href="../CRUDS/Cursos/ListarCurso.php">Menú de cursos</a></li>
            </ul>
            </li>
            <li><a href="../PaginasUsuario/Profesor.php">Funciones del profesor</a>
            <ul>
            <li><a href="../Gestiones/GestionarAlumno.php">Gestionar alumnos</a></li>
            <li><a href="../Preguntas/verRespuestas.php">Ver respuestas</a></li>
            <li><a href="#">Equipos sugeridos</a></li>
            </ul>
            </li>
            <li><a href="../Login/Login.php">Salir</a></li>
            </ul>
            </nav>

            <?php
    }elseif ($rol == 'SuperAdmin') {
        ?>
            <nav id="menu">
            <!-- start menu -->
            <ul>
            <li><a href="../Gestiones/GestionarCentros.php">Gestionar centros</a>
            <ul>
            <li><a href="../CRUDS/Centros/CrearCentro.php">Crear centro</a></li>
            <li><a href="../CRUDS/Centros/ListarCentro.php">Menu gestión de centros</a></li>
            </ul>
            </li>
            <li><a href="../PaginasUsuario/Profesor.php">Funciones del profesor</a>
            <ul>
            <li><a href="../Gestiones/GestionarAlumno.php">Gestionar alumnos</a></li>
            <li><a href="../Preguntas/verRespuestas.php">Ver respuestas</a></li>
            <li><a href="#">Equipos sugeridos</a></li>
            </ul>
            <li><a href="../Gestiones/GestionarAdmin.php">Gestionar administrador de centros</a>
            <ul>
            <li><a href="../CRUDS/Administradores/CrearAdmin.php">Crear administrador</a></li>
            <li><a href="../CRUDS/Administradores/ListarAdmin.php">Menu de administradores</a></li>
            </ul>
            </li>
            <li><a href="../PaginasUsuario/Admin.php">Funciones de administrador de centros</a>
            <ul>
            <li><a href="../Gestiones/GestionarProfesor.php">Gestionar profesores</a></li>
            <li><a href="../Gestiones/GestionarCurso.php">Gestionar cursos</a></li>
            <li><a href="../PaginasUsuario/Profesor.php">Funciones de profesor</a></li>
            </ul>
            </li>
            <li><a href="../Login/Login.php">Salir</a></li>
            </ul>
            <!-- end menu -->
            </nav>
            <?php
    }
    ?>


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