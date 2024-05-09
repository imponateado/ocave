<?php
//filtros
//----------------------------------------------------------------------------------------------------
$startDate = $_GET['startDate'];
$endDate = $_GET['endDate'];
$rota = $_GET['rota'];
$codigo = $_GET['codigo'];

$endDate = date('Y-m-d', strtotime($endDate . ' +1 day'));

//faz conexão com o banco de dados do Ocave, busca todas as linhas e transforma numa array
//----------------------------------------------------------------------------------------------------
require '../functions/makeSqlConnectionToOwn.php';

$OwnSQL = "SELECT * FROM historicoentregas";
$OwnResult = $OwnConn->query($OwnSQL);
$OwnConn->close();

$OwnDBArray = array();

while ($row = $OwnResult->fetch_assoc()) {
    $OwnDBArray[] = $row;
}

//pega todas as ordens de carga da tabela do Ocave e põe numa string
//----------------------------------------------------------------------------------------------------
$allOwnDBOrdemCargas = array();

foreach ($OwnDBArray as $row) {
    $allOwnDBOrdemCargas[] = $row["ordemCarregamento"];
}

$allOwnDBOrdemCargas = '(' . implode(', ', $allOwnDBOrdemCargas) . ')';

//faz conexão com o banco de dados do Ocave, busca todas as linhas e transforma numa array
//----------------------------------------------------------------------------------------------------
require '../functions/makeSqlConnectionToWG.php';
$WGSQL = "SELECT ordem_carga.*, carregamento.*
FROM ordem_carga
INNER JOIN carregamento ON ordem_carga.IDCARREGAMENTO = carregamento.IDCARREGAMENTO
WHERE ordem_carga.IDORDEMCARGA IN $allOwnDBOrdemCargas;
";
$WGResult = $WGConn->query($WGSQL);
$WGConn->close();

$OwnWGArray = array();

while ($row = $WGResult->fetch_assoc()) {
    $OwnWGArray[] = $row;
}

//mescla as duas tabelas
//----------------------------------------------------------------------------------------------------

$mergedTables = array();

foreach ($OwnWGArray as $item) {
    $idOrdemCarga = $item["IDORDEMCARGA"];
    $mergedTables[$idOrdemCarga] = $item;
}

foreach ($OwnDBArray as $item) {
    $ordemCarregamento = $item["ordemCarregamento"];
    if (isset($mergedTables[$ordemCarregamento])) {
        // Use array_merge_recursive para mesclar arrays que têm chaves em comum
        $mergedTables[$ordemCarregamento] = array_merge_recursive($mergedTables[$ordemCarregamento], $item);
    } else {
        $mergedTables[$ordemCarregamento] = $item;
    }
}

//filtra os dados
function filterData($mergedTables, $startDate = null, $endDate = null, $rota = null) {

    $filteredData = $mergedTables;

    if ($startDate) {
        $filteredData = array_filter($filteredData, function($item) use ($startDate) {
            return $item["DATAPREVISTASAIDA"] >= $startDate;
        });
    }

    if ($endDate) {
        $filteredData = array_filter($filteredData, function($item) use ($endDate) {
            return $item["DATAPREVISTASAIDA"] <= $endDate;
        });
    }

    if ($rota) {
        $filteredData = array_filter($filteredData, function($item) use ($rota) {
            return $item["IDROTA"] == $rota;
        });
    }

    return $filteredData;
}

echo json_encode(filterData($mergedTables, $startDate, $endDate, $rota));
?>