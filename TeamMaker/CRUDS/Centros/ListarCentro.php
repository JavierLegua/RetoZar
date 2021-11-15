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
    <!-- <link rel="stylesheet" href="../../Estilos/Style.css"> -->
    <title>Editar Centros</title>
    <script src="../../Funciones.js"></script>
</head>
<body>
  <table>
    <thead>
      <tr>
        <td>Id centro</td>
        <td>Nombre</td>
        <td>Direccion</td>
        <td>Editar curso</td>
        <td>Borrar curso</td>
      </tr>
    </thead>
    <tbody>
    <?php
      for ($i=0; $i < count($centro); $i++) { 
        echo "<tr>
            <td>".$centro[$i]->idCentro."&nbsp&nbsp&nbsp</td><td>".$centro[$i]->Nombre."&nbsp&nbsp&nbsp</td><td>".$centro[$i]->Direccion."&nbsp&nbsp&nbsp</td><td>&nbsp&nbsp&nbsp <input id=\"editar\" type=\"button\" value=\"x\" name=\"Volver\" onclick=\"redirigir_centro('EditarCentro.php','".$centro[$i]->idCentro."')\"></td><td>&nbsp&nbsp&nbsp <input id=\"eliminar\" type=\"button\" value=\"X\" name=\"Volver\" onclick=\"redirigir_centro('BorrarCentro.php','".$centro[$i]->idCentro."')\"></td></tr>";
      }
    ?>
    </tbody>
  </table>
  <input id="crear" type="button" value="Volver" name="Volver" onclick="redirigir('../../Gestiones/GestionarCentros.php')">
</body>
</html>


