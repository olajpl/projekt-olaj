<?php
session_start();
if (empty($_POST['invoice_token'])) { $_SESSION['error_message'] = 'Uzupełnij token i domenę Fakturowni.'; header('Location: index.php?tab=invoicing'); exit; }
if (empty($_POST['invoice_domain'])) { $_SESSION['error_message'] = 'Uzupełnij token i domenę Fakturowni.'; header('Location: index.php?tab=invoicing'); exit; }

$data = [
    'invoice_token' => $_POST['invoice_token'] ?? '',
    'invoice_domain' => $_POST['invoice_domain'] ?? '',
    'invoice_default_type' => $_POST['invoice_default_type'] ?? ''
];
file_put_contents(__DIR__ . '/invoicing_config.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
$_SESSION['success_message'] = 'Ustawienia zapisane.';
header('Location: index.php?tab=invoicing');
exit;
