<?php
session_start();
if(isset($_SESSION['psicologo'])){
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

<body onload="mensajeBienvenidaPs()"><img class="fondoItesi" src="/citasPsicologicas/img/ITESI.jpg">
<div class="container">
<div class="loader">
  <span>L</span>
  <span>O</span>
  <span>A</span>
  <span>D</span>
  <span>I</span>
  <span>N</span>
  <span>G</span>
</div>

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
                <input id="correoPersonalHid" style="display:none" value=<?php echo $_SESSION['psicologo'];?>>
                    <form class="form" id="frmPantallaPrincipalPsocologo">
                        <p class="heading">MENÚ</p>
                        <a style="color:#ffffff" href="/citasPsicologicas/php/EstablecerHorariosPsicologo.php" title="Click para establecer horarios de atención">Mis horarios</a>
                        <a style="color:#ffffff" href="#" title="Click para ver las citas">Ver mis citas</a>
                        <a style="color:#ffffff" href="#" title="Click para ver las citas">Subir Expedientes de alumnos</a>
                        <a style="color:#ffffff" href="#" title="Click para ver las citas">Buscar datos de alumnos</a>
                    </form>
                    <a class="cerrarSesion" style="color:#ffffff" onclick="cerrarSesion()" title="Click para cerrar sesión">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<?php
}else{
    header("location: ./");
}
?>