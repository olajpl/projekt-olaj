<?php
require_once __DIR__ . '/../../includes/auth.php';
require_once __DIR__ . '/../../config/config.php';
$pdo = getPDO();
foreach ($_POST['name'] as $i => $name) {
  $code = $_POST['code'][$i];
  if ($name && $code) {
    $pdo->prepare("INSERT INTO products (name, code) VALUES (?, ?)")->execute([$name, $code]);
  }
}
header('Location: ../bulk_add.php');