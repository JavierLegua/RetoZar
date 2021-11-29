<?php

session_start();
include "../../BBDD/includes/funciones.php";

$conexion=conectarBD();

$sql = "SELECT * FROM CURSO";

$consulta=$conexion->prepare($sql);
$consulta->execute();

$curso=$consulta->fetchAll();


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/Style.css">
    <title>Editar Cursos</title>
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
  <nav class="menuAdmin">
            <ul>
            <li><a href="gestionarProfesor">Gestionar profesores</a>
            <ul>
            <li><a href="crearProfesor">Añadir profesores</a></li>
            <li><a href="listarProfesor">Menú de profesores</a></li>
            </ul>
            </li>
            <li><a href="gestionarCurso">Gestionar cursos</a>
            <ul>
            <li><a href="crearCurso">Crear curso</a></li>
            <li><a href="listarCurso">Menú de cursos</a></li>
            </ul>
            </li>
            <li><a href="profesores">Funciones del profesor</a>
            <ul>
            <li><a href="gestionarAlumno">Gestionar alumnos</a></li>
            <li><a href="verRespuesta">Ver respuestas</a></li>
            <li><a href="#">Equipos sugeridos</a></li>
            </ul>
            </li>
            <li><a href="inicio">Salir</a></li>
            </ul>
            </nav>
  <table class="table" id="tableCurso">
    <thead>
      <tr>
        <td>Id curso</td>
        <td>Curso</td>
        <td>Id centro</td>
        <td>Editar curso</td>
        <td>Borrar curso</td>
      </tr>
    </thead>
    <tbody>
    <?php
      for ($i=0; $i < count($curso); $i++) { 
        echo "<tr>
            <td>".$curso[$i]->idCurso."</td><td>".$curso[$i]->Nombre."</td><td>".$curso[$i]->CENTRO_idCentro."</td><td><input class=\"buttonList\" type=\"image\" src=\"../../Estilos/Editar.png\" value=\"x\" name=\"Volver\" onclick=\"redirigir_curso('EditarCurso.php','".$curso[$i]->idCurso."')\"></td><td><input class=\"buttonList\" type=\"image\" src=\"../../Estilos/Eliminar.png\" value=\"X\" name=\"Volver\" onclick=\"redirigir_curso('BorrarCurso.php','".$curso[$i]->idCurso."')\"></td></tr>";
      }
    ?>
    </tbody>
  </table>

  <?php 
      $situacion = $_GET['situacion'];
      if (isset($situacion)) {
        switch ($situacion) {
          case '0':
            echo "<br><br><p>Error al editar el curso</p>";
          break;
          case '1':
            echo "<br><br><p>Curso editado correctamente</p>";
          break;
          case '2':
            echo "<br><br><p>Curso borrado correctamente</p>";
          break;
          case '3':
            echo "<br><br><p>Error al borrar el curso</p>";
          break;
        }
      }
    ?>

  <input class="volverListUs" type="button" value="Volver" name="Volver" onclick="redirigir('../../gestionarCurso')">
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


