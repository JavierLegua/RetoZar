
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Página de inicio</title>
    <script src="Login.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/Estilos/Logo.png">
    <link rel="stylesheet" href="../Estilos/Style.css">
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

    <main>
        <h1>Bienvenido a TeamMaker</h1>

        <form id="form" action="BBDD/iniciarSesion.php" name="form" method="POST">
            
            <input id="usuario" type="text" name="DNI" title="Asegurese de escribir el DNI correctamente"  placeholder="Usuario/DNI">
            <p id="dni_error"></p>
            <input id="password" type="password" name="clave" title="Asegurese que coincida" placeholder="Contraseña">
            <p id="password_error"></p> 
            <input id="acceder" type="submit" name="Entrar" value="Acceder"> 
            <!--
                pattern="[0-9]{8}[A-Z]{1}"
                onblur="comprobarDni(this.value)"
                onclick="comprobarPass(document.getElementById('password').value, document.getElementById('usuario').value)"
                
            -->
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
