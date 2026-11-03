<?php
require_once __DIR__ . '/env.php';

$host = env('DB_HOST', 'localhost');
$port = env('DB_PORT', '3306');
$db   = env('DB_NAME', 'campusfix');
$user = env('DB_USER', 'root');
$pass = env('DB_PASS', '');

try {
    $dsn = "mysql:host={$host}" . ($port ? ";port={$port}" : '') . ";dbname={$db};charset=utf8mb4";
    $pdo = new PDO(
        $dsn,
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $e) {
    exit('Database connection failed. Check MySQL and .env configuration.');
}
