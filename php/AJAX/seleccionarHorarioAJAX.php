<?php
    session_start();

    include ('../../conexion/conexionBD.php');

    $idHorario = filter_input(INPUT_GET,"idHorario");

    $arrRespuesta = [];
    $bandera=0;
    if($arrHorario!=""){
        $queryVerificarDatos = "SELECT * FROM registroPsicologo WHERE correoPersonalPsicologo='".$_SESSION['psicologo']."'";
        $conexionVerificarDatos = pg_query($conexion, $queryVerificarDatos);
        $noRows = pg_num_rows($conexionVerificarDatos);
        $resultadosVerificarDatos = pg_fetch_row($conexionVerificarDatos);
    
        if($noRows>0){

            $queryVerificarHorario = "SELECT * FROM horarioPsicologo WHERE idPsicologo='".$resultadosVerificarDatos[0]."'";
            $conexionVerificarHorario = pg_query($conexion, $queryVerificarHorario);
            $noRowsHorario = pg_num_rows($conexionVerificarHorario);
            $resultadosVerificarHorario = pg_fetch_row($conexionVerificarHorario);

            if($noRowsHorario<1){
                for($i=0; $i<count($arr1); $i++){
                    $arr2 = explode(",", $arr1[$i]);
                    $dia = $arr2[0];
                    $hora = $arr2[1];
                    $queryInsertar = "INSERT INTO horarioPsicologo (idPsicologo, dia, hora, statusHorarioPsi)
                    VALUES ('".$resultadosVerificarDatos[0]."', '".$dia."', '".$hora."', 1)";
                    $conexionInsertar = pg_query($conexion, $queryInsertar);
                    $bandera=1;
                }
            }else{
                $queryActualizar = "DELETE FROM horarioPsicologo WHERE idPsicologo='".$resultadosVerificarDatos[0]."'";
                $conexionInsertar = pg_query($conexion, $queryActualizar);

                for($i=0; $i<count($arr1); $i++){
                    $arr2 = explode(",", $arr1[$i]);
                    $dia = $arr2[0];
                    $hora = $arr2[1];
                    $queryInsertar = "INSERT INTO horarioPsicologo (idPsicologo, dia, hora, statusHorarioPsi)
                    VALUES ('".$resultadosVerificarDatos[0]."', '".$dia."', '".$hora."', 1)";
                    $conexionInsertar = pg_query($conexion, $queryInsertar);
                }
                $bandera=4;
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