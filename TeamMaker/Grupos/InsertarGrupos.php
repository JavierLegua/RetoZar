<?php
session_start();
include "../BBDD/includes/funciones.php";

$conexion=conectarBD();

$grupos = json_decode($_POST["grupos"]);
$curso = $_POST["curso"];

foreach ($grupos as $g) {
    //Insertamos los grupos y despues los participantes del equipo
    $insertarGrupo="insert into EQUIPO values(\"".$curso.$g[0]."\",\"".$g[0]."\",\"".$curso."\" )";
    /* echo "<br>".$insertarGrupo."<br>"; */
    $consulta2=$conexion->prepare($insertarGrupo);
    $consulta2->execute();

    foreach ($g[1] as $alumno) {
        $insertarParticipantesEquipo="insert into ALUMNO_PERTENECE_EQUIPO values(\"".$alumno[1]."\",\"".$curso.$g[0]."\")";
        /* echo $insertarGrupo."<br>".$insertarParticipantesEquipo; */
        $consulta3=$conexion->prepare($insertarParticipantesEquipo);
        $consulta3->execute();
    }
}

header("refresh:0.01;url=profesores");
?>