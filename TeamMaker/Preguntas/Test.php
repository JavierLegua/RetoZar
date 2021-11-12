<?php
session_start();
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
        <input type="button" name="Siguiente" value="Siguiente" onclick="siguientePregunta()">
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