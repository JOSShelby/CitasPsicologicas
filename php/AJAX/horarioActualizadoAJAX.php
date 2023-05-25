<?php
    session_start();

    include ('../../conexion/conexionBD.php');

    $idHora = filter_input(INPUT_GET,"idHora");
    $diaUpdate = filter_input(INPUT_GET,"diaUpdate");
    $horaUpdate = filter_input(INPUT_GET,"horaUpdate");

    $arrRespuesta = [];
    $bandera=0;

        $queryVerificarDatos = "SELECT * FROM registroPsicologo WHERE correopersonalpsicologo ='".$_SESSION['psicologo']."'";
        $conexionVerificarDatos = pg_query($conexion, $queryVerificarDatos);
        $noRows = pg_num_rows($conexionVerificarDatos);
        $resultadosVerificarDatos = pg_fetch_row($conexionVerificarDatos);
    
        if($noRows>0){
            $queryVerificarHorario = "SELECT * FROM horarioPsicologo WHERE idpsicologo='".$resultadosVerificarDatos[0]."' and idhorariopsi='".$idHora."' and idstatushorariopsi=1";
            $conexionVerificarHorario = pg_query($conexion, $queryVerificarHorario);
            $noRowsCita = pg_num_rows($conexionVerificarHorario);
            $resultadosVerificarHorario = pg_fetch_row($conexionVerificarHorario);

            if($noRowsCita>0){

                $queryRepeticion = "SELECT * FROM horarioPsicologo WHERE idpsicologo='".$resultadosVerificarDatos[0]."'";
                $conexionRepeticion = pg_query($conexion, $queryRepeticion);
                $noRowsCita = pg_num_rows($conexionRepeticion);

                $puntero=0;

                while($resultadosRepeticion = pg_fetch_row($conexionRepeticion)){
                    if($resultadosRepeticion[2] == $diaUpdate && $resultadosRepeticion[3] == $horaUpdate){
                        $puntero=1;
                        break;
                    }else{
                        $puntero=0;
                    }
                } 
                if($puntero==0){
                    
                    $queryUpdateHora = "UPDATE horarioPsicologo SET dia='".$diaUpdate."', hora='".$horaUpdate."' WHERE idHorarioPsi='".$idHora."'";
                    $conexionUpdateHora = pg_query($conexion, $queryUpdateHora);
                        
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