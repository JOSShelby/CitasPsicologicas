<?php
    session_start();

    include ('../../conexion/conexionBD.php');

    $idHorario = filter_input(INPUT_GET,"idHorario");

    $arrRespuesta = [];
    $bandera=0;

        $queryVerificarDatos = "SELECT * FROM registroalumno WHERE numControlAlumno ='".$_SESSION['alumno']."'";
        $conexionVerificarDatos = pg_query($conexion, $queryVerificarDatos);
        $noRows = pg_num_rows($conexionVerificarDatos);
        $resultadosVerificarDatos = pg_fetch_row($conexionVerificarDatos);
    
        if($noRows>0){

            $queryVerificarHorario = "SELECT * FROM asociacionAlumnoPsicologo WHERE idAlumno='".$resultadosVerificarDatos[0]."'";
            $conexionVerificarHorario = pg_query($conexion, $queryVerificarHorario);
            $noRowsCita = pg_num_rows($conexionVerificarHorario);
            $resultadosVerificarHorario = pg_fetch_row($conexionVerificarHorario);

            if($noRowsCita<1){
                $queryVerificarPsi = "SELECT * FROM horarioPsicologo WHERE idHorarioPsi='".$idHorario."'";
                $conexionVerificarPsi = pg_query($conexion, $queryVerificarPsi);
                $noRowsVerificarPsi = pg_num_rows($conexionVerificarPsi);
                $resultadosVerificarPsi = pg_fetch_row($conexionVerificarPsi);

                $queryInsertar = "INSERT INTO asociacionAlumnoPsicologo (idPsicologo, idAlumno, hora, dia, numTerapiasasistidas, numTerapiascanceladas, idStatusAsociacion)
                VALUES ('".$resultadosVerificarPsi[1]."', '".$resultadosVerificarDatos[0]."', '".$resultadosVerificarPsi[3]."', '".$resultadosVerificarPsi[2]."', 0, 0, 1)";
                $conexionInsertar = pg_query($conexion, $queryInsertar);

                $queryUpdateHora = "UPDATE horarioPsicologo SET idStatusHorarioPsi=2 WHERE idHorarioPsi='".$idHorario."'";
                $conexionUpdateHora = pg_query($conexion, $queryUpdateHora);

                $queryPsi = "SELECT * FROM registroPsicologo WHERE idPsicologo='".$resultadosVerificarPsi[1]."'";
                $conexionPsi = pg_query($conexion, $queryPsi);
                $resultadosPsi = pg_fetch_row($conexionPsi);

                $dia= $resultadosVerificarPsi[2];
                $hora= $resultadosVerificarPsi[3];
                $psicologo= $resultadosPsi[1];
                $arrRespuesta["dia"]=$dia;
                $arrRespuesta["hora"]=$hora;
                $arrRespuesta["psicologo"]=$psicologo;
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