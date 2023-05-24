<?php
    include ('../../conexion/conexionBD.php');

    $nombre = filter_input(INPUT_GET,"nombre");
    $edad = filter_input(INPUT_GET, "edad");
    $escuela = filter_input(INPUT_GET, "escuela");
    $correoPersonal = filter_input(INPUT_GET, "correoPersonal");
    $contraseña = md5(filter_input(INPUT_GET, "contraseña"));
    $numeroCel = filter_input(INPUT_GET, "numeroCel");
    
    $arrRespuesta = [];
    $bandera=0;

    $queryVerificarDatos = "SELECT * FROM registroPsicologo WHERE (nombrePsicologo='".$nombre."') or (correoPersonalPsicologo='".$correoPersonal."')";
    $conexionVerificarDatos = pg_query($conexion, $queryVerificarDatos);
    $noRows = pg_num_rows($conexionVerificarDatos);

    if($noRows == null){
        $queryInsertar = "INSERT INTO registroPsicologo (nombrePsicologo, edadPsicologo, escuelaProcedenciaPsicologo, correoPersonalPsicologo, contraseñaPsicologo, numeroCelularPsicologo, statusPsicologo)
        VALUES ('".$nombre."', ".$edad.", '".$escuela."', '".$correoPersonal."', '".$contraseña."', ".$numeroCel.", 1)";
        $conexionInsertar = pg_query($conexion, $queryInsertar);
        $bandera=1;
    }else{
        $bandera=2;
    }
    $arrRespuesta["bandera"] = $bandera;
    echo json_encode($arrRespuesta);
?>