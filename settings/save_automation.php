<?php
session_start();

$data = [
    'auto_reply' => $_POST['auto_reply'] ?? ''
];

file_put_contents(__DIR__ . '/automation_config.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
$_SESSION['success_message'] = 'Ustawienia zapisane.';
header('Location: index.php?tab=automation');
exit;
