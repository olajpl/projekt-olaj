<?php
session_start();
$configPath = __DIR__ . '/shipping_api_config.json';
if (!file_exists($configPath)) {
  echo json_encode(['error' => 'Brak konfiguracji API.']);
  exit;
}
$config = json_decode(file_get_contents($configPath), true);
$provider = $config['provider'] ?? '';
$apiKey = $config['api_key'] ?? '';

if (!$provider || !$apiKey) {
  echo json_encode(['error' => 'Nieprawidłowe dane.']);
  exit;
}

$url = 'https://api.furgonetka.pl/v2/shipments/services';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
  'Authorization: Bearer ' . $apiKey,
  'Accept: application/json'
]);
$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($http_code === 200) {
  echo json_encode(['status' => '✅ Połączenie udane.', 'response' => json_decode($response, true)]);
} else {
  echo json_encode(['error' => '❌ Błąd połączenia. Kod HTTP: ' . $http_code]);
}