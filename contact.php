<?php $pageTitle = 'Contact'; require __DIR__ . '/includes/header.php'; ?>
<section class="page-hero"><p class="eyebrow">Contact</p><h1>Let’s talk about your next marketing move.</h1><p>Send a message or book directly if you already know the service you need.</p></section>
<section class="section split"><form class="premium-form" action="actions/contact-submit.php" method="post">
<?php if ($message = flash('success')): ?><div class="alert success"><?= e($message) ?></div><?php endif; ?>
<div class="form-grid"><label>Name<input name="name" required></label><label>Email<input type="email" name="email" required></label><label>Phone<input name="phone"></label><label>Subject<input name="subject" required></label><label class="full">Message<textarea name="message" rows="6" required></textarea></label></div><button class="btn btn-gold" type="submit">Send Message</button></form><aside class="contact-card"><h2>Contact details</h2><p><?= e(app_config('email')) ?></p><p><?= e(app_config('phone')) ?></p><p><?= e(app_config('location')) ?></p><a class="btn btn-dark" href="booking.php">Book Instead</a></aside></section>
<?php require __DIR__ . '/includes/footer.php'; ?>
