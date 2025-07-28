<?php
session_start();

$data = [
    'theme_mode' => $_POST['theme_mode'] ?? '',
    'theme_color' => $_POST['theme_color'] ?? ''
];

file_put_contents(__DIR__ . '/theme_config.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
$_SESSION['success_message'] = 'Ustawienia zapisane.';
header('Location: index.php?tab=theme');
exit;
