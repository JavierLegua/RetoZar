<?php
    session_start();
    include "../BBDD/includes/funciones.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos/Style.css">
    <title>Profesor</title>
    <script src="../Funciones.js"></script>
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
    
    <main class="profesorMain">
    <?php
        $rol = $_SESSION['rol'];
        
        switch ($rol) {
            case 'SuperAdmin':
                echo"<div class='crear_menu'>".crear_menu($rol)."</div>";    
                echo "<div class='menuMovil'>".menuMovil($rol)."</div>";
            break;
            
            case 'Admin':
                echo"<div class='crear_menu'>".crear_menu($rol)."</div>";
                echo "<div class='menuMovil'>".menuMovil($rol)."</div>";
            break;

            case 'Profesor':
                echo"<div class='crear_menu'>".crear_menu($rol)."</div>";
                echo "<div class='menuMovil'>".menuMovil($rol)."</div>";
            break;
        }
    ?>
    
        <h1 class="profesorH1">Bienvenido <?php echo $_SESSION['nombre'] ?></h1>
        <?php

        if ($rol=="Profesor") {
            echo"<input type='button' value='Gestionar alumnos' class='profesor' onclick=\"redirigir('gestionarAlumno')\">";
            echo"<input type='button' value='Equipos sugeridos' class='profesor'><br>";
            echo"<input type='button' value='Salir' class='profesorSalir' onclick=\"redirigir('inicio')\">";
        }elseif ($rol=="Admin") {
            echo"<input type='button' value='Gestionar alumnos' class='profesor' onclick=\"redirigir('/gestionarAlumno')\">";
            echo"<input type='button' value='Equipos sugeridos' class='profesor'><br>";
            echo"<input type='button' value='Volver' class='profesorSalir' onclick=\"redirigir('admins')\">";
        }else{
            echo"<input type='button' value='Gestionar alumnos' class='profesor' onclick=\"redirigir('gestionarAlumno')\">";
            echo"<input type='button' value='Equipos sugeridos' class='profesor'><br>";
            echo"<input type='button' value='Volver' class='profesorSalir' onclick=\"redirigir('superAdmins')\">";
        }
        
        ?>

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