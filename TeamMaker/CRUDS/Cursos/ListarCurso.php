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
    <!-- <link rel="stylesheet" href="../../Estilos/Style.css"> -->
    <title>Editar Cursos</title>
    <script src="../../Funciones.js"></script>
</head>
<body>
  <table>
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
            <td>".$curso[$i]->idCurso."&nbsp&nbsp&nbsp</td><td>".$curso[$i]->Nombre."&nbsp&nbsp&nbsp</td><td>".$curso[$i]->CENTRO_idCentro."&nbsp&nbsp&nbsp</td><td>&nbsp&nbsp&nbsp <input id=\"editar\" type=\"button\" value=\"x\" name=\"Volver\" onclick=\"redirigir_curso('EditarCurso.php','".$curso[$i]->idCurso."')\"></td><td>&nbsp&nbsp&nbsp <input id=\"eliminar\" type=\"button\" value=\"X\" name=\"Volver\" onclick=\"redirigir_curso('BorrarCurso.php','".$curso[$i]->idCurso."')\"></td></tr>";
      }
    ?>
    </tbody>
  </table>
  <input id="crear" type="button" value="Volver" name="Volver" onclick="redirigir('../../Gestiones/GestionarCurso.php')">
</body>
</html>


