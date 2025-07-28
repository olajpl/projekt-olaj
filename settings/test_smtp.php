<?php
session_start();
$configPath = __DIR__ . '/smtp_config.json';
if (!file_exists($configPath)) {
  echo json_encode(['error' => 'Brak konfiguracji SMTP.']);
  exit;
}
$config = json_decode(file_get_contents($configPath), true);

require_once __DIR__ . '/../vendor/autoload.php'; // Ścieżka do PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = $config['smtp_host'];
    $mail->SMTPAuth = true;
    $mail->Username = $config['smtp_user'];
    $mail->Password = $config['smtp_pass'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = (int)($config['smtp_port'] ?? 587);

    $mail->setFrom($config['from_email'], 'Test SMTP');
    $mail->addAddress($config['from_email']);
    $mail->Subject = 'Test SMTP z Olaj.pl';
    $mail->Body = 'To jest testowy e-mail SMTP.';

    $mail->send();
    echo json_encode(['status' => '✅ E-mail testowy został wysłany.']);
} catch (Exception $e) {
    echo json_encode(['error' => '❌ Błąd SMTP: ' . $mail->ErrorInfo]);
}