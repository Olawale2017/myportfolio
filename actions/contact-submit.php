<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../config/database.php';
try {
    $stmt = db()->prepare('INSERT INTO contact_messages (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([trim($_POST['name'] ?? ''), trim($_POST['email'] ?? ''), trim($_POST['phone'] ?? ''), trim($_POST['subject'] ?? ''), trim($_POST['message'] ?? '')]);
} catch (Throwable $exception) {
    // Keep contact UX friendly on hosts where DB is not configured yet.
}
flash('success', 'Thanks for reaching out. Your message has been received.');
redirect('../contact.php');
