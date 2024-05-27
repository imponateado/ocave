<?php
    $WGHost = "";
    $WGUser = "";
    $WGPass = "";
    $WGDBName = "";

    $WGConn = new mysqli($WGHost, $WGUser, $WGPass, $WGDBName);

    if($WGConn->connect_error) {
        die("Conexão falhou: " . $WGConn->connect_error);
    }
?>
