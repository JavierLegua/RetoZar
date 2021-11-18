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
    <input class="volverListUs" type="button" value="Volver" name="Volver" onclick="redirigir('../../Gestiones/GestionarCentros.php')">
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


