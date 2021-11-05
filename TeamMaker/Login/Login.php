<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página de inicio</title>
    <script src="Login.js"></script>
    <link rel="stylesheet" href="Login.css">
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

    <main>
        <h1>Bienvenido a TeamMaker</h1>

        <FORm:post id="form" name="form">
            
            <input id="usuario" type="text" name="Usuario / DNI" pattern="[0-9]{8}[A-Z]{1}" title="Asegurese de escribir el DNI correctamente" onblur="comprobarDni(this.value)" placeholder="Usuario/DNI">
            <p id="dni_error"></p>
            <input id="password" type="password" name="Contraseña" pattern="[0-9]{8}[A-Z]{1}" title="Asegurese que coincida" placeholder="Contraseña">
            <p id="password_error"></p> 
            <input id="acceder" type="submit" name="Entrar" onclick="comprobarPass(document.getElementById('password').value, document.getElementById('usuario').value)" value="Acceder"> 
        </FORm:post>
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