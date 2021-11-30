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
        $usuario = "makelelesberry";
        $password = "Makelelesberry123@";
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
                echo"<nav class='menuAdmin'><ul><li><a href='../gestionarProfesor?rol=Admin'>Gestionar profesores</a><ul><li><a href='../crearProfesor?rol=Admin'>Añadir profesores</a></li><li><a href='../listarProfesor?rol=Admin'>Menú de profesores</a></li></ul></li><li><a href='../gestionarCurso?rol=Admin'>Gestionar cursos</a><ul><li><a href='../crearCurso?rol=Admin'>Crear curso</a></li><li><a href='../listarCurso?rol=Admin'>Menú de cursos</a></li></ul></li><li><a href='../profesores?rol=Admin'>Funciones del profesor</a><ul><li><a href='../anadirAlumno?rol=Admin'>Gestionar alumnos</a></li><li><a href='../verRespuesta?rol=Admin'>Ver respuestas</a></li><li><a href='#'>Equipos sugeridos</a></li></ul></li><li><a href='../inicio'>Salir</a></li></ul></nav>"; 
            break;
    
            case "SuperAdmin":
                echo"<nav class='menuAdminTop'><ul><li><a href='../gestionarCentro?'>Gestionar centros</a><ul><li><a href='../crearCentro'>Crear centro</a></li><li><a href='../listarCentro'>Menu gestión de centros</a></li></ul></li><li><a href='../profesores?rol=SuperAdmin'>Funciones del profesor</a><ul><li><a href='../gestionarAlumno?rol=SuperAdmin'>Gestionar alumnos</a></li><li><a href='../verRespuesta?rol=SuperAdmin'>Ver respuestas</a></li><li><a href='#'>Equipos sugeridos</a></li></ul><li><a href='../gestionAdmin'>Gestionar administrador de centros</a><ul><li><a href='../crearAdmin'>Crear administrador</a></li><li><a href='../listarAdmin'>Menu de administradores</a></li></ul></li><li><a href='../admins?rol=SuperAdmin'>Funciones de administrador de centros</a><ul><li><a href='../gestionarProfesor?rol=SuperAdmin'>Gestionar profesores</a></li><li><a href='../gestionarCurso?rol=SuperAdmin'>Gestionar cursos</a></li><li><a href='../profesores?rol=SuperAdmin'>Funciones de profesor</a></li></ul></li><li><a href='../inicio'>Salir</a></li></ul></nav>";
            break;
    
            case "Profesor":
                echo"<nav id='menuProfesor'><ul><li><a href='../gestionarAlumno?rol=Profesor'>Gestionar alumnos</a><ul><li><a href='../anadirAlumno?rol=Profesor'>Añadir alumno</a></li><li><a href='../listarAlumno?rol=Profesor'>Menu alumnos</a></li></ul></li><li><a href='../verRespuesta?rol=Profesor'>Ver respuestas</a></li><li><a href='#'>Equipos sugeridos</a></li><li><a href='../inicio'>Salir</a></li></ul></nav>";
            break;
    
        }
    }

    function menuMovil($rol){
        switch ($rol) {
            case 'Admin':
                echo "<section class='navigation'><nav class='navNav'><div class='nav-movil'>
                  <a id='nav-boton' href='#!'>
                    <span></span>
                  </a>
                </div>
                <ul class='nav-menu'>
                  <li><a href='../gestionarProfesor?rol=Admin'>Gestionar Profesores</a></li>
                        <ul class='nav-submenu'>
                            <li><a href='../crearProfesor?rol=Admin'>Añadir profesores</a></li>
                            <li><a href='../listarProfesor?rol=Admin'>Menú profesores</a></li>
                        </ul>
                  <li><a href='../gestionarCurso?rol=Admin'>Gestionar cursos</a></li>
                        <ul class='nav-submenu'>
                            <li><a href='../crearCurso?rol=Admin'>Crear curso</a></li>
                            <li><a href='../listarCurso?rol=Admin'>Menú de cursos</a></li>
                        </ul>
                  <li>
                    <a href='../profesores?rol=Admin'>Funciones del profesor</a>
                    <ul class='nav-submenu'>
                      <li><a href='../anadirAlumno?rol=Admin'>Gestionar alumnos</a></li>
                      <li><a href='../verRespuesta?rol=Admin'>Ver respuestas</a></li>
                      <li><a href='#'>Equipos sugeridos</a></li>
                    </ul>
                  </li>
                  <li><a href='../inicio'>Salir</a></li>
                </ul>
              </nav>
              </section>";    
                break;
            case 'SuperAdmin':
                # code...
                break;
            case 'Profesor':
                # code...
                break;
        }
    }
?>

