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
    <link rel="stylesheet" href="../../Estilos/Style.css">
    <title>Editar alumnos</title>
    <script src="../../Funciones.js"></script>
</head>
<body>
  <header>
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
  <table>
    <thead>
      <tr>
        <td>DNI</td>
        <td>Curso</td>
        <td>Nombre</td>
        <td>Editar alumno</td>
        <td>Borrar alumno</td>
      </tr>
    </thead>
    <tbody>
    <?php
      for ($i=0; $i < count($alumnos); $i++) { 
        $dni = $alumnos[$i]->DNI;
        $_SESSION['dni']=$dni;
        echo "<tr>
            <td>".$alumnos[$i]->DNI."&nbsp&nbsp&nbsp</td><td>".$alumnos[$i]->id_curso."&nbsp&nbsp&nbsp</td><td>".$alumnos[$i]->nombre."&nbsp&nbsp&nbsp</td><td>&nbsp&nbsp&nbsp <input id=\"editar\" type=\"button\" value=\"x\" name=\"Volver\" onclick=\"redirigir_alumnos('EditarAlumno.php','".$dni."')\"></td><td>&nbsp&nbsp&nbsp <input id=\"eliminar\" type=\"button\" value=\"X\" name=\"Volver\" onclick=\"redirigir_alumnos('BorrarAlumno.php','".$dni."')\"></td></tr>";
      }
    ?>
    </tbody>
  </table>
  <input id="crear" type="button" value="Volver" name="Volver" onclick="redirigir('../../Gestiones/GestionarAlumno.php')">
  <footer>
    <div id="img_footer0"></div>
    <div id="img_footer1"></div>
    <div id="img_footer2"></div>
    <div id="img_footer3"></div>
    <div id="img_footer4"></div>
    <div id="img_footer5"></div>
  </footer>
</body>
</html>


