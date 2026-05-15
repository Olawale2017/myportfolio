<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../config/database.php';

$required = ['service_id', 'preferred_date', 'preferred_time', 'client_name', 'client_email', 'client_phone', 'project_description'];
foreach ($required as $field) {
    if (empty($_POST[$field])) {
        flash('error', 'Please complete all required booking fields.');
        redirect('../booking.php');
    }
}

$service = find_service((int) $_POST['service_id']);
if (!$service) {
    flash('error', 'Please select a valid service.');
    redirect('../booking.php');
}

try {
    $pdo = db();
    $pdo->beginTransaction();
    $stmt = $pdo->prepare('INSERT INTO bookings (service_id, client_name, client_email, client_phone, company_name, preferred_date, preferred_time, project_description, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([(int) $service['id'], trim($_POST['client_name']), trim($_POST['client_email']), trim($_POST['client_phone']), trim($_POST['company_name'] ?? ''), $_POST['preferred_date'], $_POST['preferred_time'], trim($_POST['project_description']), 'New']);
    $bookingId = (int) $pdo->lastInsertId();
    $invoiceNumber = generate_invoice_number($bookingId);
    $stmt = $pdo->prepare('INSERT INTO invoices (booking_id, invoice_number, client_name, service_name, amount, payment_status, invoice_date) VALUES (?, ?, ?, ?, ?, ?, CURDATE())');
    $stmt->execute([$bookingId, $invoiceNumber, trim($_POST['client_name']), $service['name'], $service['price'], 'Pending']);
    $pdo->commit();
    flash('success', 'Booking submitted successfully. Your invoice has been generated.');
    redirect('../invoice.php?invoice=' . urlencode($invoiceNumber));
} catch (Throwable $exception) {
    if (isset($pdo) && $pdo->inTransaction()) { $pdo->rollBack(); }
    flash('error', 'Database connection failed. Please configure MySQL before submitting bookings.');
    redirect('../booking.php');
}
