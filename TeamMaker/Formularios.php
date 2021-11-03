<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="Formularios.js"></script>
    <title>Formularios</title>
</head>
<body>
<header>
    <h1>FORMULARIOS</h1>
    </header>
    <main>
        <FORm:post id="alumno" name="alumno">
            <!-- <P id="ejemplo"></P> -->
            <label for="Dni"></label>
            <input id="usuario" type="text" name="Usuario / DNI" pattern="[0-9]{8}[A-Z]{1}" title="El DNI no es correcto" onblur="comprobarDni(this.value)" value="DNI : ">
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