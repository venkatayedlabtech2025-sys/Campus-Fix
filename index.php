<?php require 'includes/functions.php';
if (!empty($_SESSION['uid'])) {
    header('Location: ' . ($_SESSION['role'] === 'admin' ? 'admin/dashboard.php' : 'student/dashboard.php'));
    exit;
}
$title = 'Welcome';
$prefix = '';
require 'includes/header.php'; ?>
<section class="hero">
    <p style="color:#93c5fd">COLLEGE FACILITY SUPPORT PORTAL</p>
    <h1>Report campus problems.<br>Track every update.</h1>
    <p class="muted">A simple place for students to report facility issues and administrators to manage them.</p><a class="button" href="register.php">Create account</a> <a class="button secondary" href="login.php">Login</a>
</section>
<div class="grid">
    <section class="card">
        <h3>Submit complaints</h3>
        <p class="muted">Report classroom, electricity, Wi-Fi and cleanliness issues.</p>
    </section>
    <section class="card">
        <h3>Track progress</h3>
        <p class="muted">Check Pending, In Progress and Resolved status.</p>
    </section>
    <section class="card">
        <h3>Admin management</h3>
        <p class="muted">Administrators can review and update complaints.</p>
    </section>
</div><?php require 'includes/footer.php'; ?>