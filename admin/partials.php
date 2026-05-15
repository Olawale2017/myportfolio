<?php
require_once __DIR__ . '/../includes/functions.php';
function admin_header(string $title): void { ?>
<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title><?= e($title) ?> | Admin</title><link rel="stylesheet" href="../assets/css/admin.css"></head><body><div class="admin-shell"><aside class="admin-sidebar"><h2><?= e(app_config('brand_name')) ?></h2><a href="./">Dashboard</a><a href="bookings">Bookings</a><a href="invoices">Invoices</a><a href="services">Services</a><a href="../">View Site</a><a href="logout">Logout</a></aside><main class="admin-main"><header class="admin-top"><h1><?= e($title) ?></h1></header>
<?php }
function admin_footer(): void { ?>
</main></div><script src="../assets/js/admin.js"></script></body></html>
<?php }
