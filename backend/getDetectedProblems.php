<?php

$startDate = $_GET['startDate'];
$endDate = $_GET['endDate'];
$rota = $_GET['rota'];

require '../functions/makeSqlConnectionToOwn.php';

// Definição das consultas
$queries = [
    'cobrancaIndevida' => "SELECT COUNT(*) FROM historicoentregas WHERE questionarioEntregas LIKE '%cobrancaIndevida%'",
    'valorIncorreto' => "SELECT COUNT(*) FROM historicoentregas WHERE questionarioEntregas LIKE '%valorIncorreto%'",
    'pedidoIncompleto' => "SELECT COUNT(*) FROM historicoentregas WHERE questionarioEntregas LIKE '%pedidoIncompleto%'",
    'pedidoNaoEntregue' => "SELECT COUNT(*) FROM historicoentregas WHERE questionarioEntregas LIKE '%pedidoNaoEntregue%'",
    'erroEngenharia' => "SELECT COUNT(*) FROM historicoentregas WHERE questionarioEntregas LIKE '%erroEngenharia%'",
    'atendimento' => "SELECT COUNT(*) FROM historicoentregas WHERE questionarioEntregas LIKE '%atendimento%'",
    'avarias' => "SELECT COUNT(*) FROM historicoentregas WHERE questionarioEntregas LIKE '%avarias%'",
    'arranhados' => "SELECT COUNT(*) FROM historicoentregas WHERE questionarioEntregas LIKE '%arranhados%'",
    'atrasoEntrega' => "SELECT COUNT(*) FROM historicoentregas WHERE questionarioEntregas LIKE '%atrasoEntrega%'",
    'vendedor' => "SELECT COUNT(*) FROM historicoentregas WHERE questionarioEntregas LIKE '%vendedor%'",
    'representante' => "SELECT COUNT(*) FROM historicoentregas WHERE questionarioEntregas LIKE '%representante%'",
    'motorista' => "SELECT COUNT(*) FROM historicoentregas WHERE questionarioEntregas LIKE '%motorista%'",
    'carregador' => "SELECT COUNT(*) FROM historicoentregas WHERE questionarioEntregas LIKE '%carregador%'",
    'comReclamacao' => "SELECT COUNT(*) FROM historicoentregas WHERE questionarioEntregas IS NOT NULL AND questionarioEntregas != ''",
    'semReclamacao' => "SELECT COUNT(*) FROM historicoentregas WHERE ok = 1 AND questionarioEntregas = ''",
    'naoAtendidas' => "SELECT COUNT(*) FROM historicoentregas WHERE semContato = 'true'",
    'atendidas' => "SELECT COUNT(*) FROM historicoentregas WHERE semContato = 'false'",
    'totalLigacoes' => "SELECT COUNT(*) FROM historicoentregas"
];

// Array para armazenar os resultados
$results = [];

// Execução das consultas e armazenamento dos resultados
foreach ($queries as $key => $query) {
    $result = $OwnConn->query($query);
    if ($result) {
        $row = $result->fetch_assoc();
        $results[$key] = $row['COUNT(*)'];
    } else {
        $results[$key] = 0; // Caso a consulta falhe
    }
}

$OwnConn->close();
// Agora $results contém todos os contadores
echo json_encode($results);
?>