<?php

session_start();
include "../../BBDD/includes/funciones.php";

$conexion=conectarBD();

$consultaSQL = "SELECT * FROM ALUMNO";

  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();

  $alumnos = $sentencia->fetch();
  for ($i=0; $i < count($alumnos); $i++) { 
      echo $alumnos[$i]->USUARIO_DNI;
  }

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
            <th>DNI</th>
            <th>Curso</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($alumnos && $sentencia->rowCount() > 0) {
            foreach ($alumnos as $fila) {
              ?>
              <tr>
                <td><?php $DNI=$fila->USUARIO_DNI; echo $DNI; ?></td>
                <td><?php $id=$fila->id_curso; echo $id; ?></td>
              </tr>
              <?php
            }
          }
          ?>
        <tbody>
    </table>

    <input id="crear" type="button" value="Volver" name="Volver" onclick="redirigir('../../Gestiones/GestionarAlumno.php')">
</body>
</html>


