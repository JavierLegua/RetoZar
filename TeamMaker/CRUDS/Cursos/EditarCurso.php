<?php

//Listamos los alumnos en una tabla html

session_start();
include "../../BBDD/includes/funciones.php";


$conexion=conectarBD();

$idCursoViejo=$_GET['curso'];

$sql = "SELECT * FROM CURSO WHERE idCurso=\"".$idCursoViejo."\"";

$consulta=$conexion->prepare($sql);
$consulta->execute();

$curso=$consulta->fetch();

$idCurso=$curso->idCurso;
$nombre=$curso->Nombre;
$centro=$curso->CENTRO_idCentro;


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
    <h1>Introduce los nuevos datos del curso</h1>
        <form action="ActualizarCurso.php" method="post">
            <input type="text" name="idCurso" id="idCurso" placeholder="<?php echo $idCurso?>" required>         
            <input type="text" name="nombre" id="nombre" placeholder="<?php echo $nombre?>" required>
            <input type="text" name="idCentro" id="idCentro" placeholder="<?php echo $centro?>" required>
            <input id="crear" type="submit" value="Editar" name="Editar" onclick="redirigir(EditarCurso.php)">
    </form>
</body>
</html>