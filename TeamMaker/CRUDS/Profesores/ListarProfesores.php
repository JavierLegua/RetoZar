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
    <!-- <link rel="stylesheet" href="../../Estilos/Style.css"> -->
    <title>Editar profesores</title>
    <script src="../../Funciones.js"></script>
</head>
<body>
  <table>
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
        echo "<tr>
            <td>".$profesores[$i]->DNI."&nbsp&nbsp&nbsp</td><td>".$profesores[$i]->Rol."&nbsp&nbsp&nbsp</td><td>".$profesores[$i]->nombre."&nbsp&nbsp&nbsp</td><td>&nbsp&nbsp&nbsp <input id=\"editar\" type=\"button\" value=\"x\" name=\"Volver\" onclick=\"redirigir_alumnos('EditarProfesor.php','".$dni."')\"></td><td>&nbsp&nbsp&nbsp <input id=\"eliminar\" type=\"button\" value=\"X\" name=\"Volver\" onclick=\"redirigir_alumnos('BorrarProfesor.php','".$dni."')\"></td></tr>";
      }
    ?>
    </tbody>
  </table>
  <input id="crear" type="button" value="Volver" name="Volver" onclick="redirigir('../../Gestiones/GestionarProfesor.php')">
</body>
</html>


