<?php

//Listamos los alumnos en una tabla html

session_start();
include "../../BBDD/includes/funciones.php";

$dni = $_GET['dni'];

$_SESSION['DNI_VIEJO']=$dni;

$conexion=conectarBD();

$sql = "SELECT USUARIO.DNI as DNI, USUARIO.NOMBRE as nombre, PROFESOR.Rol as Rol FROM PROFESOR, USUARIO WHERE PROFESOR.USUARIO_DNI=USUARIO.DNI and PROFESOR.USUARIO_DNI=\"".$dni."\"";

$consulta=$conexion->prepare($sql);
$consulta->execute();

$profesores=$consulta->fetch();

$dni=$profesores->DNI;
$nombre=$aluprofesoresmnos->nombre;
$rol=$profesores->Rol;


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../../Estilos/Style.css"> -->
    <title>Editar profesor</title>
    <script src="../../Funciones.js"></script>
</head>
<body>
    <h1>Introduce los nuevos datos del profesor</h1>
        <form action="ActualizarProfesor.php" method="post">
            <input type="text" name="nombre" id="nombre" placeholder="<?php echo $nombre?>" required>         
            <input type="text" name="DNI" id="DNI" placeholder="<?php echo $dni?>" required>
            <input type="password" name="Clave" id="Clave" placeholder="Clave" onblur="this.value = document.getElementById('DNI').value" required>
            <input type="text" name="Rol" id="Rol" placeholder="<?php echo $rol?>" required>
            <input id="crear" type="submit" value="Editar" name="Editar" onclick="redirigir_alumnos(EditarProfesor.php,<?php $dni?>)">
    </form>
</body>
</html>