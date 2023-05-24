<?php
    include ('../../conexion/conexionBD.php');


    $correoPersonal = filter_input(INPUT_GET, "correoPersonal");
    $contraseña = md5(filter_input(INPUT_GET, "contraseña"));
    
    $arrRespuesta = [];
    $bandera=0;

    $queryVerificarDatos = "SELECT * FROM registroPsicologo WHERE correoPersonalPsicologo='".$correoPersonal."' AND contraseñaPsicologo = '".$contraseña."'";
    $conexionVerificarDatos = pg_query($conexion, $queryVerificarDatos);
    $noRows = pg_num_rows($conexionVerificarDatos);

    if($noRows != null){
        $bandera=1;
        session_start();
        $_SESSION['psicologo']= $correoPersonal;
        $session = $_SESSION['psicologo'];
    }else{
        $bandera=2;
    }
    $arrRespuesta["bandera"] = $bandera;
    echo json_encode($arrRespuesta);
?>