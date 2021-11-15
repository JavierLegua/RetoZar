<?php

//Listamos los alumnos en una tabla html

session_start();
include "../../BBDD/includes/funciones.php";


$conexion=conectarBD();

$idCentroViejo=$_GET['centro'];

$sql = "SELECT * FROM CENTRO WHERE idCentro=\"".$idCentroViejo."\"";

$consulta=$conexion->prepare($sql);
$consulta->execute();

$centro=$consulta->fetch();

$idCentro=$centro->idCentro;
$nombre=$centro->Nombre;
$direccion=$centro->Direccion;


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../../Estilos/Style.css"> -->
    <title>Editar Curso</title>
    <script src="../../Funciones.js"></script>
</head>
<body>
    <h1>Introduce los nuevos datos del centro</h1>
        <form action="ActualizarCentro.php" method="post">
            <input type="text" name="idCentro" id="idCentro" placeholder="<?php echo $idCentro?>" required>         
            <input type="text" name="nombre" id="nombre" placeholder="<?php echo $nombre?>" required>
            <input type="text" name="direccion" id="direccion" placeholder="<?php echo $direccion?>" required>
            <input id="crear" type="submit" value="Editar" name="Editar" onclick="redirigir(EditarCentro.php)">
    </form>
</body>
</html>