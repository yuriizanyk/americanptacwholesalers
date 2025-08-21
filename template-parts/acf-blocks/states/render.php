<?php
/**
 * States Block Template.
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
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/acf-preview/states.png" alt="States Preview"
        style="width: 100%; height: auto;">
    <?php
    return;
}

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}
?>

<section <?= $anchor; ?> class="wcl-states">
    <div class="wcl-states__container wcl-section">
        
        <?php
        $terms = get_terms([
            'taxonomy' => 'state',
            'hide_empty' => false,
        ]);

        if ($terms && !is_wp_error($terms)): ?>
            <div class="wcl-states__list wcl-section-inner">
                <?php foreach ($terms as $term): ?>
                    <a class="wcl-states__item" href="<?= esc_url(get_term_link($term)); ?>">
                        <h3 class="wcl-states__state">
                            <?= esc_html($term->name); ?>
                        </h3>
                        <div class="wcl-states__icon">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_5836_966)">
                                    <path
                                        d="M15.634 11.3273H1.28411C0.920281 11.3273 0.61552 11.2006 0.369827 10.9474C0.124135 10.6941 0.0008605 10.3811 4.42795e-06 10.0082C-0.000851644 9.63537 0.122423 9.32187 0.369827 9.06773C0.617232 8.81359 0.921994 8.68741 1.28411 8.68917H15.634L9.34189 2.22587C9.08506 1.96199 8.96179 1.65424 8.97206 1.30249C8.98234 0.950744 9.11631 0.642994 9.37399 0.379119C9.63081 0.137369 9.93044 0.0111184 10.2729 0.00061848C10.6153 -0.0100055 10.9149 0.116243 11.1717 0.379119L19.6469 9.08488C19.7752 9.21678 19.8664 9.35968 19.9204 9.51357C19.9743 9.66746 20.0009 9.83234 20 10.0082C19.9991 10.1841 19.9726 10.349 19.9204 10.5029C19.8681 10.6567 19.777 10.7996 19.6469 10.9315L11.1717 19.6372C10.9363 19.8791 10.6423 20 10.2896 20C9.93686 20 9.63166 19.8791 9.37399 19.6372C9.11716 19.3735 8.98876 19.06 8.98876 18.6967C8.98876 18.3336 9.11716 18.0205 9.37399 17.7576L15.634 11.3273Z"
                                        fill="#3D7E71" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_5836_966">
                                        <rect width="20" height="20" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</section>