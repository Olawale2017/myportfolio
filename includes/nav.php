<header class="site-header">
    <a class="brand" href="index.php"><span><?= e(app_config('brand_name')) ?></span></a>
    <button class="nav-toggle" aria-label="Toggle navigation">☰</button>
    <nav class="site-nav">
        <a class="<?= active_nav('index.php') ?>" href="index.php">Home</a>
        <a class="<?= active_nav('about.php') ?>" href="about.php">About</a>
        <a class="<?= active_nav('services.php') ?>" href="services.php">Services</a>
        <a class="<?= active_nav('portfolio.php') ?>" href="portfolio.php">Portfolio</a>
        <a class="<?= active_nav('testimonials.php') ?>" href="testimonials.php">Testimonials</a>
        <a class="<?= active_nav('booking.php') ?>" href="booking.php">Booking</a>
        <a class="<?= active_nav('contact.php') ?>" href="contact.php">Contact</a>
        <a class="nav-admin" href="admin/login.php">Admin</a>
    </nav>
</header>
