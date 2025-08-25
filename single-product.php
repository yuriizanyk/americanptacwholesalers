<?php get_header(); ?>

<?php
$btu = get_field('btu', get_the_ID());
$volt = get_field('volt', get_the_ID());
$amper = get_field('amper', get_the_ID());
$pump = get_field('pump', get_the_ID());
$controls = get_field('controls', get_the_ID());
$additional_info = get_field('additional_info', get_the_ID());
$images = get_field('gallery', get_the_ID());
$full_description = get_field('full_description', get_the_ID());
?>

<!-- MAIN CONTENT -->
<main id="wcl-page-content" class="wcl-page-content">
    <div class="wcl-single__container wcl-section-inner">
        <div class="wcl-single__product">
            <div class="wcl-single__product-content">
                <h2 class="wcl-single__product-title"><?php the_title(); ?></h2>
                <div class="wcl-single__product-info">
                    <p>
                        <?php if ($btu): ?>
                            <span><?php echo esc_html($btu); ?> BTU |</span>
                        <?php endif; ?>
                        <?php if ($pump): ?>
                            <span><?php echo esc_html($pump); ?></span>
                        <?php endif; ?>
                    </p>
                    <p>
                        <?php if ($volt): ?>
                            <span><?php echo esc_html($volt); ?> Volt |</span>
                        <?php endif; ?>
                        <?php if ($amper): ?>
                            <span><?php echo esc_html($amper); ?> Amp |</span>
                        <?php endif; ?>
                        <?php if ($controls): ?>
                            <span><?php echo esc_html($controls); ?></span>
                        <?php endif; ?>
                    </p>
                    <?php if ($additional_info): ?>
                        <p><?php echo esc_html($additional_info); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php if (!empty($full_description)): ?>
                <div class="wcl-single__product-full-info">
                    <?= wp_kses_post($full_description); ?>
                </div>
            <?php endif; ?>
            <?php if ($images): ?>
                <div class="wcl-single__product-gallery">
                    <?php foreach ($images as $image): ?>
                        <div class="wcl-single__product-image">
                            <?= wp_get_attachment_image($image, 'landscape-sm'); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>