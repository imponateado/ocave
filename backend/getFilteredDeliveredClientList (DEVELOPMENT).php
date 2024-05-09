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

$OwnSQL = "";