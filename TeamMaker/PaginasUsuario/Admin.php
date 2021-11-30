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
    <title>Administrador centro</title>
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

    <main class="mainAdmin">
   
        <?php
        $rol = $_SESSION['rol'];

        switch ($rol) {
            case 'SuperAdmin':
                echo"<div class='crear_menu'>".crear_menu($rol)."</div>";  
                /* echo "<div class='menuMovil'>".menuMovil($rol)."</div>"; */  
            break;
            
            case 'Admin':
                echo"<div class='crear_menu'>".crear_menu($rol)."</div>";
                /* echo "<div class='menuMovil'>".menuMovil($rol)."</div>";  */
            break;
        }
        ?>
        <h1 class="adminH1">Bienvenido <?php echo $_SESSION['nombre'] ?></h1>
        <?php

        if ($rol=="Admin") {
            echo"<input type='button' value='Gestionar profesores' class='admin' onclick=\"redirigir('gestionarProfesor')\">";
            echo"<input type='button' value='Gestionar cursos' class='admin' onclick=\"redirigir('gestionarCurso')\"><br>";
            echo"<input type='button' value='Funciones de profesor' class='admin' onclick=\"redirigir('profesores')\"><br>";
            echo"<input type='button' value='Salir' class='adminSalir' onclick=\"redirigir('inicio')\">";
        }else{
            echo"<input type='button' value='Gestionar profesores' class='admin' onclick=\"redirigir('gestionarProfesor')\">";
            echo"<input type='button' value='Gestionar cursos' class='admin' onclick=\"redirigir('gestionarCurso')\"><br>";
            echo"<input type='button' value='Funciones de profesor' class='admin' onclick=\"redirigir('profesores')\"><br>";
            echo"<input type='button' value='Volver' class='adminSalir' onclick=\"redirigir('superAdmins')\">";
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