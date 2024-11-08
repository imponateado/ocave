<?php
    $vendedor = $_GET['vendedor'];
    $clienteNaoAtendeu = $_GET['clienteNaoAtendeu'];
    $fantasma = $_GET['fantasma'];
    $representante = $_GET['representante'];
    $preco = $_GET['preco'];
    $fornecedor = $_GET['fornecedor'];
    $acao = $_GET['acao'];
    $obsCliente = $_GET['obsCliente'];
    $contato = $_GET['contato'];
    $obsVendedor = $_GET['obsVendedor'];
    $codigo = $_GET['codigo'];

    require '../functions/makeSqlConnectionToOwn.php';

    $sql = "INSERT INTO historicoVendas (codigo, vendedor, clienteNaoAtendeu, fantasma, representante, preco, fornecedor, acao, obsCliente, contato, obsVendedor) VALUES ('$codigo', '$vendedor', '$clienteNaoAtendeu', '$fantasma', '$representante', '$preco', '$fornecedor', '$acao', '$obsCliente', '$contato', '$obsVendedor')";

    if($OwnConn->query($sql) === TRUE) {
        echo "Registrado com sucesso.";
    } else {
        echo "Erro ao inserir registro:" . $OwnConn->error;
    }
    
    $OwnConn->close();
?>