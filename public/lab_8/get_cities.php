<?php
$apiKey = '';
$url = 'https://api.novaposhta.ua/v2.0/json/';

$data = [
    "apiKey" => $apiKey,
    "modelName" => "Address",
    "calledMethod" => "getCities"
];

$options = [
    'http' => [
        'header' => "Content-Type: application/json",
        'method' => 'POST',
        'content' => json_encode($data)
    ]
];

$response = file_get_contents($url, false, stream_context_create($options));
echo $response;
