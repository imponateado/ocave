<?php
    $OwnHost = "127.0.0.1";
    $OwnPort = 3306;
    $OwnUser = "root";
    $OwnPass = "";
    $OwnDBName = "brasiltemper";

    $OwnConn = new mysqli($OwnHost, $OwnUser, $OwnPass, $OwnDBName, $OwnPort);

    if($OwnConn->connect_error) {
        die("Conexão falhou: " . $OwnConn->connect_error);
    }
?>
