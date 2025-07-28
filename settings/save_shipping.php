<?php
session_start();

$data = [
    'default_carrier' => $_POST['default_carrier'] ?? '',
    'default_cost' => $_POST['default_cost'] ?? ''
];

file_put_contents(__DIR__ . '/shipping_config.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
$_SESSION['success_message'] = 'Ustawienia zapisane.';
header('Location: index.php?tab=shipping');
exit;
