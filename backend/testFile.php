<?php
// Verifica se há dados de entrada
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Lê os dados de entrada (corpo da requisição)
    $input = file_get_contents('php://input');
    
    // Retorna os dados de entrada
    echo $input;
} else {
    echo "Por favor, envie uma requisição GET.";
}
?>