<header class="site-header">
    <a class="brand" href="./"><span><?= e(app_config('brand_name')) ?></span></a>
    <button class="nav-toggle" aria-label="Toggle navigation">☰</button>
    <nav class="site-nav">
        <a class="<?= active_nav('index.php') ?>" href="./">Home</a>
        <a class="<?= active_nav('about.php') ?>" href="about">About</a>
        <a class="<?= active_nav('services.php') ?>" href="services">Services</a>
        <a class="<?= active_nav('portfolio.php') ?>" href="portfolio">Portfolio</a>
        <a class="<?= active_nav('testimonials.php') ?>" href="testimonials">Testimonials</a>
        <a class="<?= active_nav('booking.php') ?>" href="booking">Booking</a>
        <a class="<?= active_nav('contact.php') ?>" href="contact">Contact</a>
        <a class="nav-admin" href="admin/login">Admin</a>
    </nav>
</header>
