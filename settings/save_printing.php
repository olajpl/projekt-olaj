<?php
session_start();

$data = [
    'auto_print' => $_POST['auto_print'] ?? '',
    'refresh_interval' => $_POST['refresh_interval'] ?? '',
    'label_size' => $_POST['label_size'] ?? ''
];

file_put_contents(__DIR__ . '/printing_config.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
$_SESSION['success_message'] = 'Ustawienia zapisane.';
header('Location: index.php?tab=printing');
exit;
