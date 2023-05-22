<?php
    session_start();

    include ('../../conexion/conexionBD.php');

    $nombre = $_FILES['file'];
    
    $arrRespuesta = [];
    $bandera=0;
    
    $queryVerificarAlumno = "SELECT * FROM registroalumno WHERE numControlAlumno='".$_SESSION['alumno']."'";
    $conexionVerificarAlumno = pg_query($conexion, $queryVerificarAlumno);
    $noRows = pg_num_rows($conexionVerificarAlumno);
    $resultadosVerificarAlumno = pg_fetch_row($conexionVerificarAlumno);

    $queryVerificarHorario = "SELECT * FROM horarioAlumnos WHERE idAlumno=$resultadosVerificarAlumno[0]";
    $conexionVerificarHorario = pg_query($conexion, $queryVerificarHorario);
    $noRows = pg_num_rows($conexionVerificarHorario);

    if($noRows == null){
        $nombreHorario = $resultadosVerificarAlumno[4];
        $ruta = '/citasPsicologicas/archivos/horarios/'.$nombreHorario;

        // $carpeta = "/citasPsicologicas/archivos/horarios/";
        if(move_uploaded_file($_FILES['file']['tmp_name'], $ruta)){
            $queryInsertar = "INSERT INTO horarioAlumnos (idAlumno, nombreHorarioAlm, rutaHorarioAlm)
            VALUES ('".$resultadosVerificarAlumno[1]."', ".$nombreHorario.", $ruta)";
            $conexionInsertar = pg_query($conexion, $queryInsertar);
        }
        $bandera=1;
    }else{
        $bandera=2;
    }
    $arrRespuesta["bandera"] = $bandera;
    echo json_encode($arrRespuesta);
?>