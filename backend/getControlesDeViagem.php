<?php
    $startDate = $_GET['$startDate'];
    $endDate = $_GET['$endDate'];
    $rota = $_GET['rota'];
    $codCliente = $_GET['$codCliente'];
    $cidade = $_GET['cidade'];

    require '../functions/makeSqlConnectionToOwn.php';
    $OwnSQL = "SELECT * FROM historicoRepresentante";
    $conditions = [];

    if(isset($startDate) && isset($endDate)) {
        $conditions[] = "data BETWEEN '$startDAte' AND '$endDate'";
    }
    if(isset($rota)) {
        $conditions[] = "IDROTA = '$rota'";
    }
    if(isset($codCliente)) {
        $conditions[] = "codigoCliente = '$codCliente'";
    }
    if(isset($cidade)) {
        $conditions[] = "cidade LIKE '%$cidade%'";
    }

    if(!empty($conditions)) {
        $OwnSQL .= "WHERE ".implode(' AND ', $conditions);
    }

    $result = $OwnConn->query($OwnSQL);

    $data = [];
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($data);

    $OwnConn->close();
?>