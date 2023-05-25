<?php
    session_start();

    include ('../../conexion/conexionBD.php');

    $idHora = filter_input(INPUT_GET,"idHora");

    $arrRespuesta = [];
    $bandera=0;

        $queryVerificarDatos = "SELECT * FROM registroPsicologo WHERE correopersonalpsicologo ='".$_SESSION['psicologo']."'";
        $conexionVerificarDatos = pg_query($conexion, $queryVerificarDatos);
        $noRows = pg_num_rows($conexionVerificarDatos);
        $resultadosVerificarDatos = pg_fetch_row($conexionVerificarDatos);
    
        if($noRows>0){
            $queryVerificarHorario = "SELECT * FROM horarioPsicologo WHERE idpsicologo='".$resultadosVerificarDatos[0]."'";
            $conexionVerificarHorario = pg_query($conexion, $queryVerificarHorario);
            $noRowsCita = pg_num_rows($conexionVerificarHorario);
            $resultadosVerificarHorario = pg_fetch_row($conexionVerificarHorario);

            if($noRowsCita>0){
                $queryVerificarPsi = "SELECT * FROM horarioPsicologo WHERE idHorarioPsi='".$idHora."' and idstatushorariopsi=1";
                $conexionVerificarPsi = pg_query($conexion, $queryVerificarPsi);
                $noRowsVerificarPsi = pg_num_rows($conexionVerificarPsi);
                $resultadosVerificarPsi = pg_fetch_row($conexionVerificarPsi);

                if($noRowsVerificarPsi>0){
                    $queryselect = "SELECT h.idHorarioPsi, h.idPsicologo, h.dia, h.hora, s.descripcionHorarioPsi FROM horarioPsicologo h, statusHorarioPsicologo s WHERE h.idStatusHorarioPsi=s.idStatusHorarioPsi and idPsicologo='".$resultadosVerificarDatos[0]."' and idhorariopsi='".$idHora."'";
                    $conexionselect = pg_query($conexion, $queryselect);
                    $resultadosselect = pg_fetch_row($conexionselect);
    
                    $idHorario = $idHora;
                    $dia= $resultadosselect[2];
                    $hora= $resultadosselect[3];
                    $descripcion= $resultadosselect[4];
                    $arrRespuesta["idHorario"]=$idHorario;
                    $arrRespuesta["dia"]=$dia;
                    $arrRespuesta["hora"]=$hora;
                    $arrRespuesta["descripcion"]=$descripcion;
                    
                    $bandera=1;
                }else{
                    $bandera=2;
                }
            }else{
                $bandera=3;
            }
        }else{
            $bandera=4;
        }

    $arrRespuesta["bandera"] = $bandera;
    echo json_encode($arrRespuesta);
?>