<?php require 'includes/functions.php';
$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_token();
    $n = trim($_POST['name'] ?? '');
    $em = strtolower(trim($_POST['email'] ?? ''));
    $pw = $_POST['password'] ?? '';
    if (!$n || !filter_var($em, FILTER_VALIDATE_EMAIL) || strlen($pw) < 8) $err = 'Enter your name, a valid email and password of at least 8 characters.';
    else {
        try {
            $q = $pdo->prepare("INSERT INTO users(name,email,password_hash,role) VALUES(?,?,?,'student')");
            $q->execute([$n, $em, password_hash($pw, PASSWORD_DEFAULT)]);
            $_SESSION['uid'] = $pdo->lastInsertId();
            $_SESSION['name'] = $n;
            $_SESSION['role'] = 'student';
            header('Location: student/dashboard.php');
            exit;
        } catch (PDOException $e) {
            $err = 'Email already registered. Please login.';
        }
    }
}
$title = 'Register';
$prefix = '';
require 'includes/header.php'; ?><section class="card form">
    <h1>Student registration</h1><?php if ($err): ?><div class="error"><?= e($err) ?></div><?php endif; ?><form method="post"><input type="hidden" name="token" value="<?= e(token()) ?>">
        <div class="group"><label>Full name</label><input name="name" required></div>
        <div class="group"><label>Email</label><input type="email" name="email" required></div>
        <div class="group"><label>Password (at least 8 characters)</label><input type="password" name="password" minlength="8" required></div><button>Register</button>
    </form>
    <p>Already registered? <a href="login.php">Login</a></p>
</section><?php require 'includes/footer.php'; ?>