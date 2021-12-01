<?php

session_start();
include "../../BBDD/includes/funciones.php";

$conexion=conectarBD();

$idCentro = filter_input(INPUT_POST, 'id_Centro') //obtenemos el parametro que mandamos desde la otra pagina

if ($idCentro != '') { //verificamos de nuevo que la opcion sea valida
    if (!$conexion) {
        die("<br>Sin conexion");
    }


    /*Obtenemos los cursos del centro seleccionado*/
    $sql = "SELECT idCurso, Nombre from CURSO where CENTRO_idCentro=".$idCentro;
    $consulta=$conexion->prepare($sql);
    $consulta->execute();

    $cursos=$consulta->fetchAll();

    print_r($cursos);
}
    /**
     * Vamos a generar el codigo html para devolver al select de curso
     */
?>

<option value="">Seleccione un curso</option>
<?php foreach($cursos as $op): //creamos las opciones a partir de los datos obtenidos ?>
<option value="<?= $op['idCurso'] ?>"><?= $op['Nombre'] ?></option>
<?php endforeach; ?>