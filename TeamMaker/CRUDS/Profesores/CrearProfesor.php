<?php

session_start();
include "../../BBDD/includes/funciones.php";

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/fonts.css">
    <script src="../../jquery-latest.js"></script>
    <link rel="stylesheet" href="../../Estilos/Style.css">
    <title>Crear Profesor</title>
    <script src="../../Funciones.js"></script>
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
                    echo menuMovil($rol);    
                break;
                
                case 'Admin':
                    echo menuMovil($rol);
                break;
            }
    ?>
    </header>

    <main class="crudMainUsuario">
    <?php
            $rol = $_SESSION['rol'];
            switch ($rol) {
                case 'SuperAdmin':
                    echo"<div class='crear_menu'>".crear_menu($rol)."</div>";    
                break;
                
                case 'Admin':
                    echo"<div class='crear_menu'>".crear_menu($rol)."</div>";
                break;
            }
    ?>
        <h1 class="crudH1">Creación de profesores</h1>

        <form method="post" action="insertarProfesor">

            <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="inputUs" required>
            <input type="text" name="DNI" id="DNI" placeholder="DNI" class="inputUs" required>
            <input type="password" name="Clave" id="Clave" placeholder="Clave" onblur="this.value = document.getElementById('DNI').value" class="inputUs" required>
            <input type="text" name="Rol" id="Rol" placeholder="Rol" class="inputUs" required><br>
            <?php
                if (isset($situacion)) {
                    switch ($situacion) {
                        case '0':
                            echo "<br><br><p>Usuario ya introducido</p>";
                        break;
                        case '1':
                            echo "<br><br><p>Profesor creado correctamente</p>";
                        break;
                        case '2':
                            echo "<br><br><p>Error al insertar el profesor</p>";
                        break;                        
                        case '3':
                            echo "<br><br><p>Error desconocido</p>";
                        break;
                    }
                }
            ?>
            <input id="crear" type="submit" name="Crear Profesor" class="inputUsEnviar"><br>
            <input id="crear" type="button" value="Volver" name="Volver" onclick="redirigir('gestionarProfesor')" class="inputUsVolver">

        </form>

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