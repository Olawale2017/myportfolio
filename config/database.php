<?php
$databaseConfig = [
    'host' => 'localhost',
    'database' => 'portfolio_db',
    'username' => 'portfolio_user',
    'password' => 'change_this_password',
    'charset' => 'utf8mb4',
];

function db(): PDO
{
    static $pdo = null;
    global $databaseConfig;

    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $dsn = sprintf(
        'mysql:host=%s;dbname=%s;charset=%s',
        $databaseConfig['host'],
        $databaseConfig['database'],
        $databaseConfig['charset']
    );

    $pdo = new PDO($dsn, $databaseConfig['username'], $databaseConfig['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);

    return $pdo;
}
