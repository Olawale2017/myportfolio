</main>
<footer class="site-footer">
    <div>
        <h3><?= e(app_config('brand_name')) ?></h3>
        <p><?= e(app_config('profession')) ?></p>
    </div>
    <div>
        <p>Email: <a href="mailto:<?= e(app_config('email')) ?>"><?= e(app_config('email')) ?></a></p>
        <p>Phone: <a href="tel:<?= e(app_config('phone')) ?>"><?= e(app_config('phone')) ?></a></p>
    </div>
</footer>
<script src="assets/js/main.js"></script>
</body>
</html>
