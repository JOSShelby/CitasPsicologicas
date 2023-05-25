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
        $query = "SELECT * FROM horarioPsicologo WHERE idPsicologo='".$resultadosVerificarDatos[0]."'";
        $conexionH = pg_query($conexion, $query);
        $noRowsH = pg_num_rows($conexionH);
        $resultadosH = pg_fetch_row($conexionH);

        if($noRowsH>0){
            $queryVerificarHorario = "SELECT * FROM horarioPsicologo WHERE idPsicologo='".$resultadosVerificarDatos[0]."' and idStatusHorarioPsi = 2";
            $conexionVerificarHorario = pg_query($conexion, $queryVerificarHorario);
            $noRowsHorario = pg_num_rows($conexionVerificarHorario);
            $resultadosVerificarHorario = pg_fetch_row($conexionVerificarHorario);
    
            if($noRowsHorario>0){
                $bandera=4;
            }else{
                $queryActualizar = "DELETE FROM horarioPsicologo WHERE idPsicologo='".$resultadosVerificarDatos[0]."'";
                $conexionInsertar = pg_query($conexion, $queryActualizar);
                $bandera=1;
            }
        }else{
            $bandera=2;
        }
        
    }else{
        $bandera=3;
    }
    $arrRespuesta["bandera"] = $bandera;
    echo json_encode($arrRespuesta);
?>