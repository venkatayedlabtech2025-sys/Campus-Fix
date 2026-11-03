<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();
require_once __DIR__ . '/../config/env.php';
require_once __DIR__ . '/../config/database.php';

function e($v)
{
    return htmlspecialchars((string) $v, ENT_QUOTES, 'UTF-8');
}

function login_required()
{
    if (empty($_SESSION['uid'])) {
        header('Location: ../login.php');
        exit;
    }
}

function admin_required()
{
    login_required();
    if (($_SESSION['role'] ?? '') !== 'admin') {
        http_response_code(403);
        exit('Access denied');
    }
}

function token()
{
    if (empty($_SESSION['token']))
        $_SESSION['token'] = bin2hex(random_bytes(32));
    return $_SESSION['token'];
}

function verify_token()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !hash_equals($_SESSION['token'] ?? '', $_POST['token'] ?? '')) {
        exit('Invalid form token. Go back and retry.');
    }
}
