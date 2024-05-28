<?php
    $WGHost = "192.168.20.10";
    $WGUser = "brasil";
    $WGPass = "Br@s1l123";
    $WGDBName = "brasilvidro";

    $WGConn = new mysqli($WGHost, $WGUser, $WGPass, $WGDBName);

    if($WGConn->connect_error) {
        die("Conexão falhou: " . $WGConn->connect_error);
    }
?>