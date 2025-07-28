<?php
session_start();
if (empty($_POST['smtp_host'])) { $_SESSION['error_message'] = 'Wypełnij wszystkie pola SMTP, łącznie z e-mailem nadawcy.'; header('Location: index.php?tab=smtp'); exit; }
if (empty($_POST['smtp_port'])) { $_SESSION['error_message'] = 'Wypełnij wszystkie pola SMTP, łącznie z e-mailem nadawcy.'; header('Location: index.php?tab=smtp'); exit; }
if (empty($_POST['smtp_user'])) { $_SESSION['error_message'] = 'Wypełnij wszystkie pola SMTP, łącznie z e-mailem nadawcy.'; header('Location: index.php?tab=smtp'); exit; }
if (empty($_POST['smtp_pass'])) { $_SESSION['error_message'] = 'Wypełnij wszystkie pola SMTP, łącznie z e-mailem nadawcy.'; header('Location: index.php?tab=smtp'); exit; }
if (empty($_POST['from_email'])) { $_SESSION['error_message'] = 'Wypełnij wszystkie pola SMTP, łącznie z e-mailem nadawcy.'; header('Location: index.php?tab=smtp'); exit; }

$data = [
    'smtp_host' => $_POST['smtp_host'] ?? '',
    'smtp_port' => $_POST['smtp_port'] ?? '',
    'smtp_user' => $_POST['smtp_user'] ?? '',
    'smtp_pass' => $_POST['smtp_pass'] ?? '',
    'from_email' => $_POST['from_email'] ?? ''
];
file_put_contents(__DIR__ . '/smtp_config.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
$_SESSION['success_message'] = 'Ustawienia zapisane.';
header('Location: index.php?tab=notifications');
exit;
