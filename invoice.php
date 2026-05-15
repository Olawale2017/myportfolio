<?php $pageTitle = 'Invoice'; require __DIR__ . '/includes/header.php'; require_once __DIR__ . '/config/database.php';
$invoice = null;
try { $stmt = db()->prepare('SELECT * FROM invoices WHERE invoice_number = ? OR id = ? LIMIT 1'); $stmt->execute([$_GET['invoice'] ?? '', (int) ($_GET['id'] ?? 0)]); $invoice = $stmt->fetch(); } catch (Throwable $exception) { $invoice = null; }
?>
<section class="section invoice-wrap">
<?php if (!$invoice): ?><div class="alert error">Invoice not found or database is not configured.</div><?php else: ?>
    <div class="invoice-card" id="invoice-card">
        <div class="invoice-top"><div><p class="eyebrow">Invoice</p><h1><?= e($invoice['invoice_number']) ?></h1></div><span class="status <?= strtolower(e($invoice['payment_status'])) ?>"><?= e($invoice['payment_status']) ?></span></div>
        <div class="invoice-meta"><p><strong>Client:</strong> <?= e($invoice['client_name']) ?></p><p><strong>Date:</strong> <?= e($invoice['invoice_date']) ?></p><p><strong>Service:</strong> <?= e($invoice['service_name']) ?></p><p><strong>Amount:</strong> <?= money($invoice['amount']) ?></p></div>
        <hr><p>Thank you for your booking request. Payment is currently marked as <?= e($invoice['payment_status']) ?>.</p>
    </div>
    <button class="btn btn-gold print-button" onclick="window.print()">Download Invoice as PDF</button>
<?php endif; ?>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
