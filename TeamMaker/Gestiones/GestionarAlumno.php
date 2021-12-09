<?php
    session_start();
    include "../BBDD/includes/funciones.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../Estilos/fonts.css">
    <script src="../jquery-latest.js"></script>
    <link rel="stylesheet" href="../Estilos/Style.css">
    <link rel="icon" type="image/x-icon" href="../Estilos/Logo.png">
    <title>Gestionar Alumno</title>
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
        <?php
            $rol = $_SESSION['rol'];
            
            switch ($rol) {
                case 'SuperAdmin':    
                    echo "<div class='menuMovil'>".menuMovil($rol)."</div>";
                break;
                
                case 'Admin':
                    echo "<div class='menuMovil'>".menuMovil($rol)."</div>";
                break;

                case 'Profesor':
                    echo "<div class='menuMovil'>".menuMovil($rol)."</div>";
                break;
            }
        ?>
    </header>

    <main class="GestionAlumno">
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

        echo"<input type='button' value='Añadir alumno' class='Ginput' onclick=\"redirigir('anadirAlumno')\"><br>";
        echo"<input type='button' value='Menu alumnos' class='Ginput' onclick=\"redirigir('listarAlumno')\"><br>";
        echo"<input type='button' value='Volver' class='GinputSalir' onclick=\"redirigir('profesores')\"><br>";
    
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