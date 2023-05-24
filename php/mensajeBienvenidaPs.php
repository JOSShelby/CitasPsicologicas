<?php
     include ('../conexion/conexionBD.php');

     $correoPersonalHid = filter_input(INPUT_GET, "correoPersonalHid");
     
     $arrRespuesta = [];
     $bandera=0;
 
     $queryMensajeBienvenida = "SELECT * FROM registroPsicologo WHERE correoPersonalPsicologo='".$correoPersonalHid."'";
     $conexionMensajeBienvenida = pg_query($conexion, $queryMensajeBienvenida);
     $noRows = pg_num_rows($conexionMensajeBienvenida);
 
     if($noRows != null){
        $bandera=1;
        $resultadosPsi = pg_fetch_row($conexionMensajeBienvenida);
        $arrRespuesta["psicologo"] = $resultadosPsi[1];
     }else{
         $bandera=0;
     }
     $arrRespuesta["bandera"] = $bandera;
     echo json_encode($arrRespuesta);
?>