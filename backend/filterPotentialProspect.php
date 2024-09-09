<?php
    $city = $_GET['city'] ?? null;
    require_once '../functions/makeSqlConnectionToOwn.php';
    if($city != null) {
        $OwnSQL = "SELECT *
        FROM dadospublicos.estabelecimento es
        JOIN dadospublicos.municipio m
        ON es.municipio = m.codigo
        WHERE (es.cnaeFiscalPrincipal IN ('4743100', '4679603')
            OR es.cnaeFiscalSecundaria
            IN ('4743100', '4679603'))
        AND m.descricao LIKE '$city'
        ";
        $OwnResult = $OwnConn->query($OwnSQL);
        $rows = [];
        while ($row = $OwnResult->fetch_assoc()) {
            $rows[] = $row;
        }
        header('Content-Type: application/json');
        echo json_encode($rows);
    } else {
        header('Content-Type: application/json');
        $emptyList = [];
        $emptyList['error'] = 'Empty list';
        echo json_encode($emptyList);
    }
?>