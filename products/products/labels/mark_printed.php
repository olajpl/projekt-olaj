<?php
require_once __DIR__ . '/../../includes/auth.php';
require_once __DIR__ . '/../../config/config.php';
$pdo = getPDO();
$pdo->query("DELETE FROM product_labels_queue"); // uproszczenie
echo 'OK';