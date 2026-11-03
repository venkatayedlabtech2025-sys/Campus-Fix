<?php
require '../includes/functions.php';

$name  = env('ADMIN_NAME', 'CampusFix Admin');
$email = env('ADMIN_EMAIL', 'admin@campusfix.local');
$pass  = env('ADMIN_PASSWORD', 'Admin@12345');

$q = $pdo->prepare('SELECT id FROM users WHERE email=?');
$q->execute([$email]);
if ($q->fetch()) {
    echo 'Admin already exists. Delete this file now.';
} else {
    $q = $pdo->prepare("INSERT INTO users(name,email,password_hash,role) VALUES(?,?,?, 'admin')");
    $q->execute([$name, $email, password_hash($pass, PASSWORD_DEFAULT)]);
    echo 'Admin created. Login email: ' . e($email) . ' Password: ' . e($pass) . '. DELETE THIS FILE NOW.';
}
