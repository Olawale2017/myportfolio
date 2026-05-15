<?php require_once __DIR__ . '/../includes/functions.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    if ($email === app_config('admin_email') && password_verify($password, app_config('admin_password_hash'))) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_email'] = $email;
        redirect('index.php');
    }
    flash('error', 'Invalid admin login.');
}
?><!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Admin Login</title><link rel="stylesheet" href="../assets/css/admin.css"></head><body class="login-page"><form class="login-card" method="post"><p class="eyebrow">Admin Dashboard</p><h1>Sign in</h1><?php if ($message = flash('error')): ?><div class="alert error"><?= e($message) ?></div><?php endif; ?><label>Email<input type="email" name="email" value="admin@example.com" required></label><label>Password<input type="password" name="password" placeholder="admin123" required></label><button class="admin-btn" type="submit">Login</button></form></body></html>
