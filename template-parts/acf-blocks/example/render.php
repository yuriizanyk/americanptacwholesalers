<?php
/**
 * Example Block Template.
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
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/acf-preview/default.jpg" alt="Example Preview"
        style="width: 100%; height: auto;">
    <?php
    return;
}

// Support custom "anchor" values.
$anchor = '';
if ( !empty( $block[ 'anchor' ] ) ) {
    $anchor = 'id="' . esc_attr( $block[ 'anchor' ] ) . '" ';
}
?>

<section <?= $anchor; ?>class="wcl-example">
    <div class="wcl-container">
        <div class="wcl-example__content">
            <h1>Hello Example Block!</h1>
        </div>
    </div>
</section>
