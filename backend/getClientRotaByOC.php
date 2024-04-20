<?php
    $ordemCarga = $_GET['ordemCarga'];

    require '../functions/makeSqlConnectionToWG.php';
    $sql = "SELECT * FROM ordem_carga WHERE IDORDEMCARGA = '$ordemCarga'";
    $result = $WGConn->query($sql);
    $WGConn->close();

    $data = array();

    if($result) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    } else {
        echo json_encode(array('error' => 'No results found.'));
    }
?>