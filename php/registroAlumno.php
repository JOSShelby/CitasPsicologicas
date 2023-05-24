<?php
    include '../conexion/conexionBD.php';
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
                    <form class="form" id="frmRegistroAlm" autocomplete="off">
                        <p class="heading">REGISTRARSE</p>
                        <div class="row">
                            <div class="f-control">
                                <input id="nombreRegistroAlm" title="ej. JOSUE SANCHEZ VENEGAS" type="text" required="" style="text-transform:uppercase;" maxlength="70" onkeypress="return soloLetras(event)">
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
                                <input id="edadRegistroAlm" title="ej.23" type="text" required="" maxlength="2" onkeypress="return soloNumeros(event)">
                                <label>
                                    <span style="transition-delay:0ms">E</span>
                                    <span style="transition-delay:30ms">d</span>
                                    <span style="transition-delay:60ms">a</span>
                                    <span style="transition-delay:90ms">d</span>
                                </label>
                            </div>
                            <div class="f-control">
                                <select id="carreraRegistroAlm" required="" title="Selecciona tu carrera">
                                    <option> </option>
                                    <?php
                                        $queryCarreras ="SELECT * from carreras where statuscarrera=1";
                                        $conexionCarreras = pg_query($conexion, $queryCarreras);
                                        $noRowsCarreras = pg_num_rows($conexionCarreras);

                                        while ($resultadosCarreras = pg_fetch_row($conexionCarreras)){
                                            $idCarrera = $resultadosCarreras[0];
                                            $nombreCarrera = $resultadosCarreras[1];
                                            print_r("<option value=\"$idCarrera\">$nombreCarrera</option>");
                                        }
                                    ?>
                                </select>
                                <label>
                                    <span style="transition-delay:0ms">C</span>
                                    <span style="transition-delay:30ms">a</span>
                                    <span style="transition-delay:60ms">r</span>
                                    <span style="transition-delay:90ms">r</span>
                                    <span style="transition-delay:120ms">e</span>
                                    <span style="transition-delay:150ms">r</span>
                                    <span style="transition-delay:180ms">a</span>
                                    <span style="transition-delay:210ms"> </span>
                                    <span style="transition-delay:240ms">C</span>
                                    <span style="transition-delay:270ms">u</span>
                                    <span style="transition-delay:300ms">r</span>
                                    <span style="transition-delay:330ms">s</span>
                                    <span style="transition-delay:360ms">a</span>
                                    <span style="transition-delay:390ms">d</span>
                                    <span style="transition-delay:420ms">a</span>
                                </label>
                            </div>
                            <div class="f-control">
                                <input id="numControlRegistroAlm" type="text" required="" style="text-transform:uppercase;" title="ej. IS18110312" onkeypress="return soloLetrasyNumeros(event)" maxlength="10">
                                <label>
                                    <span style="transition-delay:0ms">N</span>
                                    <span style="transition-delay:30ms">ú</span>
                                    <span style="transition-delay:60ms">m</span>
                                    <span style="transition-delay:90ms">e</span>
                                    <span style="transition-delay:120ms">r</span>
                                    <span style="transition-delay:150ms">o</span>
                                    <span style="transition-delay:180ms"> </span>
                                    <span style="transition-delay:210ms">d</span>
                                    <span style="transition-delay:240ms">e</span>
                                    <span style="transition-delay:270ms"> </span>
                                    <span style="transition-delay:300ms">C</span>
                                    <span style="transition-delay:330ms">o</span>
                                    <span style="transition-delay:360ms">n</span>
                                    <span style="transition-delay:390ms">t</span>
                                    <span style="transition-delay:420ms">r</span>
                                    <span style="transition-delay:450ms">o</span>
                                    <span style="transition-delay:480ms">l</span>
                                </label>
                            </div>
                            <div class="f-control">
                                <input id="correoPersRegistroAlm" type="text" required="" title="ej. ejemplo@hotmail.com" maxlength="50">
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
                                <input id="correoInstRegistroAlm" type="text" required="" style="text-transform:uppercase;" title="ej. LIS18110312@IRAPUATO.TECNM.MX" maxlength="29">
                                <label>
                                    <span style="transition-delay:0ms">C</span>
                                    <span style="transition-delay:30ms">o</span>
                                    <span style="transition-delay:60ms">r</span>
                                    <span style="transition-delay:90ms">r</span>
                                    <span style="transition-delay:120ms">e</span>
                                    <span style="transition-delay:150ms">o</span>
                                    <span style="transition-delay:180ms"> </span>
                                    <span style="transition-delay:210ms">I</span>
                                    <span style="transition-delay:240ms">n</span>
                                    <span style="transition-delay:270ms">s</span>
                                    <span style="transition-delay:300ms">t</span>
                                    <span style="transition-delay:330ms">i</span>
                                    <span style="transition-delay:360ms">t</span>
                                    <span style="transition-delay:390ms">u</span>
                                    <span style="transition-delay:420ms">c</span>
                                    <span style="transition-delay:450ms">i</span>
                                    <span style="transition-delay:480ms">o</span>
                                    <span style="transition-delay:510ms">n</span>
                                    <span style="transition-delay:540ms">a</span>
                                    <span style="transition-delay:570ms">l</span>
                                </label>
                            </div>
                            <div class="f-control">
                                <input id="contraseñaRegistroAlm" title="Ingresa una contraseña" type="password" required="" maxlength="25">
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
                                <input id="numeroRegistroAlm" type="text" required="" title="ej. 4629876543" onkeypress="return soloNumeros(event)" maxlength="10">
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
                        <a style="color:#ffffff" onclick="validaRegistroAlumno()">Registrarse</a>
                        <label class="mensaje-registro">¿Ya tienes cuenta? <label class="label-registrar" onclick="location.href='/citasPsicologicas/php/'"> Iniciar Sesión</label></label>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>