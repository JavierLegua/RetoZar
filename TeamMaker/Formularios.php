<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="Funciones.js"></script>
    <title>Formularios</title>
</head>
<body>
<header>
    <h1>FORMULARIOS</h1>
    </header>
    <main>
        <FORm:post id="alumno" name="alumno">
            <p id="errorDni"></p>
            <input id="dni" type="text" name="Usuario / DNI" pattern="[0-9]{8}[A-Z]{1}" title="El DNI debe cumplir con el formato correcto" placeholder="dni" required>
            <br><br>
            <input id="password" type="password" name="Contraseña" placeholder="contraseña (auto-generada)" onblur="this.value = document.getElementById('dni').value" required>
            <br><br>
            <input id="name" type="text" name="Nombre" pattern="[A-Za-z]{2,}" title="El nombre solo puede contener letras" placeholder="nombre" required>
            <br><br>
            <input id="fecha_nac" type="date" name="Fecha de nacimiento" required>
            <br><br>
            <input id="crear" type="submit" name="Crear Alumno" onclick="comprobacionDni(document.getElementById('dni').value)" onclick="comprobacionPass(document.getElementById('dni').value)">
        </FORm:post>
    </main> 
    <footer>

    </footer>
</body>
</html>