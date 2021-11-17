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
    <table>
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
              <td>".$admins[$i]->DNI."</td><td>".$admins[$i]->nombre."</td><td><input class=\"buttonList\" type=\"button\" value=\"x\" name=\"Volver\" onclick=\"redirigir_alumnos('EditarAdmin.php','".$dni."')\"></td><td><input class=\"buttonList\" type=\"button\" value=\"X\" name=\"Volver\" onclick=\"redirigir_alumnos('BorrarAdmin.php','".$dni."')\"></td></tr>";
        }
      ?>
      </tbody>
    </table>
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


