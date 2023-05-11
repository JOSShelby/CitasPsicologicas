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

    <link href="/citasPsicologicas/estilos/boostrap.css" rel="stylesheet">
    <link href="/citasPsicologicas/estilos/login.css" rel="stylesheet">
    <script type="text/javascript" src="/citasPsicologicas/funciones/alertas.js"></script>
    <script type="text/javascript" src="/citasPsicologicas/funciones/funciones.js"></script>

    <title>Citas Psicologicas</title>
</head>

<body><img class="fondoItesi" src="/citasPsicologicas/img/ITESI.jpg">
    <div class="container">
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <div class="encabezado">
                        <h1>INSTITUTO TECNOLOGICO SUPERIOR DE IRAPUATO</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form class="form" id="frmLoginPsi" autocomplete="off">
                        <p class="heading">INICIAR SESION</p>
                        <div class="row">
                            <div class="f-control">
                                <input id="correoInstLogin" type="text" required="" title="ej. ejemplo@hotmail.com">
                                <label>
                                    <span style="transition-delay:0ms">C</span>
                                    <span style="transition-delay:30ms">o</span>
                                    <span style="transition-delay:60ms">r</span>
                                    <span style="transition-delay:90ms">r</span>
                                    <span style="transition-delay:120ms">e</span>
                                    <span style="transition-delay:150ms">o</span>
                                    <span style="transition-delay:180ms"> </span>
                                    <span style="transition-delay:210ms">p</span>
                                    <span style="transition-delay:240ms">e</span>
                                    <span style="transition-delay:270ms">r</span>
                                    <span style="transition-delay:300ms">s</span>
                                    <span style="transition-delay:330ms">o</span>
                                    <span style="transition-delay:360ms">n</span>
                                    <span style="transition-delay:390ms">a</span>
                                    <span style="transition-delay:420ms">l</span>
                                </label>
                            </div>
                            <div class="f-control">
                                <input id="contraseñaLogin" type="password" required="" title="Ingresa una contraseña">
                                <label>
                                    <span style="transition-delay:0ms">C</span>
                                    <span style="transition-delay:30ms">o</span>
                                    <span style="transition-delay:60ms">n</span>
                                    <span style="transition-delay:90ms">t</span>
                                    <span style="transition-delay:120ms">r</span>
                                    <span style="transition-delay:150ms">a</span>
                                    <span style="transition-delay:180ms">s</span>
                                    <span style="transition-delay:210ms">e</span>
                                    <span style="transition-delay:240ms">ñ</span>
                                    <span style="transition-delay:270ms">a</span>
                                </label>
                            </div>
                        </div>
                        <a style="color:#ffffff" onclick="validaLoginPsicologo()">Iniciar sesión</a>
                        <label class="mensaje-registro">¿Aún no tienes cuenta? <label class="label-registrar" onclick="location.href='/citasPsicologicas/php/registroPsicologo.php'"> Registrate</label></label>
                    </form>
                </div>
            </div>
        </div>
        <div class="radio-inputs">
            <label onclick="location.href='/citasPsicologicas/php/loginPsicologo.php'">
                <input checked="" class="radio-input" type="radio" name="engine">
                <span class="radio-tile">
                    <span class="radio-icon">
                        <img src="/citasPsicologicas/img/psicologo.png" width="40px" height="40px" id="Capa_1">
                    </span>
                    <span class="radio-label">Psicologo</span>
                </span>
            </label>
            <label onclick="location.href='/citasPsicologicas/php/index.php'">
                <input class="radio-input" type="radio" name="engine">
                <span class="radio-tile">
                    <span class="radio-icon">
                        <img src="/citasPsicologicas/img/estudiante.png" width="40px" height="40px" id="Capa_2">
                    </span>
                    <span class="radio-label">Alumno</span>
                </span>
            </label>
        </div>
    </div>
</body>