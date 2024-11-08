<?php
    $startDate = isset($_GET['startDate']) ? $_GET['startDate'] : '';
    $endDate = isset($_GET['endDate']) ? $_GET['endDate'] : '';
    $rota = isset($_GET['rota']) ? $_GET['rota'] : '';

    require '../functions/makeSqlConnectionToOwn.php';

    $sql = "
        SELECT COUNT(*) as total,
               SUM(CASE WHEN questionarioEntregas != '' THEN 1 ELSE 0 END) as comReclamacao,
               SUM(CASE WHEN questionarioEntregas = '' THEN 1 ELSE 0 END) as semReclamacao,
               SUM(CASE WHEN questionarioEntregas LIKE '%cobrancaIndevida%' THEN 1 ELSE 0 END) as cobrancaIndevida,
               SUM(CASE WHEN questionarioEntregas LIKE '%valorIncorreto%' THEN 1 ELSE 0 END) as valorIncorreto,
               SUM(CASE WHEN questionarioEntregas LIKE '%pedidoIncompleto%' THEN 1 ELSE 0 END) as pedidoIncompleto,
               SUM(CASE WHEN questionarioEntregas LIKE '%pedidoNaoEntregue%' THEN 1 ELSE 0 END) as pedidoNaoEntregue,
               SUM(CASE WHEN questionarioEntregas LIKE '%erroEngenharia%' THEN 1 ELSE 0 END) as erroEngenharia,
               SUM(CASE WHEN questionarioEntregas LIKE '%atendimento%' THEN 1 ELSE 0 END) as atendimento,
               SUM(CASE WHEN questionarioEntregas LIKE '%avarias%' THEN 1 ELSE 0 END) as avarias,
               SUM(CASE WHEN questionarioEntregas LIKE '%arranhados%' THEN 1 ELSE 0 END) as arranhados,
               SUM(CASE WHEN questionarioEntregas LIKE '%atrasoEntrega%' THEN 1 ELSE 0 END) as atrasoEntrega,
               SUM(CASE WHEN questionarioEntregas LIKE '%vendedor%' THEN 1 ELSE 0 END) as vendedor,
               SUM(CASE WHEN questionarioEntregas LIKE '%representante%' THEN 1 ELSE 0 END) as representante,
               SUM(CASE WHEN questionarioEntregas LIKE '%motorista%' THEN 1 ELSE 0 END) as motorista,
               SUM(CASE WHEN questionarioEntregas LIKE '%carregador%' THEN 1 ELSE 0 END) as carregador,
               SUM(CASE WHEN semContato = 'true' THEN 1 ELSE 0 END) as semContatoTrue,
                SUM(CASE WHEN semContato = 'false' THEN 1 ELSE 0 END) as semContatoFalse
        FROM historicoentregas
        JOIN ordem_carga ON historicoentregas.ordemCarregamento = ordem_carga.IDORDEMCARGA
        JOIN carregamento ON ordem_carga.IDCARREGAMENTO = carregamento.IDCARREGAMENTO
    ";

    $conditions = [];
    if ($startDate != '') {
        $conditions[] = "DATAPREVISTASAIDA > '$startDate'";
    }
    if ($endDate != '') {
        $conditions[] = "DATAPREVISTASAIDA < '$endDate'";
    }
    if ($rota != '') {
        $conditions[] = "IDROTA = '$rota'";
    }

    if (count($conditions) > 0) {
        $sql .= " WHERE " . implode(' AND ', $conditions);
    }

    $result = $OwnConn->query($sql);
    $row = $result->fetch_assoc(); // Armazena o resultado da consulta na variável $row
    $OwnConn->close();

    echo json_encode($row); // Envia o resultado para o frontend em formato JSON
?>
