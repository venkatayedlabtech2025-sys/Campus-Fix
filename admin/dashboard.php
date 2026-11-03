<?php require '../includes/functions.php';
admin_required();
$s = $pdo->query("SELECT COUNT(*) total,SUM(status='Pending') pending,SUM(status='In Progress') progress,SUM(status='Resolved') resolved FROM complaints")->fetch();
$rows = $pdo->query('SELECT c.*,u.name student,k.name category FROM complaints c JOIN users u ON u.id=c.user_id JOIN categories k ON k.id=c.category_id ORDER BY c.created_at DESC')->fetchAll();
$title = 'Admin Dashboard';
$prefix = '../';
require '../includes/header.php'; ?><section class="hero">
    <h1>Administrator dashboard</h1>
    <p class="muted">Review and update college complaints.</p><a class="button" href="complaints.php">Manage complaints</a>
</section>
<div class="grid"><?php foreach (['total' => 'Total', 'pending' => 'Pending', 'progress' => 'In progress', 'resolved' => 'Resolved'] as $k => $v): ?><div class="card">
            <div class="stat"><?= (int) ($s[$k] ?? 0) ?></div>
            <div class="muted"><?= $v ?></div>
        </div><?php endforeach; ?></div>
<section class="panel">
    <h2>Latest complaints</h2>
    <div class="tablebox">
        <table>
            <tr>
                <th>Student</th>
                <th>Complaint</th>
                <th>Category</th>
                <th>Status</th>
            </tr><?php foreach (array_slice($rows, 0, 8) as $r): ?><tr>
                    <td><?= e($r['student']) ?></td>
                    <td><?= e($r['title']) ?></td>
                    <td><?= e($r['category']) ?></td>
                    <td><?= e($r['status']) ?></td>
                </tr><?php endforeach; ?>
        </table>
    </div>
</section><?php require '../includes/footer.php'; ?>