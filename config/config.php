<?php
$config = file_exists(__DIR__ . '/config.local.php')
    ? include __DIR__ . '/config.local.php'
    : [
        'host' => 'borowikmar1.mysql.dhosting.pl',
        'db'   => 'eew3ha_adminola',
        'user' => 'niew4m_adminola',
        'pass' => 'b0anUfr+th9ti',
    ];

function getPDO(): PDO {
    global $config;
    $dsn = "mysql:host={$config['host']};dbname={$config['db']};charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        return new PDO($dsn, $config['user'], $config['pass'], $options);
    } catch (PDOException $e) {
        http_response_code(500);
        echo "Błąd połączenia z bazą: " . $e->getMessage();
        exit;
    }
}
