<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$app = require __DIR__ . '/../config/app.php';

function app_config(?string $key = null, mixed $default = null): mixed
{
    global $app;
    return $key === null ? $app : ($app[$key] ?? $default);
}

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function active_nav(string $page): string
{
    return basename($_SERVER['PHP_SELF']) === $page ? 'active' : '';
}

function redirect(string $path): never
{
    header('Location: ' . $path);
    exit;
}

function flash(string $key, ?string $message = null): ?string
{
    if ($message !== null) {
        $_SESSION['flash'][$key] = $message;
        return null;
    }

    $value = $_SESSION['flash'][$key] ?? null;
    unset($_SESSION['flash'][$key]);
    return $value;
}

function money(float|string|null $amount): string
{
    return app_config('currency', '$') . number_format((float) $amount, 2);
}

function generate_invoice_number(int $bookingId): string
{
    return 'INV-' . date('Ymd') . '-' . str_pad((string) $bookingId, 5, '0', STR_PAD_LEFT);
}

function require_admin(): void
{
    if (empty($_SESSION['admin_logged_in'])) {
        redirect('login.php');
    }
}

function is_admin(): bool
{
    return !empty($_SESSION['admin_logged_in']);
}

function db_available(): bool
{
    require_once __DIR__ . '/../config/database.php';
    try {
        db()->query('SELECT 1');
        return true;
    } catch (Throwable $exception) {
        return false;
    }
}

function fallback_services(): array
{
    return [
        ['id' => 1, 'name' => 'Meta Ads', 'slug' => 'meta-ads', 'description' => 'Strategic Facebook and Instagram campaigns built for profitable lead generation and sales.', 'price' => 500, 'is_active' => 1],
        ['id' => 2, 'name' => 'TikTok Ads', 'slug' => 'tiktok-ads', 'description' => 'Scroll-stopping TikTok ad strategy, creative testing, and campaign optimization.', 'price' => 450, 'is_active' => 1],
        ['id' => 3, 'name' => 'Funnel Design', 'slug' => 'funnel-design', 'description' => 'High-converting sales funnels, landing pages, and nurture paths from click to close.', 'price' => 750, 'is_active' => 1],
        ['id' => 4, 'name' => 'Email Marketing', 'slug' => 'email-marketing', 'description' => 'Automated email flows and campaign sequences that convert subscribers into buyers.', 'price' => 350, 'is_active' => 1],
        ['id' => 5, 'name' => 'Website Design', 'slug' => 'website-design', 'description' => 'Premium responsive websites designed for credibility, clarity, and conversions.', 'price' => 900, 'is_active' => 1],
        ['id' => 6, 'name' => 'SEO', 'slug' => 'seo', 'description' => 'Search optimization to improve visibility, technical health, and content performance.', 'price' => 400, 'is_active' => 1],
        ['id' => 7, 'name' => 'Digital Marketing Consultation', 'slug' => 'consultation', 'description' => 'Actionable strategy sessions for offers, funnels, ads, analytics, and growth planning.', 'price' => 150, 'is_active' => 1],
    ];
}

function get_services(bool $activeOnly = true): array
{
    require_once __DIR__ . '/../config/database.php';
    try {
        $sql = 'SELECT * FROM services' . ($activeOnly ? ' WHERE is_active = 1' : '') . ' ORDER BY id ASC';
        return db()->query($sql)->fetchAll();
    } catch (Throwable $exception) {
        return fallback_services();
    }
}

function find_service(int $id): ?array
{
    foreach (get_services(false) as $service) {
        if ((int) $service['id'] === $id) {
            return $service;
        }
    }
    return null;
}

function dashboard_stats(): array
{
    require_once __DIR__ . '/../config/database.php';
    try {
        $pdo = db();
        return [
            'bookings' => (int) $pdo->query('SELECT COUNT(*) FROM bookings')->fetchColumn(),
            'invoices' => (int) $pdo->query('SELECT COUNT(*) FROM invoices')->fetchColumn(),
            'revenue' => (float) $pdo->query("SELECT COALESCE(SUM(amount), 0) FROM invoices WHERE payment_status = 'Paid'")->fetchColumn(),
            'pending' => (float) $pdo->query("SELECT COALESCE(SUM(amount), 0) FROM invoices WHERE payment_status = 'Pending'")->fetchColumn(),
        ];
    } catch (Throwable $exception) {
        return ['bookings' => 0, 'invoices' => 0, 'revenue' => 0, 'pending' => 0];
    }
}
