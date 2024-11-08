<?php

$startDate = $_GET['startDate'] ?? null;
$endDate = $_GET['endDate'] ?? null;
$vendedor = $_GET['vendedor'] ?? null;
$rota = $_GET['rota'] ?? null;

require_once '../functions/makeSqlConnectionToOwn.php';
$OwnSQL = "SELECT *
FROM historicoVendas
JOIN rota_cliente ON historicoVendas.codigo = rota_cliente.IDCLIENTE";

$params = [];
$conditions = [];

if ($startDate != null && $endDate != null) {
    $conditions[] = "`data` BETWEEN ? AND ?";
    $params[] = $startDate;
    $params[] = $endDate;
} else if ($startDate != null) {
    $conditions[] = "`data` >= ?";
    $params[] = $startDate;
} else if ($endDate != null) {
    $conditions[] = "`data` <= ?";
    $params[] = $endDate;
}

if ($vendedor != null && $vendedor != '') {
    $conditions[] = 'vendedor = ?';
    $params[] = $vendedor;
}

if ($rota != null && $rota != '') {
    $conditions[] = 'IDROTA = ?';
    $params[] = $rota;
}

if (!empty($conditions)) {
    $OwnSQL .= " WHERE " . implode(' AND ', $conditions);
}

$stmt = $OwnConn->prepare($OwnSQL);

if (!empty($params)) {
    $types = str_repeat('s', count($params));
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();

$OwnRows = [];

while ($Row = $result->fetch_assoc()) {
    $OwnRows[] = $Row;
}

$stmt->close();

$OwnSQL = "SELECT DISTINCT vendedor FROM historicoVendas";
$stmt = $OwnConn->prepare($OwnSQL);
$stmt->execute();
$listResult = $stmt->get_result();

$listSalesPersons = [];

while ($listrow = $listResult->fetch_assoc()) {
    $listSalesPersons[] = $listrow['vendedor'];
}

$stmt->close();

$contentToBeSent = [$listSalesPersons, $OwnRows];

header('Content-Type: application/json');
echo json_encode($contentToBeSent);
?>