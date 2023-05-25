<?php
include '../conexion/conexion.php';
    
    $respuestaAJAX = [];

    $queryPrueba="SELECT * FROM carreras";
    $conexionPrueba = pg_query($conexion,$queryPrueba);
    $respuestaConexionPrueba = pg_fetch_array($conexionPrueba);
    echo ($respuestaConexionPrueba);

    // if(!$respuestaConexionPrueba) {
    //     $respuestaAJAX['Consulta'] = ("Error: No se ha podido conectar a la base de datos");
    // } else {
    //     $respuestaAJAX['Consulta'] = ("Conexión exitosa");
    // }

    echo json_encode($respuestaAJAX);