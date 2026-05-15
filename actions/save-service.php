<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../config/database.php';
if (!is_admin()) { redirect('../admin/login.php'); }
try {
    $id = (int) ($_POST['id'] ?? 0);
    if ($id > 0) {
        $stmt = db()->prepare('UPDATE services SET name = ?, slug = ?, description = ?, price = ?, is_active = ? WHERE id = ?');
        $stmt->execute([trim($_POST['name']), trim($_POST['slug']), trim($_POST['description']), (float) $_POST['price'], isset($_POST['is_active']) ? 1 : 0, $id]);
    } else {
        $stmt = db()->prepare('INSERT INTO services (name, slug, description, price, is_active) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([trim($_POST['name']), trim($_POST['slug']), trim($_POST['description']), (float) $_POST['price'], isset($_POST['is_active']) ? 1 : 0]);
    }
    flash('success', 'Service saved.');
} catch (Throwable $exception) {
    flash('success', 'Unable to save until database is configured.');
}
redirect('../admin/services.php');
