<?php









//Insertamos los grupos y despues los participantes del equipo
$insertarGrupo="insert into EQUIPO values(\"".$curso.$g[0]."\",\"".$g[0]."\",\"".$curso."\" )";
$consulta2=$conexion->prepare($insertarGrupo);
$consulta2->execute();

$insertarParticipantesEquipo="insert into ALUMNO_PERTENECE_EQUIPO values(\"".$alumno[1]."\",\"".$curso.$g[0]."\")";
/* echo $insertarGrupo."<br>".$insertarParticipantesEquipo; */
$consulta3=$conexion->prepare($insertarParticipantesEquipo);
$consulta3->execute();


?>