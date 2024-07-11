<?php
    $idtransacao = $_GET['idtransacao'];

    $clientId = '0e9e5784-efca-3090-a083-9f02c677e962';
    $clientSecret = 'f61b753d-20bd-4bb5-bf5d-37ebd1893847';
    $tokenUrl = 'https://oauthd.itau/identity/connect/token'
    $apiUrl = 'https://devportal.itau.com.br/sandboxapi/itau-ep9-gtw-pix-recebimentos-conciliacoes-v2-ext/v2';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $tokenUrl);
    
?>