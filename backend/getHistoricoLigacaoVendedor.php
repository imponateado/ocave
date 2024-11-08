<?php
    $codigo = $_GET['codigo'];

    require '../functions/makeSqlConnectionToOwn.php';

    $sql = "SELECT * FROM historicoVendas WHERE codigo = '$codigo'";
    $resultWG = $OwnConn->query($sql);

    $hstAsArray = array();

    while($row = $resultWG->fetch_assoc()) {
        $hstAsArray[] = $row;
    }

    echo json_encode($hstAsArray);
?>