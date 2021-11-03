<!DOCTYPE html>
<!-- <html lang="en"> -->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página de inicio</title>
    <script src="Login.js"></script>
    <link rel="stylesheet" href="Login.css">
</head>
<body>
    
    <header>
        <h1>Bienvenido a TeamMaker</h1>
    </header>

    <main>
        
        <FORm:post id="form" name="form">
            <P id="dni_error"></P>
            <label for="usuario">Usuario : </label>
            <input id="usuario" type="text" name="Usuario / DNI" pattern="[0-9]{8}[A-Z]{1}" title="El DNI no es correcto" onblur="comprobarDni(this.value)">
            <br><br>
            <P id="password_error"></P>
            <label for="password">Contraseña : </label>  
            <input id="password" type="password" name="Contraseña" pattern="[0-9]{8}[A-Z]{1}" title="La contraseña es correcta">
            <br><br><br>
            <input id="hola" type="submit" name="Entrar" onclick="comprobarPass(document.getElementById('password').value, document.getElementById('usuario').value)">
        </FORm:post>
    </main> 
    <footer>

    </footer>
</body>
</html>