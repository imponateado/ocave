<?php
    require '../functions/makeSqlConnectionToOwn.php';

    // Get the raw POST data and decode the JSON
    $rawData = file_get_contents("php://input");
    $data = json_decode($rawData, true);

    // Extract variables from the decoded JSON
    $codCliente = $data['codCliente'];
    $numPed = $data['numPed'];
    $sector = $data['sector'];
    $issue = $data['issue'];
    $qtd = $data['qtd'];
    $width = $data['width'];
    $height = $data['height'];
    $type = $data['type'];
    $setting = $data['setting'];
    $thick = $data['thick'];
    $opening = $data['opening'];
    $colour = $data['colour'];
    $certBy = $data['certBy'];
    $obs = $data['obs'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO historicoReposicao (codCliente, numPed, sector, issue, quantity, width, height, type, configuration, opening, observacao, thick, colour, certBy) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssiddssissss", $codCliente, $numPed, $sector, $issue, $qtd, $width, $height, $type, $setting, $thick, $opening, $colour, $certBy, $obs);
    $stmt->execute();

    // Prepare the response
    $response = [];
    if ($stmt->error) {
        $response['error'] = true;
        $response['message'] = "Erro: " . $stmt->error;
    } else {
        $response['error'] = false;
        $response['message'] = "Gravado com sucesso";
    }
    
    echo json_encode($response);

    // Close statement and connection
    $stmt->close();
    $conn->close();
?>
