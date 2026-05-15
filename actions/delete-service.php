<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../config/database.php';
if (!is_admin()) { redirect('../admin/login'); }
try {
    $stmt = db()->prepare('DELETE FROM services WHERE id = ?');
    $stmt->execute([(int) ($_POST['id'] ?? 0)]);
    flash('success', 'Service deleted.');
} catch (Throwable $exception) {
    flash('success', 'Unable to delete until database is configured.');
}
redirect('../admin/services');
