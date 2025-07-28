<?php
session_start();
$configPath = __DIR__ . '/invoicing_config.json';
if (!file_exists($configPath)) {
  echo json_encode(['error' => 'Brak konfiguracji Fakturowni.']);
  exit;
}
$config = json_decode(file_get_contents($configPath), true);
$token = $config['invoice_token'] ?? '';
$domain = $config['invoice_domain'] ?? '';

if (!$token || !$domain) {
  echo json_encode(['error' => 'Brak tokenu lub domeny.']);
  exit;
}

$url = 'https://' . $domain . '.fakturownia.pl/invoices.json?api_token=' . $token;
$response = @file_get_contents($url);
$http_code = $http_response_header[0] ?? '';

if (strpos($http_code, '200') !== false) {
  echo json_encode(['status' => '✅ Połączenie z Fakturownią udane.']);
} else {
  echo json_encode(['error' => '❌ Błąd połączenia: ' . $http_code]);
}