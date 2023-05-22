<?php
     include ('../conexion/conexionBD.php');

     $numCtrlHid = filter_input(INPUT_GET, "numCtrlHid");
     
     $arrRespuesta = [];
     $bandera=0;
 
     $queryMensajeBienvenida = "SELECT * FROM registroAlumno WHERE numControlAlumno='".$numCtrlHid."'";
     $conexionMensajeBienvenida = pg_query($conexion, $queryMensajeBienvenida);
     $noRows = pg_num_rows($conexionMensajeBienvenida);
 
     if($noRows != null){
        $bandera=1;
        $resultadosAlm = pg_fetch_row($conexionMensajeBienvenida);
        $arrRespuesta["alumno"] = $resultadosAlm[1];
     }else{
         $bandera=0;
     }
     $arrRespuesta["bandera"] = $bandera;
     echo json_encode($arrRespuesta);
?>