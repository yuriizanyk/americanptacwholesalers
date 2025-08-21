<?php
/**
 * Page Heading Block Template.
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
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/acf-preview/page-heading.png" alt="Page Heading Preview"
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
?>

<?php if ( !empty( $title ) ) : ?>
<section <?= $anchor; ?> class="wcl-page-heading">
    <div class="wcl-page-heading__container wcl-section-inner">
        <div class="wcl-page-heading__content">
            <h1 class="wcl-page-heading__title"><?php echo $title; ?></h1>
            <div class="wcl-page-heading__text"><?php echo $text; ?></div>
        </div>
    </div>
</section>
<?php endif; ?>