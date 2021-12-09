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
    <link rel="icon" type="image/x-icon" href="../../Estilos/Logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <title>Crear Alumno</title>
    <script src="../../Funciones.js"></script>
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

                case 'Profesor':
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

                case 'Profesor':
                    echo"<div class='crear_menu'>".crear_menu($rol)."</div>";
                break;
            }
    ?>
        <h1 class="crudH1">Creación de alumnos</h1>

        <form method="post" action="insertarAlumno">
            <?php
            echo"<input type='text' name='nombre' id='nombre' placeholder='Nombre' class='inputUs' required>";
            echo"<input type='text' name='DNI' id='DNI' placeholder='DNI' class='inputUs' onfocusout='comprobacionDni()' required>";
            echo"<input type='password' name='Clave' id='Clave' placeholder='Clave' onblur=\"this.value = document.getElementById('DNI').value\" class='inputUs' required>";
            echo"<input type='text' name='curso' id='curso' placeholder='Curso' class='inputUs' required><br>";
 
                $situacion = $_GET['situacion'];
                if (isset($situacion)) {
                    switch ($situacion) {
                        case '0':
                            echo "<br><br><p>Usuario ya introducido</p>";
                        break;
                        case '1':
                            echo "<br><br><p>Alumno creado correctamente</p>";
                        break;
                        case '2':
                            echo "<br><br><p>Error al insertar el alumno</p>";
                        break;                        
                        case '3':
                            echo "<br><br><p>Error desconocido</p>";
                        break;
                    }
                }
        
                echo"<input id='crear' type='submit' name='Crear Alumno' class='inputUsEnviar'><br>";
                echo"<input id='crear' type='button' value='Volver' name='Volver' onclick=\"redirigir('gestionarAlumno')\" class='inputUsVolver'>";

            ?>

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