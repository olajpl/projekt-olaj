<?php
session_start();
if (empty($_POST['provider'])) { $_SESSION['error_message'] = 'Wymagane dane: provider i api_key.'; header('Location: index.php?tab=shipping_api'); exit; }
if (empty($_POST['api_key'])) { $_SESSION['error_message'] = 'Wymagane dane: provider i api_key.'; header('Location: index.php?tab=shipping_api'); exit; }

$data = [
    'provider' => $_POST['provider'] ?? '',
    'api_key' => $_POST['api_key'] ?? '',
    'sandbox_mode' => $_POST['sandbox_mode'] ?? ''
];
file_put_contents(__DIR__ . '/shipping_api_config.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
$_SESSION['success_message'] = 'Ustawienia zapisane.';
header('Location: index.php?tab=shipping');
exit;
