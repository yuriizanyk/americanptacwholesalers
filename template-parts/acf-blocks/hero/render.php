<?php
/**
 * Hero Block Template.
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
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/acf-preview/hero.png" alt="Hero Preview"
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
$product_link = get_field('product_link');
$contact_link = get_field('contact_link');
$image_bg = get_field('image_bg');
$partners = get_field('partners');
?>

<section <?= $anchor; ?>class="wcl-hero">
    <div class="wcl-hero__container">
        <?php if ($image_bg): ?>
            <div class="wcl-hero__bg">
                <?= wp_get_attachment_image($image_bg, 'image-lg', false, ['fetchpriority' => 'high', 'decoding' => 'async', 'loading' => false]); ?>
            </div>
        <?php endif; ?>
        <div class="wcl-hero__content">
            <h1 class="wcl-hero__title wcl-h1 anim-left anim-left--anim"><?= $title; ?></h1>
            <div class="wcl-hero__text anim-right anim-right--anim"><?= $text; ?></div>
            <div class="wcl-hero__links">
                <?php if ($product_link):
                    $url = $product_link['url'];
                    $name = $product_link['title'];
                    $target = $product_link['target'] ?: '_self';
                    ?>
                    <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>"
                        class="wcl-hero__button wcl-button wcl-button--green">
                        <?= esc_html($name); ?>
                    </a>
                <?php endif; ?>
                <?php if ($contact_link):
                    $url = $contact_link['url'];
                    $name = $contact_link['title'];
                    $target = $contact_link['target'] ?: '_self';
                    ?>
                    <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>"
                        class="wcl-hero__button wcl-button wcl-button--white">
                        <?= esc_html($name); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <?php if ($partners): ?>
            <div class="wcl-hero__logos marquee">
                <div class="wcl-hero__logos-inner marquee__track">
                    <div class="wcl-hero__logos-list marquee__container">
                        <?php foreach ($partners as $partner): ?>
                            <div class="wcl-hero__logo">
                                <?= wp_get_attachment_image($partner['logo'], 'icon-md'); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>