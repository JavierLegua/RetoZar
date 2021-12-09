<?php

session_start();
include "../../BBDD/includes/funciones.php";

$conexion=conectarBD();

$idCentro = $_POST['codCentro'];



    /*Obtenemos los cursos del centro seleccionado*/
    $sql = "SELECT idCurso, Nombre from CURSO where CENTRO_idCentro=".$idCentro;
    $consulta=$conexion->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    $idCurso = array_unique(array_column($consulta, 'idCurso'));
    $nombreCurso = array_unique(array_column($consulta, 'Nombre'));
  
    $cad="<select name='curso' id='curso' class='crearAdmin2'><option value=''>Seleccione curso</option>";

    foreach ($idCurso as $i => $idCurso) {
        $cad=$cad.'<option value='.$idCurso.'>'.$nombreCurso[$i].'</option>';
    }
    print_r($cad."</select>");


    $conexion = null; 
?>