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
                    <form class="form" id="frmRegistroPsi" autocomplete="off">
                        <p class="heading">REGISTRARSE</p>
                        <div class="row">
                            <div class="f-control">
                                <input id="nombreRegistroPsi" title="ej. JOSUE SANCHEZ VENEGAS" type="text" required="" maxlength="70" style="text-transform:uppercase;" onkeypress="return soloLetras(event)">
                                <label>
                                    <span style="transition-delay:0ms">N</span>
                                    <span style="transition-delay:30ms">o</span>
                                    <span style="transition-delay:60ms">m</span>
                                    <span style="transition-delay:90ms">b</span>
                                    <span style="transition-delay:120ms">r</span>
                                    <span style="transition-delay:150ms">e</span>
                                    <span style="transition-delay:180ms"> </span>
                                    <span style="transition-delay:210ms">C</span>
                                    <span style="transition-delay:240ms">o</span>
                                    <span style="transition-delay:270ms">m</span>
                                    <span style="transition-delay:300ms">p</span>
                                    <span style="transition-delay:330ms">l</span>
                                    <span style="transition-delay:360ms">e</span>
                                    <span style="transition-delay:390ms">t</span>
                                    <span style="transition-delay:420ms">o</span>
                                </label>
                            </div>
                            <div class="f-control">
                                <input id="edadRegistroPsi" title="ej.23" maxlength="2" type="text" required="" onkeypress="return soloNumeros(event)">
                                <label>
                                    <span style="transition-delay:0ms">E</span>
                                    <span style="transition-delay:30ms">d</span>
                                    <span style="transition-delay:60ms">a</span>
                                    <span style="transition-delay:90ms">d</span>
                                </label>
                            </div>
                            <div class="f-control">
                                <!-- <input id="carreraRegistroAlm" type="text" required=""> -->
                                <input id="escuelaRegistroPsi" title="ej. UNIVERSIDAD INSTITUTO IRAPUATO" style="text-transform:uppercase;" maxlength="70" type="text" required="" onkeypress="return soloLetras(event)">
                                <label>
                                    <span style="transition-delay:0ms">E</span>
                                    <span style="transition-delay:30ms">s</span>
                                    <span style="transition-delay:60ms">c</span>
                                    <span style="transition-delay:90ms">u</span>
                                    <span style="transition-delay:120ms">e</span>
                                    <span style="transition-delay:150ms">l</span>
                                    <span style="transition-delay:180ms">a</span>
                                    <span style="transition-delay:210ms"> </span>
                                    <span style="transition-delay:240ms">d</span>
                                    <span style="transition-delay:270ms">e</span>
                                    <span style="transition-delay:300ms"> </span>
                                    <span style="transition-delay:330ms">P</span>
                                    <span style="transition-delay:360ms">r</span>
                                    <span style="transition-delay:390ms">o</span>
                                    <span style="transition-delay:420ms">c</span>
                                    <span style="transition-delay:450ms">e</span>
                                    <span style="transition-delay:480ms">d</span>
                                    <span style="transition-delay:510ms">e</span>
                                    <span style="transition-delay:540ms">n</span>
                                    <span style="transition-delay:570ms">c</span>
                                    <span style="transition-delay:600ms">i</span>
                                    <span style="transition-delay:630ms">a</span>
                                </label>
                            </div>
                            <div class="f-control">
                                <input id="correoPersRegistroPsi" type="text" required="" title="ej. ejemplo@hotmail.com" maxlength="50">
                                <label>
                                    <span style="transition-delay:0ms">C</span>
                                    <span style="transition-delay:30ms">o</span>
                                    <span style="transition-delay:60ms">r</span>
                                    <span style="transition-delay:90ms">r</span>
                                    <span style="transition-delay:120ms">e</span>
                                    <span style="transition-delay:150ms">o</span>
                                    <span style="transition-delay:180ms"> </span>
                                    <span style="transition-delay:210ms">P</span>
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
                                <input id="contraseñaRegistroPsi" title="Ingresa una contraseña" type="password" required="" maxlength="25">
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
                            <div class="f-control">
                                <input id="numeroRegistroPsi" type="text" required="" title="ej. 4629876543" onkeypress="return soloNumeros(event)" maxlength="10">
                                <label>
                                    <span style="transition-delay:0ms">N</span>
                                    <span style="transition-delay:30ms">ú</span>
                                    <span style="transition-delay:60ms">m</span>
                                    <span style="transition-delay:90ms">e</span>
                                    <span style="transition-delay:120ms">r</span>
                                    <span style="transition-delay:150ms">o</span>
                                    <span style="transition-delay:180ms"> </span>
                                    <span style="transition-delay:210ms">C</span>
                                    <span style="transition-delay:240ms">e</span>
                                    <span style="transition-delay:270ms">l</span>
                                    <span style="transition-delay:310ms">u</span>
                                    <span style="transition-delay:340ms">l</span>
                                    <span style="transition-delay:370ms">a</span>
                                    <span style="transition-delay:400ms">r</span>
                                </label>
                            </div>
                        </div>
                        <a style="color:#ffffff" onclick="validaRegistroPsicologo()">Registrarse</a>
                        <label class="mensaje-registro">¿Ya tienes cuenta? <label class="label-registrar" onclick="location.href='/citasPsicologicas/php/loginPsicologo.php'"> Iniciar Sesión</label></label>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>