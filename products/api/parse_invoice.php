<?php
require_once __DIR__ . '/../../includes/auth.php';
$_SESSION['parsed_invoice_data'] = [['name'=>'Z faktury','code'=>'XYZ123']];
header('Location: ../bulk_add.php');