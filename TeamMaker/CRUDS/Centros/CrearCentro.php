


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/Style.css">
    <title>Crear centro</title>
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

    </header>

    <main class="crudMain">

        <h1 class="crudH1">Creación de centros</h1>

        <form method="post" action="InsertarBBDDCentro.php">

            <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="inputGr" required><br>
            <input type="text" name="direccion" id="direccion" placeholder="direccion" class="inputGr" required><br>
            <input type="text" name="idCentro" id="idCentro" placeholder="idCentro" class="inputGr" required><br>
            <input id="crear" type="submit" name="Crear Centro" class="inputGrEnviar"><br>
            <input id="crear" type="button" value="Volver" name="Volver" onclick="redirigir('../../Gestiones/GestionarCentro.php')" class="inputGrVolver">

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