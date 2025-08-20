<!-- FOOTER -->
<?php
$footer_logo = get_field('footer_logo', 'option');
$footer_text = get_field('footer_text', 'option');
$social_links = get_field('socials', 'option');
$footer_menu_title = get_field('footer_menu_title', 'option');
$footer_products_title = get_field('footer_products_title', 'option');
$footer_services_title = get_field('footer_services_title', 'option');
$footer_products = get_field('footer_products', 'option');
$footer_services = get_field('footer_services', 'option');
$footer_links = get_field('footer_links', 'option');
?>
<!-- FOOTER -->
<footer class="wcl-footer" id="wcl-main-footer">
    <div class="wcl-footer__container wcl-section">
        <div class="wcl-footer__body wcl-section-inner">
            <div class="wcl-footer__content">
                <a href="<?= esc_url(home_url('/')); ?>" class="wcl-footer__logo" aria-label="Logo icon">
                    <?= wp_get_attachment_image($footer_logo, 'icon'); ?>
                </a>
                <div class="wcl-footer__text"><?= $footer_text; ?></div>
                <?php if (!empty($social_links)): ?>
                    <div class="wcl-footer__socials">
                        <?php
                        foreach ($social_links as $social): {
                                $social_icon = $social['social_icon'];
                                $social_link = $social['social_link'];
                            }
                            ?>
                            <?php
                            if ($social_link):
                                $url = $social_link['url'];
                                $name = $social_link['title'];
                                $target = $social_link['target'] ?: '_self';
                                ?>
                                <a class="wcl-footer__social" href="<?= esc_url($url); ?>" target="<?= esc_attr($target); ?>"
                                    aria-label="Social Link">
                                    <?= wp_get_attachment_image($social_icon, 'icon'); ?>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if (!empty($footer_products)): ?>
                <div class="wcl-footer__products">
                    <h2 class="wcl-footer__products-title"><?= $footer_products_title; ?></h2>
                    <ul class="wcl-footer__products-list">
                        <?php
                        foreach ($footer_products as $item): {
                                $product = $item['product'];
                            }
                            ?>
                            <li class="wcl-footer__products-item"><?= $product; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if (!empty($footer_services)): ?>
                <div class="wcl-footer__services">
                    <h2 class="wcl-footer__services-title"><?= $footer_services_title; ?></h2>
                    <ul class="wcl-footer__services-list">
                        <?php
                        foreach ($footer_services as $item): {
                                $service = $item['service'];
                            }
                            ?>
                            <li class="wcl-footer__services-item"><?= $service; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="wcl-footer__menu">
                <h2 class="wcl-footer__menu-title"><?= $footer_menu_title; ?></h2>
                <?php wp_nav_menu([
                    'theme_location' => 'footer-menu',
                    'container' => 'false',
                    'menu_class' => 'wcl-footer__menu-list'
                ]); ?>
            </div>
        </div>
    </div>
    <div class="wcl-footer__bottom wcl-section-inner">
        <p class="wcl-footer__bottom-text">
            Created by <a class="wcl-footer__bottom-link" href="https://webcomplete.io/" target="_blank">WebComplete</a>
        </p>
        <p class="wcl-footer__bottom-text">
            © <?= date('Y'); ?> American PTAC Sales. All rights reserved.
        </p>
        <?php if (!empty($footer_links)): ?>
            <div class="wcl-footer__bottom-links">
                <?php foreach ($footer_links as $item):
                    $link = $item['link'];
                    if ($link):
                        $url = $link['url'];
                        $name = $link['title'];
                        $target = $link['target'] ?: '_self';
                        ?>
                        <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>"
                            class="wcl-footer__bottom-link">
                            <?= esc_html($name); ?>
                        </a>
                    <?php endif; endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</footer> <!-- #wcl-main-footer -->
</div> <!-- .wcl-body-inner -->

<?php wp_footer(); ?>

</body>

</html>