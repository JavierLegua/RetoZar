<?php

    session_start();
    include "../BBDD/includes/funciones.php";

    $conexion=conectarBD();

    $sqlEquipo="select * from EQUIPO";
    
    $consulta1=$conexion->prepare($sqlEquipo);
    $consulta1->execute();

    $equipos=$consulta1->fetchAll();

    $nombreGrupo=$equipos->Nombre;
    $idCurso=$equipos->CURSO_idCurso;
    $idEquipo=$equipos->idEquipo;

    /* echo $idEquipo."hellooooooooo<br><br><br><br><br>"; */
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../Estilos/fonts.css">
    <script src="../jquery-latest.js"></script>
    <link rel="stylesheet" href="../Estilos/Style.css">
    <link rel="icon" type="image/x-icon" href="../Estilos/Logo.png">
    <title>Ver Equipos</title>
    <script src="../Funciones.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
</head>
<body class="listarBody">

   <header class="listarHeader">
            <div id="img_header0"></div>
            <div id="img_header1"></div>
            <div id="img_header2"></div>
            <div id="img_header3"></div>
            <div id="img_header4"></div>
            <div id="img_header5"></div>
            <div id="img_header6"></div>
            <div id="img_header7"></div>
            <div id="img_header8"></div> 
    </header>

    <main>

    <h2>Aquí se muestran los equipos:</h2><br><br>

    <table class="table" id="tableProfesor">
      <thead>
        <tr>
          <td>Nombre</td>
          <td>IdCurso</td>
          <td>Ver participantes</td>
          <td>Borrar Equipos</td>
        </tr>
      </thead>
      <tbody>
      <?php
        for ($i=0; $i < count($equipos); $i++) {
            echo "<tr><td>".$equipos[$i]->Nombre."</td><td>".$equipos[$i]->CURSO_idCurso."</td><td><input class=\"buttonList\" type=\"image\" src=\"../../Estilos/ver_usuarios.png\" value=\"x\" name=\"Volver\" onclick=\"redirigir('verMiembros?idEquipo=".$equipos[$i]->idEquipo."&Nombre=".$equipos[$i]->Nombre."')\"></td><td><input class=\"buttonList\" type=\"image\" src=\"../../Estilos/Eliminar.png\" value=\"x\" name=\"Volver\" onclick=\"redirigir('borrarGrupo?idEquipo=".$equipos[$i]->idEquipo."')\"></td>";
        }
      ?>
     </tbody>
    </table>

    <?php
        echo"<input class='volverListUs' type='button' value='Volver' name='Volver' onclick=\"redirigir('profesores')\">";
    ?>

    </main>

    <footer class="listFoot">
    <div id="img_footer0"></div>
    <div id="img_footer1"></div>
    <div id="img_footer2"></div>
    <div id="img_footer3"></div>
    <div id="img_footer4"></div>
    <div id="img_footer5"></div>
  </footer> 
    
</body>
</html>