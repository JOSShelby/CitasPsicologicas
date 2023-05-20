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
    <link href="/citasPsicologicas/estilos/pantallaPrincipal.css" rel="stylesheet">
    <script type="text/javascript" src="/citasPsicologicas/funciones/alertas.js"></script>
    <script type="text/javascript" src="/citasPsicologicas/funciones/funciones.js"></script>

    <title>Citas Psicologicas</title>
</head>

<body onload="instrucciones()"><img class="fondoItesi" src="/citasPsicologicas/img/ITESI.jpg">
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
                    <button style="color:#ffffff" title="Volver al inicio" onclick="volverInicio()"><img src="/citasPsicologicas/img/home.png" width="20px" height="20px"></button>
                    <form class="form" id="frmAgendarCitaAlm">
                        <div class="row">
                            <div class="container">
                                <div id="contenido1">
                                    <label style="color:#ffffff">SUBE TU FICHA DE CANALIZACIÓN EN ESTE APARTADO (.jpg)</label>
                                    <label for="file" class="footer">
                                        <svg fill="#000000" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path d="M15.331 6H8.5v20h15V14.154h-8.169z"></path>
                                                <path d="M18.153 6h-.009v5.342H23.5v-.002z"></path>
                                            </g>
                                        </svg>
                                        <p>Seleccionar ...</p>
                                    </label>
                                    <input onclick="verImagen()" id="file" type="file" accept="image/jpeg">
                                    <div id="mostrarImagen" class="header" stye="display:flex;">
                                    </div>
                                    <a style="color:#ffffff" onclick="validFichaCanalizacionAlm()" title="Click para subir ficha de canalización">Guardar</a>
                                </div>
                                <div id="contenido2" hidden>
                                <label style="color:#ffffff">SELECCIONA FECHA Y HORA PARA LA CITA</label>
                                    
                                    <a style="color:#ffffff" onclick="validFichaCanalizacionAlm()" title="Click para subir ficha de canalización">Guardar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>