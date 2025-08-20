<?php
/**
 * Page Info Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */

// Example of getting a field from ACF
// $title = get_field( 'content' )[ 'left' ][ 'title' ];

// Preview mode
if (isset($block['data']['is_example']) && $block['data']['is_example']) {
    ?>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/acf-preview/page-info.png" alt="Page Info Preview"
        style="width: 100%; height: auto;">
    <?php
    return;
}

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

$title = get_field('title');
$text = get_field('text');
$image_left = get_field('image_left');
$image_right = get_field('image_right');
$image = get_field('image');
?>

<?php if ($title): ?>
    <section <?= $anchor; ?>class="wcl-page-info">
        <div class="wcl-page-info__container wcl-section-inner">
            <div class="wcl-page-info__body">
                <?php if ($image): ?>
                    <div class="wcl-page-info__images anim-left anim-left--anim">
                        <div class="wcl-page-info__image-left">
                            <?= wp_get_attachment_image($image_left, 'square-md'); ?>
                        </div>
                        <div class="wcl-page-info__image-right">
                            <?= wp_get_attachment_image($image_right, 'square-md'); ?>
                        </div>
                        <div class="wcl-page-info__image">
                            <?= wp_get_attachment_image($image, 'landscape-md'); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="wcl-page-info__content">
                    <h2 class="wcl-page-info__title wcl-h2 anim-right anim-right--anim"><?= $title; ?></h2>
                    <?php if ($text): ?>
                        <div class="wcl-page-info__text"><?= $text; ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>