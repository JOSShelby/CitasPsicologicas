<?php
session_start();
if(isset($_SESSION['psicologo'])){

    include '../conexion/conexionBD.php';

    $arrHorarios = filter_input(INPUT_GET,"arrHorarios");

    $queryVerificarDatos = "SELECT * FROM registroPsicologo WHERE correoPersonalPsicologo='".$_SESSION['psicologo']."'";
    $conexionVerificarDatos = pg_query($conexion, $queryVerificarDatos);
    $noRows = pg_num_rows($conexionVerificarDatos);
    $resultadosVerificarDatos = pg_fetch_row($conexionVerificarDatos);

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
    <div class="container" id="containerBlur">
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
                    <form class="form2" id="divmodal" hidden>
                        <p class="heading">EDITAR HORA</p>
                                <table id="tablaHora" style="color: white;" class="table table-hover">
                                    <colspan style="color: white;">HORARIO ACTUAL</colspan>
                                    <tr><th>DÍA</th><th>HORA</th><th>ESTADO</th></tr>
                                </table>
                                <div class="f-control">
                                    <select id="ActualizarDiaHorario" required="" title="Selecciona el día">
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
                                    <select id="ActualizarHoraHorario" required="" title="Selecciona la hora">
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
                                <a style="color: #ffffff;" onclick="actualizarHora()" title="Actualiza horario seleccionado">Actualizar hora</a>
                        </form>
                        <form class="form" id="frmAgregarHorarioPsi">
                            <p class="heading">TU HORARIO</p>
                            <table id="tablaHorarioPsi" style="color: white;" class="table table-hover">
                                <colspan style="color: white;">HORARIO</colspan>
                                <tr><th>DÍA</th><th>HORA</th><th>ESTADO</th></tr>
                                <?php
                                    $queryVerHorario = "SELECT h.idHorarioPsi, h.idPsicologo, h.dia, h.hora, s.descripcionHorarioPsi FROM horarioPsicologo h, statusHorarioPsicologo s WHERE h.idStatusHorarioPsi=s.idStatusHorarioPsi and idPsicologo='".$resultadosVerificarDatos[0]."' order by dia ASC, hora ASC";
                                    $conexionVerHorario = pg_query($conexion, $queryVerHorario);
                                    $noRowsHorario = pg_num_rows($conexionVerHorario);

                                    while ($resultadosVerHorario = pg_fetch_array($conexionVerHorario)) {
                                ?>
                                    <tr title="Click para editar" id="<?php print_r($resultadosVerHorario[0])?>" onclick="modificarHorario(this.id)"><td><?php print_r($resultadosVerHorario[2]); ?></td><td><?php print_r($resultadosVerHorario[3]); ?></td><td><?php print_r($resultadosVerHorario[4]); ?></td></tr>
                                
                                <?php 
                                    }
                                ?>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div hidden class="imgCargando" id="imgCargando">
        <svg xmlns="http://www.w3.org/2000/svg" height="50px" width="50px" viewBox="0 0 200 200" class="pencil">
            <defs>
                <clipPath id="pencil-eraser">
                    <rect height="30" width="30" ry="5" rx="5"></rect>
                </clipPath>
            </defs>
            <circle transform="rotate(-113,100,100)" stroke-linecap="round" stroke-dashoffset="439.82" stroke-dasharray="439.82 439.82" stroke-width="2" stroke="currentColor" fill="none" r="70" class="pencil__stroke"></circle>
            <g transform="translate(100,100)" class="pencil__rotate">
                <g fill="none">
                    <circle transform="rotate(-90)" stroke-dashoffset="402" stroke-dasharray="402.12 402.12" stroke-width="30" stroke="hsl(223,90%,50%)" r="64" class="pencil__body1"></circle>
                    <circle transform="rotate(-90)" stroke-dashoffset="465" stroke-dasharray="464.96 464.96" stroke-width="10" stroke="hsl(223,90%,60%)" r="74" class="pencil__body2"></circle>
                    <circle transform="rotate(-90)" stroke-dashoffset="339" stroke-dasharray="339.29 339.29" stroke-width="10" stroke="hsl(223,90%,40%)" r="54" class="pencil__body3"></circle>
                </g>
                <g transform="rotate(-90) translate(49,0)" class="pencil__eraser">
                    <g class="pencil__eraser-skew">
                        <rect height="30" width="30" ry="5" rx="5" fill="hsl(223,90%,70%)"></rect>
                        <rect clip-path="url(#pencil-eraser)" height="30" width="5" fill="hsl(223,90%,60%)"></rect>
                        <rect height="20" width="30" fill="hsl(223,10%,90%)"></rect>
                        <rect height="20" width="15" fill="hsl(223,10%,70%)"></rect>
                        <rect height="20" width="5" fill="hsl(223,10%,80%)"></rect>
                        <rect height="2" width="30" y="6" fill="hsla(223,10%,10%,0.2)"></rect>
                        <rect height="2" width="30" y="13" fill="hsla(223,10%,10%,0.2)"></rect>
                    </g>
                </g>
                <g transform="rotate(-90) translate(49,-30)" class="pencil__point">
                    <polygon points="15 0,30 30,0 30" fill="hsl(33,90%,70%)"></polygon>
                    <polygon points="15 0,6 30,0 30" fill="hsl(33,90%,50%)"></polygon>
                    <polygon points="15 0,20 10,10 10" fill="hsl(223,10%,10%)"></polygon>
                </g>
            </g>
        </svg>
    </div>
</body>
<?php
}else{
    header("location: ./");
}
?>