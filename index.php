<?php $pageTitle = 'Home'; require __DIR__ . '/includes/header.php'; $services = array_slice(get_services(), 0, 6); ?>
<section class="hero">
    <div class="hero-content">
        <p class="eyebrow">Premium Growth Partner</p>
        <h1>I build high-converting funnels, ads, and websites that turn traffic into revenue.</h1>
        <p class="hero-copy">Work with <?= e(app_config('brand_name')) ?> to launch polished campaigns, stronger customer journeys, and conversion-focused digital experiences.</p>
        <div class="hero-actions">
            <a class="btn btn-gold" href="booking">Book a Consultation</a>
            <a class="btn btn-outline" href="portfolio">View My Work</a>
        </div>
    </div>
    <div class="hero-card glass-card">
        <span class="metric">+42%</span>
        <p>Average lift targeted across funnel optimization, ads testing, and landing page improvements.</p>
        <div class="mini-grid">
            <span>Meta Ads</span><span>Funnels</span><span>Web Design</span><span>Email</span>
        </div>
    </div>
</section>

<section class="section intro split">
    <div>
        <p class="eyebrow">About the work</p>
        <h2>Strategy, creative, and conversion systems under one roof.</h2>
    </div>
    <p>I help founders, service providers, and brands clarify their offer, attract better traffic, and convert more visitors through data-driven advertising, premium web design, and funnel architecture.</p>
</section>

<section class="section">
    <div class="section-heading">
        <p class="eyebrow">Key services</p>
        <h2>Built for measurable growth</h2>
    </div>
    <div class="card-grid">
        <?php foreach ($services as $service): ?>
            <article class="service-card">
                <h3><?= e($service['name']) ?></h3>
                <p><?= e($service['description']) ?></p>
                <strong><?= money($service['price']) ?>+</strong>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="section dark-section">
    <div class="section-heading">
        <p class="eyebrow">Portfolio highlights</p>
        <h2>Premium digital assets designed to convert</h2>
    </div>
    <div class="portfolio-grid">
        <article><span>Lead Generation</span><h3>Consulting Funnel Redesign</h3><p>Rebuilt a lead capture path with clearer messaging, stronger CTA hierarchy, and follow-up automation.</p></article>
        <article><span>Paid Social</span><h3>Ecommerce Ads Sprint</h3><p>Structured creative testing for Meta and TikTok campaigns with weekly optimization loops.</p></article>
        <article><span>Web Design</span><h3>Premium Service Website</h3><p>Designed a polished responsive website with conversion sections and booking-focused navigation.</p></article>
    </div>
    <a class="btn btn-gold" href="portfolio">Explore Projects</a>
</section>

<section class="section testimonials-preview">
    <div class="section-heading">
        <p class="eyebrow">Client feedback</p>
        <h2>Trusted for clarity, execution, and results</h2>
    </div>
    <div class="card-grid three">
        <blockquote>“The funnel strategy finally made our offer easy to understand and easier to sell.”<cite>— Agency Founder</cite></blockquote>
        <blockquote>“Our campaigns became cleaner, faster to optimize, and much easier to report on.”<cite>— Ecommerce Owner</cite></blockquote>
        <blockquote>“The website feels premium and our booking flow is much more professional.”<cite>— Consultant</cite></blockquote>
    </div>
</section>

<section class="section cta-band">
    <h2>Ready to build your next growth system?</h2>
    <p>Share your goals and receive a clear next-step recommendation.</p>
    <a class="btn btn-dark" href="booking">Book a Consultation</a>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
