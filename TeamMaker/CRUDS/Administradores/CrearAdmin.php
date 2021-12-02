<?php

session_start();
include "../../BBDD/includes/funciones.php";

$conexion=conectarBD();


/* Desplegable centro */
$sqlCentro="SELECT idCentro, Nombre from CENTRO";
$consultaCentro=$conexion->prepare($sqlCentro);
$consultaCentro->execute();

$centros=$consultaCentro->fetchAll();


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/Style.css">
    <title>Crear Administrador</title>
    <script src="../../Funciones.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
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
            echo menuMovil('SuperAdmin');
        ?>
    </header>

    <main class="crudMainUsuario">
    <?php
        echo"<div class='crear_menu'>".crear_menu('SuperAdmin')."</div>";
    ?>
        <h1 class="crudH1">Creación de administradores</h1>

        <form method="post" action="insertarAdmin">

            <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="inputUs" required>
            <input type="text" name="DNI" id="DNI" placeholder="DNI" class="inputUs" required>
            <input type="password" name="Clave" id="Clave" placeholder="Clave" onblur="this.value = document.getElementById('DNI').value" class="inputUs" required>
            <input type="text" name="Rol" id="Rol" placeholder="Rol" onblur="this.value = 'Admin'" class="inputUs" required><br>

            <select name="centro" id="centro">
                <option value="0">Selecciona un centro</option>
                <?php
                for ($i=0; $i < count($centros) ; $i++) { 
                    echo "<option value=\"".$centros[$i]->idCentro."\">".$centros[$i]->Nombre."</option>";
                }
                
                
                ?>
                
            </select><br><br>
            <div id="clase"></div>
            
            </select>

            <?php 
                $situacion = $_GET['situacion'];
                if (isset($situacion)) {
                    switch ($situacion) {
                        case '0':
                            echo "<br><br><p>Usuario ya introducido</p>";
                        break;
                        case '1':
                            echo "<br><br><p>Administrador creado correctamente</p>";
                        break;
                        case '2':
                            echo "<br><br><p>Error al insertar el administrador</p>";
                        break;                        
                        case '3':
                            echo "<br><br><p>Error desconocido</p>";
                        break;
                    }
                }
            ?>
            <input id="crear" type="submit" name="Crear Admin" class="inputUsEnviar"><br>
            <input id="crear" type="button" value="Volver" name="Volver" onclick="redirigir('gestionAdmin')" class="inputUsVolver">

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

<script type="text/javascript">
    $(document).ready(function () {
            $('#centro').val(0);
            recargarCurso();

            $('#centro').change(function () {
                recargarCurso();
            });
    })

    function recargarCurso() {
        $.ajax({
            type: "POST",
            url: "obtenerCurso",
            data: "codCentro=" + $('#centro').val(),
            success: function (r) {
                $('#clase').html(r);
            }
        });
    }
    </script>