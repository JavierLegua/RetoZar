<?php

session_start();
include "../../BBDD/includes/funciones.php";

$conexion=conectarBD();

$sql = "SELECT * FROM CENTRO";

$consulta=$conexion->prepare($sql);
$consulta->execute();

$centro=$consulta->fetchAll();


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/Style.css">
    <title>Editar Centros</title>
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
        <li><a href="../../gestionarCentro">Gestionar centros</a>
        <ul>
        <li><a href="../crearCentro">Crear centro</a></li>
        <li><a href="#">Menu gestión de centros</a></li>
        </ul>
        </li>
        <li><a href="../../profesores">Funciones del profesor</a>
        <ul>
        <li><a href="../../gestionarAlumno">Gestionar alumnos</a></li>
        <li><a href="../../verRespuesta">Ver respuestas</a></li>
        <li><a href="#">Equipos sugeridos</a></li>
        </ul>
        <li><a href="../../gestionAdmin">Gestionar administrador de centros</a>
        <ul>
        <li><a href="../crearAdmin">Crear administrador</a></li>
        <li><a href="../listarAdmin">Menu de administradores</a></li>
        </ul>
        </li>
        <li><a href="../../admins">Funciones de administrador de centros</a>
        <ul>
        <li><a href="../../gestionarProfesor">Gestionar profesores</a></li>
        <li><a href="../../gestionarCurso">Gestionar cursos</a></li>
        <li><a href="../../profesores">Funciones de profesor</a></li>
        </ul>
        </li>
        <li><a href="../../inicio">Salir</a></li>
        </ul>
        </nav>
    <table class="table" id="tableCentro">
      <thead>
        <tr>
          <td>Id centro</td>
          <td>Nombre</td>
          <td>Direccion</td>
          <td>Editar centro</td>
          <td>Borrar centro</td>
        </tr>
      </thead>
      <tbody>
      <?php
        for ($i=0; $i < count($centro); $i++) { 
          echo "<tr>
              <td>".$centro[$i]->idCentro."</td><td>".$centro[$i]->Nombre."</td><td>".$centro[$i]->Direccion."</td><td><input class=\"buttonList\" type=\"image\" src=\"../../Estilos/Editar.png\" value=\"x\" name=\"Volver\" onclick=\"redirigir_centro('EditarCentro.php','".$centro[$i]->idCentro."')\"></td><td><input class=\"buttonList\" type=\"image\" src=\"../../Estilos/Eliminar.png\" value=\"X\" name=\"Volver\" onclick=\"redirigir_centro('BorrarCentro.php','".$centro[$i]->idCentro."')\"></td></tr>";
        }
      ?>
      </tbody>
    </table>

    <?php 
      $situacion = $_GET['situacion'];
      if (isset($situacion)) {
        switch ($situacion) {
          case '0':
            echo "<br><br><p>Error al editar el centro</p>";
          break;
          case '1':
            echo "<br><br><p>Centro editado correctamente</p>";
          break;
          case '2':
            echo "<br><br><p>Centro borrado correctamente</p>";
          break;
          case '3':
            echo "<br><br><p>Error al borrar el centro</p>";
          break;
        }
      }
    ?>

    <input class="volverListUs" type="button" value="Volver" name="Volver" onclick="redirigir('../../gestionarCentro')">
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


