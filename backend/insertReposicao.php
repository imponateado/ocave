<?php
// Function to sanitize input data
function sanitizeInput($data, $conn) {
    return mysqli_real_escape_string($conn, trim($data));
}

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve JSON data from the request body
    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, true); // Convert JSON into an associative array

    // Create a database connection
    require '../functions/makeSqlConnectionToOwn.php'; // This should define $OwnConn

    // Sanitize and assign input data to variables
    $numPed = sanitizeInput($input['numPed'], $OwnConn);
    $sector = sanitizeInput($input['sector'], $OwnConn);
    $issue = sanitizeInput($input['issue'], $OwnConn);
    $quantity = (int) $input['qtd']; // Casting to integer
    $width = (float) $input['width']; // Casting to float
    $height = (float) $input['height']; // Casting to float
    $type = sanitizeInput($input['typeOptions'], $OwnConn);
    $configuration = sanitizeInput($input['configurationOptions'], $OwnConn);
    $observacao = sanitizeInput($input['observacao'], $OwnConn);
    $thick = (int) $input['thickOptions']; // Casting to integer
    $colour = sanitizeInput($input['colourOptions'], $OwnConn);
    $certBy = sanitizeInput($input['certBy'], $OwnConn);
    $repoOptions = (int) $input['repoOptions']; // Casting to integer
    $isItPaid = sanitizeInput($input['isItPaid'], $OwnConn);

    // Construct SQL query
    $OwnSQL = "INSERT INTO historicoReposicao (numPed, sector, issue, quantity, width, height, type, configuration, observacao, thick, colour, certBy, repoOptions, isItPaid) VALUES ('$numPed', '$sector', '$issue', $quantity, $width, $height, '$type', '$configuration', '$observacao', $thick, '$colour', '$certBy', $repoOptions, '$isItPaid')";

    // Execute the query
    if ($OwnConn->query($OwnSQL) === TRUE) {
        echo "Registrado com sucesso";
    } else {
        echo "Erro: " . $OwnConn->error;
    }

    // Close connection
    $OwnConn->close();
} else {
    echo "Método de requisição inválido.";
}
?>
