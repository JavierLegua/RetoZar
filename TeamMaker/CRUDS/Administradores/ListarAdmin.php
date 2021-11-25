<?php

session_start();
include "../../BBDD/includes/funciones.php";

$conexion=conectarBD();

$sql = "SELECT USUARIO.DNI as DNI, USUARIO.Nombre as nombre FROM PROFESOR, USUARIO WHERE PROFESOR.USUARIO_DNI=USUARIO.DNI and PROFESOR.Rol='Admin'";


$consulta=$conexion->prepare($sql);
$consulta->execute();

$admins=$consulta->fetchAll();


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/Style.css">
    <title>Editar administradores</title>
    <script src="../../Funciones.js"></script>
</head>
<body class="listarBody">
  <header class="listarHeader">
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
  <div class="listTodo">
  <nav class="menuAdminTop">
        <ul>
        <li><a href="../../Gestiones/GestionarCentros.php">Gestionar centros</a>
        <ul>
        <li><a href="../Centros/CrearCentro.php">Crear centro</a></li>
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
        <li><a href="#">Menu de administradores</a></li>
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
    <table class="table" id="tableAdmin">
      <thead>
        <tr>
          <td>DNI</td>
          <td>Nombre</td>
          <td>Editar administrador</td>
          <td>Borrar administrador</td>
        </tr>
      </thead>
      <tbody>
      <?php
        for ($i=0; $i < count($admins); $i++) { 
          $dni = $admins[$i]->DNI;
          $_SESSION['dni']=$dni;
          echo "<tr>
              <td>".$admins[$i]->DNI."</td><td>".$admins[$i]->nombre."</td><td><input class=\"buttonList\" type=\"image\" src=\"../../Estilos/Editar.png\" value=\"x\" name=\"Volver\" onclick=\"redirigir_alumnos('EditarAdmin.php','".$dni."')\"></td><td><input class=\"buttonList\" type=\"image\" src=\"../../Estilos/Eliminar.png\" value=\"X\" name=\"Volver\" onclick=\"redirigir_alumnos('BorrarAdmin.php','".$dni."')\"></td></tr>";
        }
      ?>
      </tbody>
    </table>
    <?php 
      $situacion = $_GET['situacion'];
      if (isset($situacion)) {
        switch ($situacion) {
          case '0':
            echo "<br><br><p>Error al editar al administrador</p>";
          break;
          case '1':
            echo "<br><br><p>Administrador editado correctamente</p>";
          break;
          case '2':
            echo "<br><br><p>Administrador borrado correctamente</p>";
          break;
          case '3':
            echo "<br><br><p>Error al borrar el administrador</p>";
          break;
        }
      }
    ?>
    <input class="volverListUs" type="button" value="Volver" name="Volver" onclick="redirigir('../../Gestiones/GestionarAdmin.php')">
  </div>
  <footer class="listFoot">
    <div id="img_footer0"></div>
    <div id="img_footer1"></div>
    <div id="img_footer2"></div>
    <div id="img_footer3"></div>
    <div id="img_footer4"></div>
    <div id="img_footer5"></div>
  </footer>
</body>
</html>


