<?php
   
    function conectarBD()
        {
            $servidor = "localhost";
            $usuario = "makelele";
            $password = "Makelele123@";
            $baseDatos = "TeamMaker";
            $opciones = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'",
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            );

            try {
                $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $password, $opciones);      
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Conexión realizada Satisfactoriamente";
                return $conexion;
              }
         
          catch(PDOException $e)
              {
              echo "La conexión ha fallado: " . $e->getMessage();
              die();
              }
         

        }

?>

