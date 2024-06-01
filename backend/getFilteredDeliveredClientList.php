<?php
    //filtros
    //----------------------------------------------------------------------------------------------------
    $startDate = $_GET['startDate'];
    $endDate = $_GET['endDate'];
    $rota = $_GET['rota'];
    $codigo = $_GET['codigo'];

    $endDate = date('Y-m-d', strtotime($endDate . ' +1 day'));

    require '../functions/makeSqlConnectionToOwn.php';

    $OwnSQL = "
        SELECT *
        FROM historicoentregas AS h
        INNER JOIN ordem_carga AS o ON h.ordemCarregamento = o.IDORDEMCARGA
        INNER JOIN carregamento AS c ON o.IDCARREGAMENTO = c.IDCARREGAMENTO
    ";

    $conditions = [];

    if (!empty($codigo)) {
        $conditions[] = "IDCLIENTE = $codigo";
    }
    if (!empty($startDate) && !empty($endDate)) {
        $conditions[] = "DATAPREVISTASAIDA BETWEEN '$startDate' AND '$endDate'";
    }
    if (!empty($rota)) {
        $conditions[] = "IDROTA = '$rota'";
    }

    if (!empty($conditions)) {
        $OwnSQL .= " WHERE " . implode(' AND ', $conditions);
    }

    $OwnResult = $OwnConn->query($OwnSQL);

    if (!$OwnResult) {
        die("Query Failed: " . $OwnConn->error);
    }

    $data = [];
    while ($row = $OwnResult->fetch_assoc()) {
        $data[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($data);

    $OwnConn->close();
?>
