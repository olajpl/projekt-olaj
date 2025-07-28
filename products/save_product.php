<?php
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../config/config.php';
$pdo = getPDO();
$name = $_POST['name'] ?? '';
$code = $_POST['code'] ?? '';
$print = isset($_POST['print_label']);
$pdo->prepare("INSERT INTO products (name, code) VALUES (?, ?)")->execute([$name, $code]);
if ($print) $pdo->prepare("INSERT INTO product_labels_queue (product_id, created_at) VALUES (LAST_INSERT_ID(), NOW())")->execute();
header('Location: index.php');