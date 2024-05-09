<?php
    $ordemCarregamento = $_GET['ordemCarregamento'];
    $nomeContato = $_GET['nomeContato'];
    $ok = $_GET['ok'];
    $semContato = $_GET['semContato'];
    $questionarioEntregas = $_GET['questionarioEntregas'];

    $alerta = $_GET['alerta'];

    $observacao = $_GET['observacao'];

    require '../functions/makeSqlConnectionToOwn.php';

    $sql = "INSERT INTO historicoentregas (ordemCarregamento, nomeContato, ok, semContato, questionarioEntregas, alerta, observacao) VALUES ('$ordemCarregamento', '$nomeContato', '$ok', '$semContato', '$questionarioEntregas', '$alerta', '$observacao')";

    if($OwnConn->query($sql) === TRUE) {
        echo "Registrado com sucesso.";
    } else {
        echo "Erro ao inserir registro:" . $OwnConn->error;
    }
    $OwnConn->close();
?>