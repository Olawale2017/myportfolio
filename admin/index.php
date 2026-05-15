<?php require_once __DIR__ . '/partials.php'; require_admin(); $stats = dashboard_stats(); admin_header('Dashboard'); ?>
<section class="stat-grid"><article><span>Total Bookings</span><strong><?= (int) $stats['bookings'] ?></strong></article><article><span>Total Invoices</span><strong><?= (int) $stats['invoices'] ?></strong></article><article><span>Total Revenue</span><strong><?= money($stats['revenue']) ?></strong></article><article><span>Pending Payments</span><strong><?= money($stats['pending']) ?></strong></article></section>
<section class="panel"><h2>Overview</h2><p>Manage bookings, generated invoices, service pricing, and payment status from this premium SaaS-style dashboard.</p></section>
<?php admin_footer(); ?>
