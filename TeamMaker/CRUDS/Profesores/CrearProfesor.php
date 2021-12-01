<?php

session_start();
include "../../BBDD/includes/funciones.php";

$conexion=conectarBD();


/* Desplegable centro */
$sqlCentro="SELECT idCentro, Nombre from CENTRO";
$consultaCentro=$conexion->prepare($sqlCentro);
$consultaCentro->execute();

$centros=$consultaCentro->fetchAll();

/* print_r($centros); */


/*Desplegable de curso*/
/* $sqlCurso="SELECT idCurso from CURSO";

$consultaCurso=$conexion->prepare($sqlCurso);
$consultaCurso->execute();

$cursos=$consultaCurso->fetchAll(); */


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/Style.css">
    <title>Crear Profesor</title>
    <script src="../../Funciones.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    
    <!--   Comienzo con AJAX   -->
    <!--   Implementamos la libreria de JQUERY -->
    <script type="text/javascript" src="jquery-3.2.0.min.js"></script>

    <!-- Iniciamos el segmento de codigo javascript -->
    <script type="text/javascript">
        $(document).ready(function(){
            var curso = $('#curso');

            //Ejecutar accion al cambiar de opcion en el select de las curso
            $('#centro').change(function(){
                var id_Centro = $(this).val();  //Obtenemos el id seleccionado

                if(id_Centro !== ''){ //Verificamos haber escogido una opcion valida
                    /*Inicio de llamada de AJAX*/
                    $.ajax({
                        data: {id_Centro:id_Centro}, //Variable o parametros a enviar
                        dataType: 'html', //tipo de datos que esperamos de regreso
                        type: 'POST', //mandamos las variables por el metodo post
                        url: 'getCursos.php'  //url que recibe los parametros
                    }).done(function(data){ //metodo que se ejecuta cuando ajax haya completado su ejecucion
                        cursos.html(data); //establecemos el contenido html que regresa ajax
                        cursos.prop('disabled', false); //habilitamos el select
                    });
                    /*fin de la llamada de ajax*/
                }else{ //en caso de no haber seleccionado una opcion valida
                    cursos.val(''); //seleccionar la opcion 'seleccione un curso'
                    discos.prop('disabled', true); //deshabilitamos el select
                } 
            });
        });
    </script>
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

    <main class="crudMainUsuario">
    <?php
        $rol = $_SESSION['rol'];
        
        switch ($rol) {
            case 'SuperAdmin':
                echo"<div class='crear_menu'>".crear_menu($rol)."</div>";   
            break;
            
            case 'Admin':
                echo"<div class='crear_menu'>".crear_menu($rol)."</div>";
            break;
        }
        ?>
        <h1 class="crudH1">Creación de profesores</h1>

        <form method="post" action="insertarProfesor">

            <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="inputUs" required>
            <input type="text" name="DNI" id="DNI" placeholder="DNI" class="inputUs" required>
            <input type="password" name="Clave" id="Clave" placeholder="Clave" onblur="this.value = document.getElementById('DNI').value" class="inputUs" required>
            <input type="text" name="Rol" id="Rol" placeholder="Rol" class="inputUs" required><br><br>

            <select name="centro" id="centro">
                <option value="0">Selecciona un centro</option>
                <?php
                for ($i=0; $i < count($centros) ; $i++) { 
                    echo "<option value=\"".$centros[$i]->idCentro."\">".$centros[$i]->Nombre."</option>";
                }
                
                
                ?>
                
            </select><br><br>

            <select name="curso" id="curso" disabled="">
            <option value="">Seleccione un curso</option>
            
            </select>

           <!--  <script type="text/javascript">
                $(document).ready(function(){

                    recargarLista();

                    $('#centro').change(function(){
                        recargarLista();
                    });
                })
            </script>

            <script type="text/javascript"> 
                function recargarLista(){
                    $.ajax({
                        type:"POST",
                        url:"datos.php",
                        data:"centro=" + $('#centro').val(),
                        success:function(r){
                            $('#curso').html(r);
                        }
                    });
                }

            </script> -->
           <br>
            <?php
                if (isset($situacion)) {
                    switch ($situacion) {
                        case '0':
                            echo "<br><br><p>Usuario ya introducido</p>";
                        break;
                        case '1':
                            echo "<br><br><p>Profesor creado correctamente</p>";
                        break;
                        case '2':
                            echo "<br><br><p>Error al insertar el profesor</p>";
                        break;                        
                        case '3':
                            echo "<br><br><p>Error desconocido</p>";
                        break;
                    }
                }
            ?>
            <input id="crear" type="submit" name="Crear Profesor" class="inputUsEnviar"><br>
            <input id="crear" type="button" value="Volver" name="Volver" onclick="redirigir('gestionarProfesor')" class="inputUsVolver">

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