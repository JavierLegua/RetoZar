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
        
    </header>

    <main>
        <h1>Bienvenido a TeamMaker</h1>

        <FORm:post id="form" name="form">
            <P id="dni_error"></P>
            <input id="usuario" type="text" name="Usuario / DNI" pattern="[0-9]{8}[A-Z]{1}" title="Asegurese de escribir el DNI correctamente" onblur="comprobarDni(this.value)" placeholder="Usuario/DNI"><br>
            <P id="password_error"></P>  
            <input id="password" type="password" name="Contraseña" pattern="[0-9]{8}[A-Z]{1}" title="Asegurese que coincida" placeholder="Contraseña"><br>
            <input id="hola" type="submit" name="Entrar" onclick="comprobarPass(document.getElementById('password').value, document.getElementById('usuario').value)" value="Acceder"> 
        </FORm:post>
    </main> 
    <footer>

    </footer>
</body>
</html>