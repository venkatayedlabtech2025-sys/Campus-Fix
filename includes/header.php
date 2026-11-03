<?php
$appName = env('APP_NAME', 'CampusFix');
$title = $title ?? $appName;
$prefix = $prefix ?? '';
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title><?= e($title) ?> | <?= e($appName) ?></title>
        <link rel="stylesheet" href="<?= $prefix ?>assets/css/style.css">
    </head>
    <body>
    <header>
        <a class="logo" href="<?= $prefix ?>index.php"><?= e($appName) ?></a>
        <nav>
            <?php if (!empty($_SESSION['uid'])): ?>
                <span>Hi, <?= e($_SESSION['name']) ?>
            </span><a href="<?= $prefix ?>logout.php">Logout</a>
            <?php else: ?>
                <a href="<?= $prefix ?>login.php">Login</a>
                <a href="<?= $prefix ?>register.php">Register</a>
                <?php endif; ?>
            </nav>
        </header>
        <main class="wrap">
