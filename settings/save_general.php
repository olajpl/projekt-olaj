<?php
session_start();

$data = [
    'site_name' => $_POST['site_name'] ?? '',
    'mode' => $_POST['mode'] ?? '',
    'timezone' => $_POST['timezone'] ?? '',
    'datetime_format' => $_POST['datetime_format'] ?? '',
    'default_label_size' => $_POST['default_label_size'] ?? '',
    'notification_interval' => $_POST['notification_interval'] ?? ''
];

file_put_contents(__DIR__ . '/settings.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
$_SESSION['success_message'] = 'Ustawienia zapisane.';
header('Location: index.php?tab=general');
exit;
