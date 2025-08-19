<?php
/**
 * Action Block Template.
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
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/acf-preview/action.png" alt="Action Preview"
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
$image = get_field('image');
$text = get_field('text');
$quote_link = get_field('quote_link');
$product_link = get_field('product_link');
?>

<?php if(!empty($title)): ?>
<section <?= $anchor; ?>class="wcl-action">
    <div class="wcl-action__container wcl-section">
        <div class="wcl-action__decor-left">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/decor-left.svg" alt="Decor Left">
        </div>
        <div class="wcl-action__content">
            <h2 class="wcl-action__title wcl-h2"><?= $title ?></h2>
            <?php if ($image): ?>
            <div class="wcl-action__image">
                <?= wp_get_attachment_image($image, 'image-lg'); ?>
            </div>
            <?php endif; ?>
            <?php if ($text): ?>
            <div class="wcl-action__text"><?= $text; ?></div>
            <?php endif; ?>
            <?php if ($quote_link || $product_link): ?>
            <div class="wcl-action__links">
                <?php if ($quote_link):
                    $url = $quote_link['url'];
                    $name = $quote_link['title'];
                    $target = $quote_link['target'] ?: '_self';
                    ?>
                    <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>"
                        class="wcl-action__button wcl-button wcl-button--white">
                        <?= esc_html($name); ?>
                    </a>
                <?php endif; ?>
                <?php if ($product_link):
                    $url = $product_link['url'];
                    $name = $product_link['title'];
                    $target = $product_link['target'] ?: '_self';
                    ?>
                    <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>"
                        class="wcl-action__button wcl-button wcl-button--green">
                        <?= esc_html($name); ?>
                    </a>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
        <div class="wcl-action__decor-right">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/decor-right.svg" alt="Decor Right">
        </div>
    </div>
</section>
<?php endif; ?>