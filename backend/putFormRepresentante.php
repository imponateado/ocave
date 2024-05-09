<?php
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    require '../functions/makeSqlConnectionToOwn.php';
    $OwnSQL = "INSERT INTO historicoRepresentante (";

    $columns = array_keys($data);
    $OwnSQL .= implode(", ", $columns);

    $OwnSQL .= ") VALUES (";

    $values = array_values($data);
    $values = array_map(array($OwnConn, 'real_escape_string'), $values); // Escape dos valores para evitar SQL Injection
    $OwnSQL .= "'" . implode("', '", $values) . "'";

    $OwnSQL .= ")";

    if ($OwnConn->query($OwnSQL) === TRUE) {
        echo "Registrado com sucesso.";
    } else {
        echo "Error: " . $sql . "<br>" . $OwnConn->error;
    }
    $OwnConn->close();
?>