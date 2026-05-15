<?php $pageTitle = 'Testimonials'; require __DIR__ . '/includes/header.php'; ?>
<section class="page-hero"><p class="eyebrow">Testimonials</p><h1>What clients say about the experience.</h1><p>Use this page to showcase reviews from clients, partners, and collaborators.</p></section>
<section class="section"><div class="card-grid three">
<?php $quotes = [['The funnel strategy finally made our offer simple, premium, and conversion-focused.','Agency Founder'],['The campaign structure gave us a clearer way to test creative and scale winners.','Ecommerce Owner'],['The website made our brand look established and our booking process easier.','Business Consultant'],['Clear communication, strong design sense, and practical marketing recommendations.','Startup Founder'],['Our email sequence became more intentional and better aligned with customer intent.','Course Creator'],['A polished process from strategy through launch.','Service Provider']]; foreach ($quotes as $quote): ?>
<blockquote>“<?= e($quote[0]) ?>”<cite>— <?= e($quote[1]) ?></cite></blockquote><?php endforeach; ?>
</div></section>
<?php require __DIR__ . '/includes/footer.php'; ?>
