<?php
session_start(); 
include "../funciones.php";

if (isset($_SESSION['rol'])) {
    session_destroy();
    header("refresh:0;url=../index.php");
}

if (isset($_SESSION['completado']) && $_SESSION['completado']==true ) {
    session_destroy();
    header("refresh:0;url=../index.php");
}

if (!isset($_SESSION['primera_vez'])) {
    $_SESSION['primera_vez']=true;
}else{
    $_SESSION['primera_vez']=false;
}


if(isset($_POST['enviar'])){

    header("refresh:0;url=adios.php");

}

$idAlumno=$_SESSION['user'];
$nombre=$_SESSION['nombre'];
$_SESSION['centro']=centroAlumno($idAlumno);
$centro = $_SESSION['centro'];

$conexion=conectarBD();


if ($_SESSION['primera_vez']) {
    $sql="SELECT * FROM preguntas WHERE idPreguntas NOT IN (SELECT preguntas_idPreguntas FROM alumno_has_preguntas WHERE alumno_usuario_idUsuario=$idAlumno)";
    $consulta = $conexion->prepare($sql);
    $consulta->execute();
    $preguntasPorResponder = $consulta->fetchAll();

    if ($consulta->rowCount()==0) {
        $_SESSION['completado']=true;
        header("Location: revisar.php");
    }

    shuffle($preguntasPorResponder);
    $_SESSION['preguntasPorResponder'] =$preguntasPorResponder;


    $_SESSION['i']=0;
    $i=$_SESSION['i'];

    $preguntasRespondidas=[];
    $_SESSION['preguntasRespondidas']=$preguntasRespondidas;


}else {
    $preguntasPorResponder = $_SESSION['preguntasPorResponder'];
    $i=$_SESSION['i'];

    $preguntasRespondidas = $_SESSION['preguntasRespondidas'];
}

if (isset($_POST['siguiente']) && $_POST['siguiente']==$i) {
    $preguntasRespondidas[$i]=$preguntasPorResponder[$i];
    $_SESSION['preguntasRespondidas']=$preguntasRespondidas;

    $idPregunta=$preguntasPorResponder[$i]->idPreguntas;
    $respuesta=$_POST['respuesta'];

    echo "i = ".$i."<br>";
    echo "ID: ".$idPregunta."<br>";
    echo "Nombre: ".$preguntasPorResponder[$i]->enunciado."<br>";
    echo "Respuesta ".$respuesta."%<br>";
    $i++;
    $_SESSION['i']=$i;

    $sql="INSERT INTO alumno_has_preguntas VALUES ('$idAlumno','$idPregunta','$respuesta')";
    echo $sql;

    $consulta = $conexion->prepare($sql);
    $consulta->execute();


}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos/Style.css">
    <script src="../Funciones.js"></script>
    <title>TEST</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
</head>
<body>
    
    <header>
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

    <main class="alumnoMain">
        <h1>AQUI COMIENZA EL TEST</h1>
        <br><br>
        <h2><?php echo $_SESSION['idPregunta']?></h2>
        <br><br>
        <h2><?php echo $_SESSION['enunciado']?></h2>
        <br><br>
        <input type="radio" name="radio" value="VERDADERO" class="radio">
        <label for="verdadero"><strong><h3>VERDADERO</h3></strong></label>
        <input type="radio" name="radio" value="FALSO" class="radio">
        <label for="falso"><strong><h3>FALSO</h3></strong></label><br>
        <br><br>
        <input type="button" name="siguiente" value="Siguiente">
    </main>

    <footer>
        <div id="img_footer0"></div>
        <div id="img_footer1"></div>
        <div id="img_footer2"></div>
        <div id="img_footer3"></div>
        <div id="img_footer4"></div>
        <div id="img_footer5"></div>
    </footer>

</body>
</html>