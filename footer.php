<?php
$footer_logo = get_field('footer_logo', 'option');
?>

<!-- FOOTER -->
<footer id="wcl-footer" class="wcl-footer">
    <div class="wcl-footer__container wcl-section-inner">
        <div class="wcl-footer__body">
            <div class="wcl-footer__logo">
                <a class="wcl-footer__logo-link" href="<?= esc_url(home_url('/')); ?>" aria-label="Site Logo">
                    <?php $footer_logo = get_field('footer_logo', 'option'); ?>
                    <?= wp_get_attachment_image($footer_logo, 'logo'); ?>
                </a>
            </div>
            <div class="wcl-footer__menu">
                <nav class="menu__body" id="main-menu">
                    <?php wp_nav_menu([
                        'theme_location' => 'footer-menu',
                        'container' => 'false',
                        'menu_class' => 'menu__list'
                    ]); ?>
                </nav>
            </div>
        </div>
    </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>

</html>