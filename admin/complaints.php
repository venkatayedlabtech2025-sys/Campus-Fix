<?php require '../includes/functions.php';
admin_required();
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_token();
    $id = (int) $_POST['id'];
    $st = $_POST['status'] ?? '';
    $pr = $_POST['priority'] ?? '';
    $comment = trim($_POST['comment'] ?? '');
    if ($id > 0 && in_array($st, ['Pending', 'In Progress', 'Resolved']) && in_array($pr, ['Low', 'Medium', 'High'])) {
        $pdo->beginTransaction();
        try {
            $q = $pdo->prepare('SELECT status FROM complaints WHERE id=? FOR UPDATE');
            $q->execute([$id]);
            $old = $q->fetch();
            if (!$old)
                throw new Exception();
            $q = $pdo->prepare('UPDATE complaints SET status=?,priority=? WHERE id=?');
            $q->execute([$st, $pr, $id]);
            $q = $pdo->prepare('INSERT INTO complaint_updates(complaint_id,updated_by,old_status,new_status,comment) VALUES(?,?,?,?,?)');
            $q->execute([$id, $_SESSION['uid'], $old['status'], $st, $comment ?: 'Admin updated complaint']);
            $pdo->commit();
            $msg = 'Complaint updated.';
        } catch (Throwable $e) {
            $pdo->rollBack();
            $msg = 'Could not update complaint.';
        }
    }
}
$rows = $pdo->query('SELECT c.*,u.name student,k.name category FROM complaints c JOIN users u ON u.id=c.user_id JOIN categories k ON k.id=c.category_id ORDER BY c.created_at DESC')->fetchAll();
$title = 'Manage Complaints';
$prefix = '../';
require '../includes/header.php'; ?><section class="panel"><h1>Manage complaints</h1><?php if ($msg): ?><div class="notice"><?= e($msg) ?></div><?php endif; ?><?php foreach ($rows as $r): ?><div class="card"><h3><?= e($r['title']) ?></h3><p class="muted">#<?= $r['id'] ?> · <?= e($r['student']) ?> · <?= e($r['category']) ?> · <?= e($r['location']) ?></p><p><?= nl2br(e($r['description'])) ?></p><form method="post" class="grid"><input type="hidden" name="token" value="<?= e(token()) ?>"><input type="hidden" name="id" value="<?= $r['id'] ?>"><div class="group"><label>Status</label><select name="status"><?php foreach (['Pending', 'In Progress', 'Resolved'] as $v): ?><option <?= $r['status'] === $v ? 'selected' : '' ?>><?= $v ?></option><?php endforeach; ?></select></div><div class="group"><label>Priority</label><select name="priority"><?php foreach (['Low', 'Medium', 'High'] as $v): ?><option <?= $r['priority'] === $v ? 'selected' : '' ?>><?= $v ?></option><?php endforeach; ?></select></div><div class="group"><label>Comment</label><input name="comment" placeholder="Optional admin note"></div><div class="group"><button>Save update</button></div></form></div><?php endforeach; ?></section><?php require '../includes/footer.php'; ?>
