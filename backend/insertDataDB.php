<?php
    $ordemCarregamento = $_GET['ordemCarregamento'];
    $nomeContato = $_GET['nomeContato'];
    $telefoneContato = $_GET['telefoneContato'];
    $semContato = $_GET['semContato'];
    $questionarioEntregas = $_GET['questionarioEntregas'];

    $avaliacaoEmpresa = $_GET['avaliacaoEmpresa'];

    $alerta = $_GET['alerta'];

    $observacao = $_GET['observacao'];
    $produtoGostariaEntregasse = $_GET['produtoGostariaEntregasse'];

    require '../functions/makeSqlConnectionToOwn.php';

    $sql = "INSERT INTO historicoentregas (ordemCarregamento, nomeContato, telefoneContato, semContato, questionarioEntregas, avaliacaoEmpresa, alerta, observacao, produtoGostariaEntregasse) VALUES ('$ordemCarregamento', '$nomeContato', '$telefoneContato', '$semContato', '$questionarioEntregas', '$avaliacaoEmpresa', '$alerta', '$observacao', '$produtoGostariaEntregasse')";

    if($OwnConn->query($sql) === TRUE) {
        echo "Registrado com sucesso.";
    } else {
        echo "Erro ao inserir registro:" . $OwnConn->error;
    }
    $OwnConn->close();
?>