<?php
session_start();

$data = [
    'autologin_enabled' => $_POST['autologin_enabled'] ?? '',
    'login_limit' => $_POST['login_limit'] ?? ''
];

file_put_contents(__DIR__ . '/security_config.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
$_SESSION['success_message'] = 'Ustawienia zapisane.';
header('Location: index.php?tab=security');
exit;
