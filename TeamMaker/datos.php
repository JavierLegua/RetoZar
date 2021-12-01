<?php

session_start();
include "BBDD/includes/funciones.php";

$conexion=conectarBD();

$centro1=$_POST['centro'];

$sqlCentroCurso="SELECT CENTRO.Nombre, CURSO.idCurso from CENTRO, CURSO WHERE CENTRO.Nombre = '$centro1'";
$resultado=mysqli_query($conexion,$sqlCentroCurso);
$cadena="<select id='curso' name='curso'>";

while ($ver=mysqli_fetch_row($resultado)){
    $cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[2]).'</option>';
}

echo $cadena."</select>";

?>