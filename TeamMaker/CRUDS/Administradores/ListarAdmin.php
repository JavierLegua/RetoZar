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
    <!-- <link rel="stylesheet" href="../../Estilos/Style.css"> -->
    <title>Editar administradores</title>
    <script src="../../Funciones.js"></script>
</head>
<body>
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
            <td>".$admins[$i]->DNI."&nbsp&nbsp&nbsp</td><td>".$admins[$i]->nombre."&nbsp&nbsp&nbsp</td><td>&nbsp&nbsp&nbsp <input id=\"editar\" type=\"button\" value=\"x\" name=\"Volver\" onclick=\"redirigir_alumnos('EditarAdmin.php','".$dni."')\"></td><td>&nbsp&nbsp&nbsp <input id=\"eliminar\" type=\"button\" value=\"X\" name=\"Volver\" onclick=\"redirigir_alumnos('BorrarAdmin.php','".$dni."')\"></td></tr>";
      }
    ?>
    </tbody>
  </table>
  <input id="crear" type="button" value="Volver" name="Volver" onclick="redirigir('../../Gestiones/GestionarAdmin.php')">
</body>
</html>


