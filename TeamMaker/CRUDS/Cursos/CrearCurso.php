


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/Style.css">
    <title>Crear Curso</title>
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

    </header>

    <main class="crudMain">

        <h1>Creación de alumnos</h1>

        <form method="post" action="InsertarBBDDCurso.php">

            <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
            <input type="text" name="idCurso" id="idCurso" placeholder="idCurso" required>
            <input type="text" name="idCentro" id="idCentro" placeholder="idCentro" required>
            <input id="crear" type="submit" name="Crear Curso">
            <input id="crear" type="button" value="Volver" name="Volver" onclick="redirigir('../../Gestiones/GestionarCurso.php')">

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