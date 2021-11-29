<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="Funciones.js"></script>
</head>
<body>
    
</body>
</html>
<?php
   
    function conectarBD(){
        $servidor = "localhost";
        $usuario = "makelele";
        $password = "Makelele123@";
        $baseDatos = "TeamMaker";
        $opciones = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'",
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        );

        try {
            $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $password, $opciones);      
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Conexión realizada Satisfactoriamente";
            return $conexion;
        } catch(PDOException $e) {
            echo "La conexión ha fallado: " . $e->getMessage();
            die();
        }
         

    }

    function crear_menu($rol){
        switch ($rol) {
            case "Admin":
                echo"<nav class='menuAdmin'><ul><li><a href='gestionarProfesor>Gestionar profesores</a><ul><li><a href='crearProfesor'>Añadir profesores</a></li><li><a href='listarProfesor'>Menú de profesores</a></li></ul></li><li><a href=gestionarCurso'>Gestionar cursos</a><ul><li><a href='crearCurso'>Crear curso</a></li><li><a href='listarCurso'>Menú de cursos</a></li></ul></li><li><a href='profesores'>Funciones del profesor</a><ul><li><a href='anadirAlumno'>Gestionar alumnos</a></li><li><a href='#'>Equipos sugeridos</a></li></ul></li><li><a href='inicio'>Salir</a></li></ul></nav>"; 
            break;

            case "SuperAdmin":
                echo"<nav class='menuAdminTop'><ul><li><a href='gestionarCentro'>Gestionar centros</a><ul><li><a href='crearCentro'>Crear centro</a></li><li><a href='listarCentro'>Menu gestión de centros</a></li></ul></li><li><a href='profesores'>Funciones del profesor</a><ul><li><a href='gestionarAlumno'>Gestionar alumnos</a></li><li><a href='#'>Equipos sugeridos</a></li></ul><li><a href='gestionAdmin'>Gestionar administrador de centros</a><ul><li><a href='crearAdmin'>Crear administrador</a></li><li><a href='listarAdmin'>Menu de administradores</a></li></ul></li><li><a href='admins'>Funciones de administrador de centros</a><ul><li><a href='gestionarProfesor'>Gestionar profesores</a></li><li><a href='gestionarCurso'>Gestionar cursos</a></li><li><a href='profesores'>Funciones de profesor</a></li></ul></li><li><a href='inicio'>Salir</a></li></ul></nav>";
            break;

            case "Profesor":
                echo"<nav id='menuProfesor'><ul><li><a href='gestionarAlumno'>Gestionar alumnos</a><ul><li><a href='anadirAlumno'>Añadir alumno</a></li><li><a href='listarAlumno'>Menu alumnos</a></li></ul></li><li><a href='#'>Equipos sugeridos</a></li><li><a href='inicio'>Salir</a></li></ul></nav>";
            break;
    }
}

    function menuMovil($rol){
        switch ($rol) {
            case 'Admin':
                echo "<div class='menuMovil'>
                <input type='checkbox'>
                <i class='fas fa-bars'></i>
                <i class='fas fa-times'></i>
                <nav>
                  <ul>
                    <li><a href='gestionarProfesor'>Gestionar Profesores</a></li>
                    <li><a href='gestionarCurso'>Gestionar Cursos</a></li>
                    <li><a href='profesores'>Funciones del profesor</a></li>
                  </ul>
                </nav>
              </div>";    
                break;

            case 'SuperAdmin':
                echo "<div id='menuMovil'>
                <input type='checkbox'>
                <i class='fas fa-bars'></i>
                <i class='fas fa-times'></i>
                <nav>
                  <ul>
                    <li><a href='gestionarCentro'>Gestionar Centros</a></li>
                    <li><a href='profesores'>Funciones del profesor</a></li>
                    <li><a href='gestionAdmin'>Gestionar Administrador de Centros</a></li>
                    <li><a href='admins'>Funciones de Administrador de Centros</a></li>
                  </ul>
                </nav>
              </div>"; 
                break;
            case 'Profesor':
                echo "<div class='menuMovil'>
                <input type='checkbox'>
                <i class='fas fa-bars'></i>
                <i class='fas fa-times'></i>
                <nav>
                  <ul>
                    <li><a href='gestionarAlumno'>Gestionar Alumnos</a></li>
                    <li><a href='#'>Equipos sugeridos</a></li>
                  </ul>
                </nav>
              </div>";  
                break;
        }
    }
?>
