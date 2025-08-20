<?php
/**
 * Page Hero Block Template.
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
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/acf-preview/default.jpg" alt="Page Hero Preview"
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
$left_link = get_field('left_link');
$right_link = get_field('right_link');
$image = get_field('image');
?>

<?php if ($title): ?>
    <section <?= $anchor; ?>class="wcl-page-hero">
        <div class="wcl-page-hero__container wcl-section-inner">
            <div class="wcl-page-hero__body">
                <div class="wcl-page-hero__content">
                    <h1 class="wcl-page-hero__title anim-left anim-left--anim"><?= $title; ?></h1>
                    <?php if ($text): ?>
                        <div class="wcl-page-hero__text"><?= $text; ?></div>
                    <?php endif; ?>
                    <?php if ($left_link || $right_link): ?>
                        <div class="wcl-page-hero__links">
                            <?php if ($left_link):
                                $url = $left_link['url'];
                                $name = $left_link['title'];
                                $target = $left_link['target'] ?: '_self';
                                ?>
                                <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>"
                                    class="wcl-page-hero__button wcl-button wcl-button--green">
                                    <?= esc_html($name); ?>
                                </a>
                            <?php endif; ?>
                            <?php if ($right_link):
                                $url = $right_link['url'];
                                $name = $right_link['title'];
                                $target = $right_link['target'] ?: '_self';
                                ?>
                                <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>"
                                    class="wcl-page-hero__button wcl-button wcl-button--white">
                                    <?= esc_html($name); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if ($image): ?>
                    <div class="wcl-page-hero__image anim-right anim-right--anim">
                        <?= wp_get_attachment_image($image, 'square-lg'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>