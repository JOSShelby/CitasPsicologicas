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
                <button style="color:#ffffff" title="Volver al inicio" onclick="volverInicioPsi()"><img src="/citasPsicologicas/img/home.png" width="20px" height="20px"></button>
                <input id="correoPersonalHid" style="display:none" value=<?php echo $_SESSION['psicologo'];?>>
                    <form class="form" id="frmAgregarHorarioPsi">
                        <p class="heading">SELECCION DE HORARIO</p>
                        <div class="f-control">
                            <select id="diaHorario" required="" title="Selecciona el día">
                                <option style="color: blue;"> </option>
                                <option style="color: blue;" value="Lunes">Lunes</option>
                                <option style="color: blue;" value="Martes">Martes</option>
                                <option style="color: blue;" value="Miercoles">Miercoles</option>
                                <option style="color: blue;" value="Jueves">Jueves</option>
                                <option style="color: blue;" value="Viernes">Viernes</option>
                                <option style="color: blue;" value="Sabado">Sabado</option>
                            </select>
                            <label>
                                <span style="transition-delay:0ms">D</span>
                                <span style="transition-delay:30ms">í</span>
                                <span style="transition-delay:60ms">a</span>
                            </label>
                        </div>
                        <div class="f-control">
                            <select id="horaHorario" required="" title="Selecciona la hora">
                                <option style="color: blue;"> </option>
                                <option style="color: blue;" value="08:00 am">08:00 am</option>
                                <option style="color: blue;" value="09:00 am">09:00 am</option>
                                <option style="color: blue;" value="10:00 am">10:00 am</option>
                                <option style="color: blue;" value="11:00 am">11:00 am</option>
                                <option style="color: blue;" value="12:00 pm">12:00 pm</option>
                                <option style="color: blue;" value="01:00 pm">01:00 pm</option>
                                <option style="color: blue;" value="02:00 pm">02:00 pm</option>
                                <option style="color: blue;" value="03:00 pm">03:00 pm</option>
                                <option style="color: blue;" value="04:00 pm">04:00 pm</option>
                                <option style="color: blue;" value="05:00 pm">05:00 pm</option>
                                <option style="color: blue;" value="06:00 pm">06:00 pm</option>
                                <option style="color: blue;" value="07:00 pm">07:00 pm</option>
                                <option style="color: blue;" value="08:00 pm">08:00 pm</option>
                            </select>
                            <label>
                                <span style="transition-delay:0ms">H</span>
                                <span style="transition-delay:30ms">o</span>
                                <span style="transition-delay:60ms">r</span>
                                <span style="transition-delay:90ms">a</span>
                            </label>
                        </div>
                        <a onclick="agregarHoraPsi()" title="Agregar hora seleccionada"><img style="filter: invert();" src="/citasPsicologicas/img/agregar.png" width="20px" height="20px"></a>
                        <a style="color: #ffffff;" onclick="guardarHorarioPsicologo()" title="Guardar el horario formado">Guardar horario</a>
                        <a style="color: #ffffff;" onclick="VerHorarioPsicologo()" title="Guardar el horario formado">Ver mi horario</a>
                        <a style="color: #ffffff;" onclick="borrarHorarioPsicologo()" title="Guardar el horario formado">Borrar horario</a>
                        <table id="tablaFormarHorarioPsi" style="color: white;" class="table table-hover">
                            <colspan  style="color: white;">HORARIO</colspan>
                        </table>
                    </form>
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