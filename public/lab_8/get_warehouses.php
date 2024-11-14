<?php
$apiKey = '';
$url = 'https://api.novaposhta.ua/v2.0/json/';

$cityRef = $_POST['cityRef'];
$deliveryOption = $_POST['deliveryOption'];

$departmentsRefs = [
    "6f8c7162-4b72-4b0a-88e5-906948c6a92f",
    "841339c7-591a-42e2-8233-7a0a00f0ed6f",
    "9a68df70-0267-42a8-bb5c-37f427e36ee4"
];
$postomatsRefs = [
    "95dc212d-479c-4ffb-a8ab-8c1b9073d0bc",
    "f9316480-5f2d-425d-bc2c-ac7cd29decf0"
];

$data = [
    "apiKey" => $apiKey,
    "modelName" => "AddressGeneral",
    "calledMethod" => "getWarehouses",
    "methodProperties" => ["CityRef" => $cityRef]
];

$options = [
    'http' => [
        'header' => "Content-Type: application/json",
        'method' => 'POST',
        'content' => json_encode($data)
    ]
];

$response = json_decode(file_get_contents($url, false, stream_context_create($options)), true);

$filteredBranches = array_filter($response['data'], function($branch) use ($deliveryOption, $departmentsRefs, $postomatsRefs) {
    if ($deliveryOption === 'Відділення') {
        return in_array($branch['TypeOfWarehouse'], $departmentsRefs);
    } elseif ($deliveryOption === 'Поштомат') {
        return in_array($branch['TypeOfWarehouse'], $postomatsRefs);
    }
    return false;
});

echo json_encode(['success' => $response['success'], 'data' => array_values($filteredBranches)]);
