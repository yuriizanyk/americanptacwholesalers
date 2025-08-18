<?php
/**
 * Solutions Block Template.
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
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/acf-preview/solutions.png" alt="Solutions Preview"
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
$solution_repeater = get_field( 'solution_repeater' );
?>

<?php if (!empty($solution_repeater)): ?>
<section <?= $anchor; ?>class="wcl-solutions">
    <div class="wcl-solutions__container wcl-section-inner">
        <div class="wcl-solutions__header">
            <h2 class="wcl-solutions__title wcl-h2"><?= $title; ?></h2>
            <div class="wcl-solutions__text"><?= $text; ?></div>
        </div>
        <div class="wcl-solutions__content">
            <?php foreach ($solution_repeater as $solution): ?>
                <div class="wcl-solutions__item">
                    <div class="wcl-solutions__item-content">
                        <h3 class="wcl-solutions__item-title wcl-h3"><?= $solution['solution_title']; ?></h3>
                        <div class="wcl-solutions__item-text"><?= $solution['solution_text']; ?></div>
                    </div>
                    <div class="wcl-solutions__item-image">
                        <?= wp_get_attachment_image($solution['solution_image'], 'image-lg'); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>