<?php
/**
 * Choose Block Template.
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
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/acf-preview/choose.png" alt="Choose Preview"
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
$choose_repeater = get_field( 'choose_repeater' );
?>

<?php if (!empty($choose_repeater)): ?>
<section <?= $anchor; ?>class="wcl-choose">
    <div class="wcl-choose__container wcl-section-inner">
        <div class="wcl-choose__header">
            <h2 class="wcl-choose__title wcl-h2"><?= $title; ?></h2>
            <?php if (!empty($text)): ?>
            <div class="wcl-choose__text"><?= $text; ?></div>
            <?php endif; ?>
        </div>
        <div class="wcl-choose__content">
            <?php foreach ($choose_repeater as $choose): ?>
                <div class="wcl-choose__item">
                    <div class="wcl-choose__item-icon">
                        <?= wp_get_attachment_image($choose['choose_icon'], 'square-sm'); ?>
                    </div>
                    <div class="wcl-choose__item-content">
                        <h3 class="wcl-choose__item-title wcl-h3"><?= $choose['choose_title']; ?></h3>
                        <div class="wcl-choose__item-text"><?= $choose['choose_text']; ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>