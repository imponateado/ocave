<?php
    require 'sqlconnection.php';

    $codigo = $_GET["codigo"];
    $vendedor = $_GET["vendedor"];
    $observacao = $_GET["observacao"];
    $isSevere = $_GET["isSevere"];

    $sql = "INSERT INTO historico (codigo, vendedor, observacao, isSevere) VALUES ('$codigo', '$vendedor', '$observacao', '$isSevere')";

    if($conn->query($sql) === TRUE) {
        echo "Registrado com sucesso";
    } else {
        echo "Erro ao inserir registro: " . $conn->error;
    }

    $conn->close();
?>
