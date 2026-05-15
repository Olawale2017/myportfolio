<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../config/database.php';
if (!is_admin()) { redirect('../admin/login'); }
$status = $_POST['payment_status'] ?? 'Pending';
if (!in_array($status, ['Pending', 'Paid', 'Cancelled'], true)) { $status = 'Pending'; }
try {
    $stmt = db()->prepare('UPDATE invoices SET payment_status = ? WHERE id = ?');
    $stmt->execute([$status, (int) ($_POST['invoice_id'] ?? 0)]);
    flash('success', 'Invoice status updated.');
} catch (Throwable $exception) {
    flash('success', 'Unable to update invoice until database is configured.');
}
redirect('../admin/invoices');
