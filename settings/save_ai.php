<?php
session_start();
$data = [
    'ai_enabled' => $_POST['ai_enabled'] ?? '',
    'gpt_model' => $_POST['gpt_model'] ?? '',
    'raport_interval' => $_POST['raport_interval'] ?? ''
];
file_put_contents(__DIR__ . '/ai_config.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
$_SESSION['success_message'] = 'Ustawienia zapisane.';
header('Location: index.php?tab=automation');
exit;
