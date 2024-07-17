<?php
$idtransacao = $_GET['idtransacao'];

$clientId = '0e9e5784-efca-3090-a083-9f02c677e962';
$clientSecret = 'f61b753d-20bd-4bb5-bf5d-37ebd1893847';
$tokenUrl = 'https://oauthd.itau/identity/connect/token';
$apiUrl = 'https://devportal.itau.com.br/sandboxapi/itau-ep9-gtw-pix-recebimentos-conciliacoes-v2-ext/v2';

// Obter o token OAuth2
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $tokenUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'grant_type' => 'client_credentials',
    'client_id' => $clientId,
    'client_secret' => $clientSecret
]));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/x-www-form-urlencoded'
]);

$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Erro na solicitação de token: ' . curl_error($ch);
    exit;
}
curl_close($ch);

$responseData = json_decode($response, true);
if (!isset($responseData['access_token'])) {
    echo 'Erro ao obter o token de acesso';
    exit;
}

$accessToken = $responseData['access_token'];

// Fazer a chamada à API com o token obtido
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl . '/lancamentos_pix?e2eid=' . $idtransacao);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $accessToken,
    'Content-Type: application/json'
]);

$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Erro na chamada à API: ' . curl_error($ch);
    exit;
}
curl_close($ch);

$apiResponseData = json_decode($response, true);
if (!$apiResponseData) {
    echo 'Erro ao obter a resposta da API';
    exit;
}

// Processar a resposta da API conforme necessário
echo '<pre>';
print_r($apiResponseData);
echo '</pre>';
?>