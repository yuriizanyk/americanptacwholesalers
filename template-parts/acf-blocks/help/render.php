<?php
/**
 * Help Block Template.
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
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/acf-preview/default.jpg" alt="Help Preview"
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
$link = get_field( 'link' );
$link_text = get_field( 'link_text' );
$bg_color = get_field( 'background' ) ?: 'white';
?>

<?php if (!empty($title)): ?>
<section <?= $anchor; ?>class="wcl-help">
    <div class="wcl-help__container wcl-section wcl-help__container--<?= esc_attr($bg_color); ?>">
        <div class="wcl-help__content wcl-section-inner">
            <div class="wcl-help__body">
                <h2 class="wcl-help__title wcl-h2"><?= $title; ?></h2>
                <div class="wcl-help__text"><?= $text; ?></div>
            </div>
            <div class="wcl-help__action">
                <?php if ($link):
                    $url = $link['url'];
                    $name = $link['title'];
                    $target = $link['target'] ?: '_self';
                    ?>
                    <a href="<?= esc_url($url); ?>" target="<?= esc_attr($target); ?>"
                        class="wcl-help__link wcl-button wcl-button--green">
                        <?= esc_html($name); ?>
                    </a>
                <?php endif; ?>
                <?php if (!empty($link_text)): ?>
                <div class="wcl-help__link-text"><?= $link_text; ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
