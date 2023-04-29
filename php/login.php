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
    <link href="../estilos/login.css" rel="stylesheet">
    <script type="text/javascript" src="../funciones/alertas.js"></script>
    <script type="text/javascript" src="../funciones/funciones.js"></script>

    <title>Citas Psicologicas</title>
</head>

<body><img class="fondoItesi" src="../img/ITESI.jpg">
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <div class="encabezado">
                    <h1>INSTITUTO TECNOLOGICO SUPERIOR DE IRAPUATO</h1>
                </div>
            </div>
        </div>
       <div class="container">
            <input id="signup_toggle" type="checkbox">
            <form id="frmLogin" class="form">
                <div class="form_front">
                    <div class="form_details">INICIAR SESIÓN</div>
                    <input id="correoInstLogin" type="email" class="input" placeholder="Correo Institucional" >
                    <input id="contraseñaLogin" type="password" class="input" placeholder="Contraseña">
                    <a id="btnIngresar" class="learn-more" onclick="validaLogin">
                        <span class="circle" aria-hidden="true">
                        <span class="icon arrow"></span>
                        </span>
                        <span class="button-text">Ingresar</span>
                    </a>
                    <span class="switch">¿Aún no tienes cuenta? 
                        <label for="signup_toggle" class="signup_tog">
                            Registrate
                        </label>
                    </span>
                </div>
                <div class="form_back">
                    <div class="form_details">Registrarse</div>
                    <input id="nombreCompletoReg" type="text" class="input" placeholder="Nombre Completo">
                    <input id="edadReg" type="number" min=18  class="input" placeholder="Edad">
                    <input id="correoInstReg" type="email" class="input" placeholder="Número de Control">
                    <input id="carreraReg" type="text" class="input" placeholder="Carrera cursada">
                    <input id="correoInstReg" type="email" class="input" placeholder="Correo Institucional">
                    <input id="contraseñaReg" type="password" class="input" placeholder="Contraseña">
                    <input id="correoPersReg" type="email" class="input" placeholder="Correo Personal">
                    <input id="numCelReg" type="number" class="input" placeholder="Teléfono Celular">
                    <a class="learn-more">
                        <span class="circle" aria-hidden="true">
                        <span class="icon arrow"></span>
                        </span>
                        <span class="button-text">Registrar</span>
                    </a>
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