<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../Estilos/fonts.css">
    <script src="jquery-latest.js"></script>
    <script src="Funciones.js"></script>
</head>
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

    
    function calcularPersonas($alumnosClase, $numGrupos){
        $numPersonas = $alumnosClase/$numGrupos;
        $numPersonas = intval($numPersonas);
        return $numPersonas;
    }
    
    function shouldCreateGroup($numPersonasRestantes, $numPersonasPorGrupo) {
        // if ($numPersonasRestantes / $numPersonasPorGrupo > 0.75) {
        //     return true;
        // } else {
        //     return false;
        // }

        // Esto sería lo mismo que poner el if else de arriba
        return $numPersonasRestantes / $numPersonasPorGrupo > 0.75;
    }

    function crear_menu($rol){
        switch ($rol) {
            case "Admin":
                echo"<nav class='menuAdmin'><ul><li><a href='gestionarProfesor'>Gestionar profesores</a><ul><li><a href='crearProfesor'>Añadir profesor</a></li><li><a href='listarProfesor'>Menu de profesores</a></li></ul></li><li><a href='gestionarCurso'>Gestionar cursos</a><ul><li><a href='crearCurso'>Crear curso</a></li><li><a href='listarCurso'>Menu de cursos</a></li></ul></li><li><a href='profesores'>Funciones de profesor</a><ul><li><a href='gestionarAlumno'>Gestionar alumnos</a></li><li><a href='generarEquipos'>Equipos sugeridos</a></li></ul></li><li><a href='inicio'>Salir</a></li></ul></nav>";
            break;

            case "SuperAdmin":
                echo"<nav class='menuAdminTop'>
                <ul>
                    <li><a href='gestionarCentro'>Gestionar centros</a><ul><li><a href='crearCentro'>Crear centro</a></li><li><a href='listarCentro'>Menu gestión de centros</a></li></ul></li><li><a href='profesores'>Funciones del profesor</a><ul><li><a href='gestionarAlumno'>Gestionar alumnos</a></li><li><a href='generarEquipos'>Equipos sugeridos</a></li></ul><li><a href='gestionAdmin'>Gestionar administrador de centros</a><ul><li><a href='crearAdmin'>Crear administrador</a></li><li><a href='listarAdmin'>Menu de administradores</a></li></ul></li><li><a href='admins'>Funciones de administrador de centros</a><ul><li><a href='gestionarProfesor'>Gestionar profesores</a></li><li><a href='gestionarCurso'>Gestionar cursos</a></li><li><a href='profesores'>Funciones de profesor</a></li></ul></li><li><a href='inicio'>Salir</a></li></ul></nav>";
            break;

            case "Profesor":
                echo"<nav id='menuProfesor'><ul><li><a href='gestionarAlumno'>Gestionar alumnos</a><ul><li><a href='anadirAlumno'>Añadir alumno</a></li><li><a href='listarAlumno'>Menu alumnos</a></li></ul></li><li><a href='generarEquipos'>Equipos sugeridos</a></li><li><a href='inicio'>Salir</a></li></ul></nav>";
            break;
    }
}

    function menuMovil($rol){
        switch ($rol) {
            case 'Admin':
                echo "<div class='menuMovil'>
                        <a href='#' class='bt-menu'><span class='icon-menu2'></span></a>
                      </div>
                  <nav id='navMovil'>
                    <ul>
                      <li class='submenu'><a href='#'>Gestionar Profesores<span class='caret icon-circle-down'</span></a>
                          <ul class='children'>
                              <li><a href='crearProfesor'>Crear Profesores</a></li>
                              <li><a href='listarProfesor'>Menú Profesores</a></li>
                          </ul>
                      </li>
                      <li class='submenu'><a href='#'>Gestionar Cursos<span class='caret icon-circle-down'</span></a>
                          <ul class='children'>
                              <li><a href='crearCurso'>Crear Cursos</a></li>
                              <li><a href='listarCurso'>Menú Cursos</a></li>
                          </ul>
                      </li>
                      <li class='submenu'><a href='#'>Funciones del profesor<span class='caret icon-circle-down'</span></a>
                          <ul class='children'>
                              <li><a href='gestionarAlumno'>Gestionar Alumnos</a></li>
                              <li><a href='generarEquipos'>Equipos sugeridos</a></li>
                          </ul>
                      </li>
                    </ul>
                  </nav>";
                break;

            case 'SuperAdmin':
                echo "<div class='menuMovil'>
                        <a href='#' class='bt-menu'><span class='icon-menu2'></span></a>
                      </div>
                  <nav id='navMovil'>
                    <ul>
                      <li class='submenu'><a href='#'>Gestionar Centros<span class='caret icon-circle-down'</span></a>
                          <ul class='children'>
                              <li><a href='crearCentro'>Crear Centro</a></li>
                              <li><a href='listarCentro'>Menú Centro</a></li>
                          </ul>
                      </li>
                      <li class='submenu'><a href='#'>Funciones del profesor<span class='caret icon-circle-down'</span></a>
                          <ul class='children'>
                              <li><a href='gestionarAlumno'>Gestionar Alumnos</a></li>
                              <li><a href='generarEquipos'>Equipos sugeridos</a></li>
                          </ul>
                      </li>
                      <li class='submenu'><a href='#'>Gestionar Administrador de Centros<span class='caret icon-circle-down'</span></a>
                          <ul class='children'>
                              <li><a href='crearAdmin'>Crear Administradores de Centros</a></li>
                              <li><a href='listarAdmin'>Menú Admins</a></li>
                          </ul>
                      </li>
                      <li class='submenu'><a href='#'>Funciones de Administrador de Centros<span class='caret icon-circle-down'</span></a>
                          <ul class='children'>
                              <li><a href='gestionarProfesor'>Gestionar Profesores</a></li>
                              <li><a href='gestionarCurso'>Gestionar Cursos</a></li>
                              <li><a href='profesores'>Funciones del profesor</a></li>
                          </ul>
                      </li>
                    </ul>
                  </nav>"; 
                break;
            case 'Profesor':
                echo "<div class='menuMovil'>
                        <a href='#' class='bt-menu'><span class='icon-menu2'></span></a>
                      </div>
                  <nav id='navMovil'>
                    <ul>
                      <li class='submenu'><a href='#'>Gestionar Alumnos<span class='caret icon-circle-down'</span></a>
                          <ul class='children'>
                              <li><a href='crearAlumno'>Crear Alumnos</a></li>
                              <li><a href='listarAlumno'>Menú Alumnos</a></li>
                          </ul>
                      </li>
                      <li class='submenu'><a href='generarEquipos'>Equipos sugeridos</a></li>
                    </ul>
                  </nav>";
                break;
        }
    }
?>
