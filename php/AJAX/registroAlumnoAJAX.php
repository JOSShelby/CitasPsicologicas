<?php
    include ('../../conexion/conexionBD.php');

    $nombre = filter_input(INPUT_GET,"nombre");
    $edad = filter_input(INPUT_GET, "edad");
    $carrera = filter_input(INPUT_GET, "carrera");
    $numeroControl = filter_input(INPUT_GET, "numeroControl");
    $correoPersonal = filter_input(INPUT_GET, "correoPersonal");
    $correoInst = filter_input(INPUT_GET, "correoInst");
    $contraseña = md5(filter_input(INPUT_GET, "contraseña"));
    $numeroCel = filter_input(INPUT_GET, "numeroCel");
    
    $arrRespuesta = [];
    $bandera=0;

    $queryVerificarDatos = "SELECT * FROM registroAlumno WHERE (nombreAlumno='".$nombre."') or (numControlAlumno='".$numeroControl."') or (correoInstitucionalAlumno = '".$correoInst."')";
    $conexionVerificarDatos = pg_query($conexion, $queryVerificarDatos);
    $noRows = pg_num_rows($conexionVerificarDatos);

    if($noRows == null){
        $queryInsertar = "INSERT INTO registroAlumno (nombreAlumno, edadAlumno, idCarrera, numControlAlumno, correoPersonalAlumno, correoInstitucionalAlumno, contraseñaAlumno, numeroCelularAlumno, statusAlumno)
        VALUES ('".$nombre."', ".$edad.", $carrera, '".$numeroControl."', '".$correoPersonal."', '".$correoInst."', '".$contraseña."', ".$numeroCel.", 1)";
        $conexionInsertar = pg_query($conexion, $queryInsertar);
        $bandera=1;
    }else{
        $bandera=2;
    }
    $arrRespuesta["bandera"] = $bandera;
    echo json_encode($arrRespuesta);
?>