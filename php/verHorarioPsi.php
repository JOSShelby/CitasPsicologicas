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
                        <p class="heading">TU HORARIO</p>
                        <table id="tablaHorarioPsi" style="color: white;" class="table table-hover">
                            <colspan  style="color: white;">HORARIO</colspan>
                            <tr><th>DÍA</th><th>HORA</th><th>ESTADO</th></tr>
                            <?php
                                $queryVerHorario = "SELECT h.idHorarioPsi, h.idPsicologo, h.dia, h.hora, s.descripcionHorarioPsi FROM horarioPsicologo h, statusHorarioPsicologo s WHERE h.idStatusHorarioPsi=s.idStatusHorarioPsi and idPsicologo='".$resultadosVerificarDatos[0]."' order by dia ASC, hora ASC";
                                $conexionVerHorario = pg_query($conexion, $queryVerHorario);
                                $noRowsHorario = pg_num_rows($conexionVerHorario);

                                while ($resultadosVerHorario = pg_fetch_array($conexionVerHorario)) {
                            ?>
                                <tr><td><?php print_r($resultadosVerHorario[2]); ?></td><td><?php print_r($resultadosVerHorario[3]); ?></td><td><?php print_r($resultadosVerHorario[4]); ?></td></tr>
                            
                            <?php 
                                }
                            ?>
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