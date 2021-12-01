<?php

session_start();
include "BBDD/includes/funciones.php";

$conexion=conectarBD();

$centro1=$_POST['centro'];
/* Desplegable centro */
$sqlCentro="SELECT Nombre from CENTRO";
$consultaCentro=$conexion->prepare($sqlCentro);
$consultaCentro->execute();

$centros=$consultaCentro->fetchAll();



/*Desplegable de curso*/
$sqlCurso="SELECT idCurso from CURSO";

$consultaCurso=$conexion->prepare($sqlCurso);
$consultaCurso->execute();

$cursos=$consultaCurso->fetchAll();


$resultado=mysqli_query($conexion,$sqlCentro);

$cadena="<select id='curso' name='curso'>";

while ($ver=mysqli_fetch_row($resultado)){
    $cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[2]).'</option>';
}

echo $cadena."</select>";

?>