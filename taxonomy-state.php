<?php

get_header();

?>

<main id="wcl-page-content" class="wcl-page-content">
    <div class="wcl-state">
        <div class="wcl-state__container wcl-section">
            <div class="wcl-state__content wcl-section-inner">
                <h1><?php single_term_title(); ?></h1>

                <?php
                if (have_posts()): ?>
                    <div class="wcl-state__products">
                        <?php while (have_posts()):
                            the_post();
                            $btu = get_field('btu', get_the_ID());
                            $volt = get_field('volt', get_the_ID());
                            $amper = get_field('amper', get_the_ID());
                            $pump = get_field('pump', get_the_ID());
                            $controls = get_field('controls', get_the_ID());
                            ?>
                            <div class="wcl-state__product">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                    <h2><?php the_title(); ?></h2>
                                    <p>
                                        BTU: <?php echo esc_html($btu); ?> |
                                        Volt: <?php echo esc_html($volt); ?> |
                                        Amper: <?php echo esc_html($amper); ?> |
                                        Pump: <?php echo esc_html($pump); ?> |
                                        Controls: <?php echo esc_html($controls); ?>
                                    </p>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <?php the_posts_pagination(); ?>
                <?php else: ?>
                    <p>No products found in this state</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php

get_footer();

?>