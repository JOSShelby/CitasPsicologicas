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

        $queryVerificarHorario = "SELECT * FROM horarioPsicologo WHERE idPsicologo='".$resultadosVerificarDatos[0]."'";
        $conexionVerificarHorario = pg_query($conexion, $queryVerificarHorario);
        $noRowsHorario = pg_num_rows($conexionVerificarHorario);
        $resultadosVerificarHorario = pg_fetch_row($conexionVerificarHorario);

        if($noRowsHorario>1){
            $queryActualizar = "DELETE FROM horarioPsicologo WHERE idPsicologo='".$resultadosVerificarDatos[0]."'";
            $conexionInsertar = pg_query($conexion, $queryActualizar);
            $bandera=1;
        }else{
            $bandera=2;
        }
    }else{
        $bandera=3;
    }
    $arrRespuesta["bandera"] = $bandera;
    echo json_encode($arrRespuesta);
?>