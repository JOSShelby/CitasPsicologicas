<?php 
    // session_start();
    // //esto no deja que si hay una sesion activa regrese al menu de registro
    // if(isset($_SESSION['alumno'])){
    //    header("location: ./VentanaAlumno.php");
    // }
?>  

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Limpiar cache -->
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../estilos/boostrap.css" rel="stylesheet">
    <link href="../estilos/estilosGenerales.css" rel="stylesheet">
    <script type="text/javascript" src="../funciones/alertas.js"></script>
    <script type="text/javascript" src="../funciones/funciones.js"></script>

    <title>Citas Psicologicas</title>
</head>
<body>
    <img class="fondoItesi" src="../img/ITESI.jpg">
    <div class="todoBody">
        <div class="encabezado">
            <h1>INSTITUTO TECNOLOGICO SUPERIOR DE IRAPUATO</h1>
        </div>
            <div class="container">
            <input id="signup_toggle" type="checkbox">
            <form class="form">
                <div class="form_front">
                    <div class="form_details">INICIAR SESIÓN</div>
                    <input type="text" class="input" placeholder="Numero de control" required="">
                    <input type="password" class="input" placeholder="Contraseña" required="">
                    <button class="learn-more">
                        <span class="circle" aria-hidden="true">
                        <span class="icon arrow"></span>
                        </span>
                        <span class="button-text">Ingresar</span>
                    </button>
                    <span class="switch">¿Aún no tienes cuenta? 
                        <label for="signup_toggle" class="signup_tog">
                            Registrate
                        </label>
                    </span>
                </div>
                <div class="form_back">
                    <div class="form_details">Registrarse</div>
                    <input type="text" class="input" placeholder="Firstname">
                    <input type="text" class="input" placeholder="Username">
                    <input type="text" class="input" placeholder="Password">
                    <input type="text" class="input" placeholder="Confirm Password">
                    <button class="learn-more">
                        <span class="circle" aria-hidden="true">
                        <span class="icon arrow"></span>
                        </span>
                        <span class="button-text">Registrar</span>
                    </button>
                    <span class="switch">¿Ya tienes una cuenta? 
                        <label for="signup_toggle" class="signup_tog">
                            Inicia Sesion
                        </label>
                    </span>
                </div>
            </form>
        </div> 
    </div>
</body>

