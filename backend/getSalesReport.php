<?php

require_once '../functions/makeSqlConnectionToOwn.php';

$startDate = isset($_GET['startDate']) ? $_GET['startDate'] : false;
$endDate = isset($_GET['endDate']) ? $_GET['endDate'] : false;

if ($endDate) {
    $endDate = date('Y-m-d', strtotime($endDate . ' +1 day'));
}

$vendedor = isset($_GET['vendedor']) ? $_GET['vendedor'] : false;
$rotas = isset($_GET['rotas']) ? $_GET['rotas'] : false;

$conditions = [];
$params = [];
$types = '';

if ($startDate && $endDate) {
    $conditions[] = '`data` BETWEEN ? AND ?';
    $params[] = $startDate;
    $params[] = $endDate;
    $types .= 'ss';
} elseif ($startDate) {
    $conditions[] = '`data` >= ?';
    $params[] = $startDate;
    $types .= 's';
} elseif ($endDate) {
    $conditions[] = '`data` <= ?';
    $params[] = $endDate;
    $types .= 's';
}

if ($vendedor) {
    $conditions[] = "vendedor LIKE ?";
    $params[] = '%' . $vendedor . '%';
    $types .= 's';
}

if ($rotas) {
    $conditions[] = 'IDROTA = ?';
    $params[] = $rotas;
    $types .= 's';
}

$query = "
    SELECT historicoVendas.*, rota_cliente.*
    FROM historicoVendas
    JOIN rota_cliente ON historicoVendas.codigo = rota_cliente.IDCLIENTE
";

error_log("SQL Query: $query");
error_log("Parameters: " . json_encode($params));

if (!empty($conditions) && !empty($params)) {
    $query .= ' WHERE ' . implode(' AND ', $conditions);
    $stmt = $OwnConn->prepare($query);
    $stmt->bind_param($types, ...$params);
} else {
    $stmt = $OwnConn->prepare($query);
}

$stmt->execute();
$result = $stmt->get_result();
$results = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($results);

$stmt->close();
$OwnConn->close();

?>