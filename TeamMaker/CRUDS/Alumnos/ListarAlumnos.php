<?php

session_start();
include "../../BBDD/includes/funciones.php";

$conexion=conectarBD();

$curso=$_POST['curso'];


$sql = "SELECT USUARIO.DNI as DNI, USUARIO.NOMBRE as nombre, ALUMNO.id_curso as id_curso FROM ALUMNO, USUARIO WHERE ALUMNO.USUARIO_DNI=USUARIO.DNI AND id_curso=\"".$curso."\"";

$consulta=$conexion->prepare($sql);
$consulta->execute();

$alumnos=$consulta->fetchAll();


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/fonts.css">
    <script src="../../jquery-latest.js"></script>
    <link rel="stylesheet" href="../../Estilos/Style.css">
    <link rel="icon" type="image/x-icon" href="../../Estilos/Logo.png">
    <title>Editar alumnos</title>
    <script src="../../Funciones.js"></script>
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
    <?php
      $rol = $_SESSION['rol'];
      switch ($rol) {
          case 'SuperAdmin': 
            echo menuMovil($rol);  
          break;
            
          case 'Admin':
            echo menuMovil($rol);
          break;

          case 'Profesor':
            echo menuMovil($rol);
          break;
      }
      ?>
  </header>

  <div class="listAlumno">
    <?php
      $rol = $_SESSION['rol'];
      switch ($rol) {
          case 'SuperAdmin':
            echo"<div class='crear_menu'>".crear_menu($rol)."</div>";  
          break;
            
          case 'Admin':
            echo"<div class='crear_menu'>".crear_menu($rol)."</div>";
          break;

          case 'Profesor':
            echo"<div class='crear_menu'>".crear_menu($rol)."</div>";
          break;
      }

    echo"<form id='especialFormAlumno' action='listarAlumno' method='post'>";
    

      $dniProfesor= $_SESSION['usuario'];

      /* echo "****************";
      echo $curso;
      echo "****************"; */
      $sqlCurso="SELECT CURSO_idCurso from pertenece WHERE PROFESOR_USUARIO_DNI=\"".$dniProfesor."\"";
      $consultaCurso=$conexion->prepare($sqlCurso);
      $consultaCurso->execute();

      $cursos=$consultaCurso->fetchAll();


      /* print_r($cursos); */
  
    ?>

    <select name="curso" id="curso">
      
      <option value="0">Seleccione curso</option>
      <?php
      
      for ($i=0; $i < count($cursos); $i++) { 
        echo "<option value=\"".$cursos[$i]->CURSO_idCurso."\">".$cursos[$i]->CURSO_idCurso."</option>";
      }
      
      ?>

      <br>
    </select>
    
    <?php
    echo "<input type='submit' class='buttonList3' value='Ver clase' onclick=\"redirigir('listarAlumno?curso=".$curso."')\">";
    ?>

    </form>
  
    <table class="table" id="tableAlumno">
      <thead>
        <tr>
          <td>DNI</td>
          <td>Curso</td>
          <td>Nombre</td>
          <td>Editar alumno</td>
          <td>Borrar alumno</td>
          <td>Ver respuestas</td>
        </tr>
      </thead>
      <tbody>
      <?php
        for ($i=0; $i < count($alumnos); $i++) { 
          $dni = $alumnos[$i]->DNI;
          $_SESSION['dni']=$dni;
          $_SESSION['curso']=$curso;
          echo "<tr><td>".$alumnos[$i]->DNI."</td><td>".$alumnos[$i]->id_curso."</td><td>".$alumnos[$i]->nombre."</td><td><input class=\"buttonList\" type=\"image\" src=\"../../Estilos/Editar.png\" value=\"x\" name=\"Volver\" onclick=\"redirigir_alumnos('editarAlumno?dni=".$dni."')\"></td><td><input class=\"buttonList\" type=\"image\" src=\"../../Estilos/Eliminar.png\" value=\"x\" name=\"Volver\" onclick=\"redirigir_alumnos('borrarAlumno?dni=".$dni."')\"></td>
              <td><input class=\"buttonList\" type=\"image\" src=\"../../Estilos/ver_usuarios.png\" value=\"x\" name=\"Volver\" onclick=\"redirigir_alumnos('mostrarResultadosAlumno?dni=".$dni."')\"></td></tr>";
        }
      ?>
      </tbody>
    </table>
    <?php 
      echo "<input class=\"buttonList2\" type=\"button\" value=\"ver respuestas del curso\" name=\"Volver\" onclick=\"redirigir('mostrarResultados?curso=".$curso."')\"><br>";
    ?>
      <?php 
      $situacion = $_GET['situacion'];
      if (isset($situacion)) {
        switch ($situacion) {
          case '0':
            echo "<br><br><p>Error al editar el alumno</p>";
          break;
          case '1':
            echo "<br><br><p>Alumno editado correctamente</p>";
          break;
          case '2':
            echo "<br><br><p>Alumno borrado correctamente</p>";
          break;
          case '3':
            echo "<br><br><p>Error al borrar el alumno</p>";
          break;
        }
      }
    ?>
    <?php
    echo"<input class='volverListUs' type='button' value='Volver' name='Volver' onclick=\"redirigir('gestionarAlumno')\">";
    ?>
  </div>
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
