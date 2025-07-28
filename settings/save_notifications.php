<?php
session_start();

$data = [
    'notif_panel' => $_POST['notif_panel'] ?? '',
    'notif_system' => $_POST['notif_system'] ?? '',
    'notif_email' => $_POST['notif_email'] ?? '',
    'notif_messenger' => $_POST['notif_messenger'] ?? '',
    'notif_push' => $_POST['notif_push'] ?? ''
];

file_put_contents(__DIR__ . '/notifications_config.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
$_SESSION['success_message'] = 'Ustawienia zapisane.';
header('Location: index.php?tab=notifications');
exit;
