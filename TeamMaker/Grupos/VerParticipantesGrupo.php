

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../Estilos/fonts.css">
    <script src="../jquery-latest.js"></script>
    <link rel="stylesheet" href="../Estilos/Style.css">
    <link rel="icon" type="image/x-icon" href="../Estilos/Logo.png">
    <title>Ver participantes Equipos</title>
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
        <?php
            session_start();
            include "../BBDD/includes/funciones.php";

            $conexion=conectarBD();

            $idEquipo=$_GET['idEquipo'];
            
            $sqlVerParticipantes="SELECT ALUMNO_PERTENECE_EQUIPO.ALUMNO_DNI as Dni, ALUMNO_PERTENECE_EQUIPO.GRUPO as Grupo, USUARIO.Nombre as Nombre FROM ALUMNO_PERTENECE_EQUIPO, USUARIO where
            ALUMNO_PERTENECE_EQUIPO.GRUPO='$idEquipo' AND ALUMNO_PERTENECE_EQUIPO.ALUMNO_DNI = USUARIO.DNI";
            /* echo $sqlVerParticipantes; */
            $consulta=$conexion->prepare($sqlVerParticipantes);
            $consulta->execute(); 

            $equipos1=$consulta->fetchAll();

            $dniAlum=$equipos1->Dni;

            $grupo=$equipos1->Grupo;

            $nombreAlum=$equipos1->Nombre;


            for ($i=0; $i < count($equipos1); $i++) {

                
                echo $equipos1[$i]->Nombre."<br><br><br><br><br>"; 
            }
 
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
