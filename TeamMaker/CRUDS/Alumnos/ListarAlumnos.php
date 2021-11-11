<?php

session_start();
include "../../BBDD/includes/funciones.php";

$conexion=conectarBD();

$sql = "SELECT USUARIO.DNI as DNI, USUARIO.NOMBRE as nombre, ALUMNO.id_curso as id_curso FROM ALUMNO, USUARIO WHERE ALUMNO.USUARIO_DNI=USUARIO.DNI";

$consulta=$conexion->prepare($sql);
$consulta->execute();

$alumnos=$consulta->fetchAll();


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar alumnos</title>
    <script src="../../Funciones.js"></script>
</head>
<body>
  <table>
    <thead>
      <tr>
        <td>DNI</td>
        <td>Curso</td>
        <td>Nombre</td>
      </tr>
    </thead>
    <tbody>
    <?php
      for ($i=0; $i < count($alumnos); $i++) { 
        echo "<tr>
            <td>".$alumnos[$i]->DNI."&nbsp&nbsp&nbsp</td><td>".$alumnos[$i]->id_curso."&nbsp&nbsp&nbsp</td><td>".$alumnos[$i]->nombre."&nbsp&nbsp&nbsp</td></tr><br>";
      }
    ?>
    </tbody>
  </table>
  <input id="crear" type="button" value="Volver" name="Volver" onclick="redirigir('../../Gestiones/GestionarAlumno.php')">
</body>
</html>


