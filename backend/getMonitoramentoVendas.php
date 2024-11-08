<?php
    require '../functions/makeSqlConnectionToOwn.php';

    // Get parameters and sanitize
    $codCliente = isset($_GET['codCliente']) ? $_GET['codCliente'] : '';
    $startDate = isset($_GET['startDate']) ? $_GET['startDate'] : '';
    $endDate = isset($_GET['endDate']) ? $_GET['endDate'] : '';
    $vendedor = isset($_GET['vendedor']) ? $_GET['vendedor'] : '';

    $endDate = date('Y-m-d', strtotime($endDate . ' +1 day'));

    $conditions = [];
    $params = [];

    if (!empty($codCliente)) {
        $conditions[] = "codigo = ?";
        $params[] = $codCliente;
    }
    if (!empty($startDate) && !empty($endDate)) {
        $conditions[] = "data BETWEEN ? AND ?";
        $params[] = $startDate;
        $params[] = $endDate;
    }
    if (!empty($vendedor)) {
        $conditions[] = "vendedor LIKE ?";
        $params[] = "%$vendedor%";
    }

    $sql = "SELECT * FROM historicoVendas";
    if (!empty($conditions)) {
        $sql .= " WHERE " . implode(' AND ', $conditions);
    }

    $stmt = $OwnConn->prepare($sql);
    if ($stmt === false) {
        // Handle error
        echo json_encode(['error' => 'Failed to prepare the SQL statement']);
        exit();
    }

    if (!empty($params)) {
        $types = str_repeat('s', count($params));
        $stmt->bind_param($types, ...$params);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($data);

    $stmt->close();
    $OwnConn->close();
?>
