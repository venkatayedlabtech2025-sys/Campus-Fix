<?php require 'includes/functions.php';
$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_token();
    $em = strtolower(trim($_POST['email'] ?? ''));
    $q = $pdo->prepare('SELECT * FROM users WHERE email=?');
    $q->execute([$em]);
    $u = $q->fetch();
    if ($u && password_verify($_POST['password'] ?? '', $u['password_hash'])) {
        session_regenerate_id(true);
        $_SESSION['uid'] = $u['id'];
        $_SESSION['name'] = $u['name'];
        $_SESSION['role'] = $u['role'];
        header('Location: ' . ($u['role'] === 'admin' ? 'admin/dashboard.php' : 'student/dashboard.php'));
        exit;
    } else $err = 'Incorrect email or password.';
}
$title = 'Login';
$prefix = '';
require 'includes/header.php'; ?><section class="card form">
    <h1>Login</h1><?php if ($err): ?><div class="error"><?= e($err) ?></div><?php endif; ?><form method="post"><input type="hidden" name="token" value="<?= e(token()) ?>">
        <div class="group"><label>Email</label><input type="email" name="email" required></div>
        <div class="group"><label>Password</label><input type="password" name="password" required></div><button>Login</button>
    </form>
    <p>New student? <a href="register.php">Register</a></p>
</section><?php require 'includes/footer.php'; ?>