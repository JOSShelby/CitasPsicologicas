<?php
    include ('../../conexion/conexionBD.php');


    $numeroControl = filter_input(INPUT_GET, "numeroControl");
    $contraseña = md5(filter_input(INPUT_GET, "contraseña"));
    
    $arrRespuesta = [];
    $bandera=0;

    $queryVerificarDatos = "SELECT * FROM registroAlumno WHERE numControlAlumno='".$numeroControl."' AND contraseñaAlumno = '".$contraseña."'";
    $conexionVerificarDatos = pg_query($conexion, $queryVerificarDatos);
    $noRows = pg_num_rows($conexionVerificarDatos);

    if($noRows != null){
        $bandera=1;
        session_start();
        $_SESSION['alumno']= $numeroControl;
        $session = $_SESSION['alumno'];
    }else{
        $bandera=2;
    }
    $arrRespuesta["bandera"] = $bandera;
    echo json_encode($arrRespuesta);
?>