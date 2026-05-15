<?php $pageTitle = 'Services'; require __DIR__ . '/includes/header.php'; $services = get_services(); ?>
<section class="page-hero"><p class="eyebrow">Services</p><h1>Growth services for ads, funnels, websites, and strategy.</h1><p>Choose a service below and submit a booking request to start the conversation.</p></section>
<section class="section"><div class="card-grid"><?php foreach ($services as $service): ?><article class="service-card tall"><h3><?= e($service['name']) ?></h3><p><?= e($service['description']) ?></p><strong><?= money($service['price']) ?>+</strong><a class="btn btn-dark" href="booking.php?service_id=<?= (int) $service['id'] ?>">Book This Service</a></article><?php endforeach; ?></div></section>
<?php require __DIR__ . '/includes/footer.php'; ?>
