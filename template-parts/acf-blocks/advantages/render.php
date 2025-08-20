<?php
/**
 * Advantages Block Template.
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
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/acf-preview/advantages.png" alt="Advantages Preview"
        style="width: 100%; height: auto;">
    <?php
    return;
}

// Support custom "anchor" values.
$anchor = '';
if ( !empty( $block[ 'anchor' ] ) ) {
    $anchor = 'id="' . esc_attr( $block[ 'anchor' ] ) . '" ';
}

$title = get_field( 'title' );
$text = get_field( 'text' );
$advantages_repeater = get_field( 'advantages_repeater' );
?>

<?php if (!empty($advantages_repeater)): ?>
<section <?= $anchor; ?>class="wcl-advantages">
    <div class="wcl-advantages__container wcl-section">
        <div class="wcl-advantages__header wcl-section-inner">
            <h2 class="wcl-advantages__title wcl-h2 anim-left anim-left--anim"><?= $title; ?></h2>
            <?php if (!empty($text)): ?>
            <div class="wcl-advantages__text anim-right anim-right--anim"><?= $text; ?></div>
            <?php endif; ?>
        </div>
        <div class="wcl-advantages__content wcl-section-inner anim-content">
            <?php foreach ($advantages_repeater as $advantage): ?>
                <div class="wcl-advantages__item anim-item anim-item--anim">
                    <div class="wcl-advantages__item-icon">
                        <?= wp_get_attachment_image($advantage['advantages_icon'], 'icon'); ?>
                    </div>
                    <div class="wcl-advantages__item-content">
                        <h3 class="wcl-advantages__item-title wcl-h3"><?= $advantage['advantages_title']; ?></h3>
                        <div class="wcl-advantages__item-text"><?= $advantage['advantages_text']; ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>