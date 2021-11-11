<?php

session_start();
include "../../BBDD/includes/funciones.php";

$dni = $_GET['dni'];

$conexion=conectarBD();

$sql = "SELECT USUARIO.DNI as DNI, USUARIO.NOMBRE as nombre, ALUMNO.id_curso as id_curso FROM ALUMNO, USUARIO WHERE ALUMNO.USUARIO_DNI=USUARIO.DNI and ALUMNO.USUARIO_DNI=\"".$dni."\"";

$consulta=$conexion->prepare($sql);
$consulta->execute();

$alumnos=$consulta->fetch();

$dni=$alumnos->DNI;
$nombre=$alumnos->nombre;
$curso=$alumnos->id_curso;


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../../Estilos/Style.css"> -->
    <title>Editar alumno</title>
    <script src="../../Funciones.js"></script>
</head>
<body>
    <h1>Introduce los nuevos datos del alumno</h1>
        <form action="" method="post">
            <input type="text" name="nombre" id="nombre" placeholder="<?php echo $nombre?>" required>         
            <input type="text" name="DNI" id="DNI" placeholder="<?php echo $dni?>" required>
            <input type="password" name="Clave" id="Clave" placeholder="Clave" onblur="this.value = document.getElementById('DNI').value" required>
            <input type="text" name="curso" id="curso" placeholder="<?php echo $curso?>" required>
            <input id="crear" type="submit" value="Editar" name="Editar" onclick="redirigir('ActualizarAlumno.php')">
    </form>
</body>
</html>