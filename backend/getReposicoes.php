<?php

header("Content-Type: application/json");

require '../functions/makeSqlConnectionToOwn.php'; // This imports your mysqli connection

$input = json_decode(file_get_contents("php://input"), true);

// Extract values from input, using null coalescing operator to handle absent keys
$numPed = $input['numPed'] ?? null;
$sector = $input['sector'] ?? null;
$issue = $input['issue'] ?? null;
$type = $input['type'] ?? null;
$configuration = $input['configuration'] ?? null;
$thick = $input['thick'] ?? null;
$colour = $input['colour'] ?? null;

$conditions = [];
$params = [];
$types = '';

// Build the SQL query based on non-null input parameters
if ($numPed) {
    $conditions[] = 'numPed = ?';
    $params[] = $numPed;
    $types .= 's';
}
if ($sector) {
    $conditions[] = 'sector = ?';
    $params[] = $sector;
    $types .= 's';
}
if ($issue) {
    $conditions[] = 'issue = ?';
    $params[] = $issue;
    $types .= 's';
}
if ($type) {
    $conditions[] = 'type = ?';
    $params[] = $type;
    $types .= 's';
}
if ($configuration) {
    $conditions[] = 'configuration = ?';
    $params[] = $configuration;
    $types .= 's';
}
if ($thick !== null) { // checking explicitly for null because it's an integer
    $conditions[] = 'thick = ?';
    $params[] = $thick;
    $types .= 'i';
}
if ($colour) {
    $conditions[] = 'colour = ?';
    $params[] = $colour;
    $types .= 's';
}

$query = "SELECT * FROM historicoReposicao"; // use the actual table name
if (!empty($conditions)) {
    $query .= ' WHERE ' . implode(' AND ', $conditions);
}

$stmt = $OwnConn->prepare($query);

// Bind parameters dynamically
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
$results = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($results);

$stmt->close();
$OwnConn->close();

?>
