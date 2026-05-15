<?php $pageTitle = 'Booking'; require __DIR__ . '/includes/header.php'; $services = get_services(); $selected = (int) ($_GET['service_id'] ?? 0); ?>
<section class="page-hero"><p class="eyebrow">Book a consultation</p><h1>Tell me what you want to build, improve, or scale.</h1><p>Select your service, choose a preferred time, and I’ll review your request with a generated invoice summary.</p></section>
<section class="section form-section">
    <?php if ($message = flash('success')): ?><div class="alert success"><?= e($message) ?></div><?php endif; ?>
    <?php if ($message = flash('error')): ?><div class="alert error"><?= e($message) ?></div><?php endif; ?>
    <form class="premium-form" action="actions/create-booking" method="post">
        <div class="form-grid">
            <label>Service<select name="service_id" required><option value="">Select a service</option><?php foreach ($services as $service): ?><option value="<?= (int) $service['id'] ?>" data-price="<?= e($service['price']) ?>" <?= $selected === (int) $service['id'] ? 'selected' : '' ?>><?= e($service['name']) ?> — <?= money($service['price']) ?>+</option><?php endforeach; ?></select></label>
            <label>Preferred Date<input type="date" name="preferred_date" required></label>
            <label>Preferred Time<input type="time" name="preferred_time" required></label>
            <label>Name<input type="text" name="client_name" required></label>
            <label>Email<input type="email" name="client_email" required></label>
            <label>Phone<input type="tel" name="client_phone" required></label>
            <label>Company Name<input type="text" name="company_name"></label>
            <label class="full">Project Description<textarea name="project_description" rows="6" required placeholder="Share your goals, current challenges, budget range, and timeline."></textarea></label>
        </div>
        <div class="form-footer"><span id="selected-price">Select a service to see starting price.</span><button class="btn btn-gold" type="submit">Submit Booking Request</button></div>
    </form>
</section>
<script src="assets/js/booking.js"></script>
<?php require __DIR__ . '/includes/footer.php'; ?>
