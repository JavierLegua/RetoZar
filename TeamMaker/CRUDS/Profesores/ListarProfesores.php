<?php

session_start();
include "../../BBDD/includes/funciones.php";

$conexion=conectarBD();

$sql = "SELECT USUARIO.DNI as DNI, USUARIO.NOMBRE as nombre, PROFESOR.Rol as Rol FROM PROFESOR, USUARIO WHERE PROFESOR.USUARIO_DNI=USUARIO.DNI";

$consulta=$conexion->prepare($sql);
$consulta->execute();

$profesores=$consulta->fetchAll();


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/Style.css">
    <title>Editar profesores</title>
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
    <table class="table" id="tableProfesor">
      <thead>
        <tr>
          <td>DNI</td>
          <td>Rol</td>
          <td>Nombre</td>
          <td>Editar profesor</td>
          <td>Borrar profesor</td>
        </tr>
      </thead>
      <tbody>
      <?php
        for ($i=0; $i < count($profesores); $i++) { 
          $dni = $profesores[$i]->DNI;
          $_SESSION['dni']=$dni;
          echo "<tr><td>".$profesores[$i]->DNI."</td><td>".$profesores[$i]->Rol."</td><td>".$profesores[$i]->nombre."</td><td><input class=\"buttonList\" type=\"image\" src=\"../../Estilos/Editar.png\" value=\"x\" name=\"Volver\" onclick=\"redirigir_alumnos('EditarProfesor.php','".$dni."')\"></td><td><input class=\"buttonList\" type=\"image\" src=\"../../Estilos/Eliminar.png\" value=\"X\" name=\"Volver\" onclick=\"redirigir_alumnos('BorrarProfesor.php','".$dni."')\"></td></tr>";
        }
      ?>
      </tbody>
    </table>
    <input class="volverListUs" type="button" value="Volver" name="Volver" onclick="redirigir('../../Gestiones/GestionarProfesor.php')">
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


