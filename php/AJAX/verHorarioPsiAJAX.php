<?php
    session_start();

    include ('../../conexion/conexionBD.php');

    $arrRespuesta = [];
    $bandera=0;

    $queryVerificarDatos = "SELECT * FROM registroPsicologo WHERE correoPersonalPsicologo='".$_SESSION['psicologo']."'";
    $conexionVerificarDatos = pg_query($conexion, $queryVerificarDatos);
    $noRows = pg_num_rows($conexionVerificarDatos);
    $resultadosVerificarDatos = pg_fetch_row($conexionVerificarDatos);

    if($noRows>0){

        $queryVerHorario = "SELECT h.idHorarioPsi, h.idPsicologo, h.dia, h.hora, s.descripcionHorarioPsi FROM horarioPsicologo h, statusHorarioPsicologo s WHERE h.idStatusHorarioPsi=s.idStatusHorarioPsi and idPsicologo='".$resultadosVerificarDatos[0]."' order by dia ASC, hora ASC";
        $conexionVerHorario = pg_query($conexion, $queryVerHorario);
        $noRowsHorario = pg_num_rows($conexionVerHorario);
        // $resultadosVerHorario = pg_fetch_array($conexionVerHorario);
        if($noRowsHorario>1){

            while ($resultadosVerHorario = pg_fetch_array($conexionVerHorario)) {
                $arrayHorario[] = $resultadosVerHorario[0]."-".$resultadosVerHorario[1]."-".$resultadosVerHorario[2]."-".$resultadosVerHorario[3]."-".$resultadosVerHorario[4];
            }
            $bandera=1;
            $arrRespuesta["arrHorarios"] = $arrayHorario;

        }else{
            $bandera=2;
        }
    }else{
        $bandera=3;
    }
    $arrRespuesta["bandera"] = $bandera;
    echo json_encode($arrRespuesta);
?>