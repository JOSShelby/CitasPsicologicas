<?php
    session_start();

    include ('../../conexion/conexionBD.php');

    $nombre = $_FILES['file'];
    
    $arrRespuesta = [];
    $bandera=0;
    if (($_FILES['file']["type"] =="image/jpeg" OR $_FILES['file']["type"] =="image/jpg" OR $_FILES['file']["type"] =="image/png")){
        if ($_FILES['file']["size"]<400000){
            $queryVerificarAlumno = "SELECT * FROM registroalumno WHERE numControlAlumno='".$_SESSION['alumno']."'";
            $conexionVerificarAlumno = pg_query($conexion, $queryVerificarAlumno);
            $noRows = pg_num_rows($conexionVerificarAlumno);
            $resultadosVerificarAlumno = pg_fetch_row($conexionVerificarAlumno);
        
            if($noRows>0){
                $queryVerificarHorario = "SELECT * FROM horarioAlumnos WHERE idAlumno=$resultadosVerificarAlumno[0]";
                $conexionVerificarHorario = pg_query($conexion, $queryVerificarHorario);
                $noRows = pg_num_rows($conexionVerificarHorario);
            
                if($noRows == null){
                    $queryInsertar = "INSERT INTO horarioAlumnos (idAlumno, nombreHorarioAlm, rutaHorarioAlm)
                    VALUES ('".$resultadosVerificarAlumno[0]."', '".$resultadosVerificarAlumno[4]."', '/citasPsicologicas/archivos/horarios/horarioALM_".$resultadosVerificarAlumno[4].".jpeg')";
                    if($conexionInsertar = pg_query($conexion, $queryInsertar)==TRUE){
                        move_uploaded_file($_FILES['file']["tmp_name"], "../../archivos/horarios/horarioALM_".$resultadosVerificarAlumno[4].".jpeg");
                    }
                    $bandera=1;
                }else{
                    $queryActualizar = "UPDATE horarioAlumnos SET rutaHorarioAlm = '/citasPsicologicas/archivos/horarios/horarioALM_".$resultadosVerificarAlumno[4].".jpeg' WHERE nombreHorarioAlm = ".$resultadosVerificarAlumno[4]."";
                    move_uploaded_file($_FILES['file']["tmp_name"], "../../archivos/horarios/horarioALM_".$resultadosVerificarAlumno[4].".jpeg");
                    $bandera=2;
                }
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