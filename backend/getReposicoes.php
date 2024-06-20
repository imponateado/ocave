<?php
// Capture POST data
$startDate = $_POST['startDate'] ?? null;

$endDate = $_POST['endDate'] ?? null;

if ($endDate) {
    // Add one day to the end date
    $endDate = date('Y-m-d', strtotime($endDate . ' +1 day'));
}


$codRep = $_POST['codRep'] ?? null;
$numped = $_POST['numped'] ?? null;
$type = $_POST['type'] ?? null;
$configuration = $_POST['configuration'] ?? null;
$thick = $_POST['thick'] ?? null;
$colour = $_POST['colour'] ?? null;
$sector = $_POST['sector'] ?? null;
$issue = $_POST['issue'] ?? null;

// Include the database connection
require '../functions/makeSqlConnectionToOwn.php';

// Begin constructing the SQL query
$OwnSQL = "SELECT * FROM historicoReposicao WHERE 1 = 1"; // Changed to always have a WHERE clause

// Append conditions based on provided POST data
if ($startDate && $endDate) {
    $OwnSQL .= " AND created_at BETWEEN ? AND ?";
    $params[] = $startDate;
    $params[] = $endDate;  // Now includes the additional day
} else {
    if ($startDate) {
        $OwnSQL .= " AND created_at >= ?";
        $params[] = $startDate;
    }
    if ($endDate) {
        $OwnSQL .= " AND created_at <= ?";
        $params[] = $endDate;  // Now includes the additional day
    }
}

if ($codRep) {
    $OwnSQL .= " AND codRep = ?";
}
if ($numped) {
    $OwnSQL .= " AND numped = ?";
}
if ($type) {
    $OwnSQL .= " AND type = ?";
}
if ($configuration) {
    $OwnSQL .= " AND configuration = ?";
}
if ($thick) {
    $OwnSQL .= " AND thick = ?";
}
if ($colour) {
    $OwnSQL .= " AND colour = ?";
}
if ($sector) {
    $OwnSQL .= " AND sector = ?";
}
if ($issue) {
    $OwnSQL .= " AND issue = ?";
}

// Prepare the SQL statement
$stmt = $OwnConn->prepare($OwnSQL);

// Bind parameters dynamically
$params = [];
if ($date) $params[] = $date;
if ($codRep) $params[] = $codRep;
if ($numped) $params[] = $numped;
if ($type) $params[] = $type;
if ($configuration) $params[] = $configuration;
if ($thick) $params[] = $thick;
if ($colour) $params[] = $colour;
if ($sector) $params[] = $sector;
if ($issue) $params[] = $issue;

// Execute the statement
$stmt->execute($params);

// Check for mysqlnd
if (method_exists($stmt, 'get_result')) {
    $result = $stmt->get_result();
    $results = $result->fetch_all(MYSQLI_ASSOC);
} else {
    // Fallback if mysqlnd is not available
    $results = [];
    $stmt->store_result();
    $variables = [];
    $data = [];
    $meta = $stmt->result_metadata();
    while ($field = $meta->fetch_field()) {
        $variables[] = &$data[$field->name]; // Pass by reference
    }
    call_user_func_array([$stmt, 'bind_result'], $variables);
    while ($stmt->fetch()) {
        $results[] = [];
        foreach($data as $k => $v)
            $results[array_key_last($results)][$k] = $v;
    }
}

// Convert data to JSON format
$jsonData = json_encode($results);

// Set Content-Type header to application/json for proper client handling
header('Content-Type: application/json');

// Output the JSON data
echo $jsonData;
?>
