<?php
/**
 * Testimonials Block Template.
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
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/acf-preview/testimonials.png"
        alt="Testimonials Preview" style="width: 100%; height: auto;">
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
$testimonial_repeater = get_field('testimonial_repeater');

?>

<?php if (!empty($testimonial_repeater)): ?>
    <section <?= $anchor; ?> class="wcl-testimonials">
        <div class="wcl-testimonials__container">
            <div class="wcl-testimonials__header">
                <div class="wcl-testimonials__title wcl-h2"><?= $title; ?></div>
                <div class="wcl-testimonials__text"><?= $text; ?></div>
            </div>
            <div class="wcl-testimonials__list wcl-section-inner">
                <div class="wcl-testimonials__decor">
                    <img src="<?= get_template_directory_uri(); ?>/assets/img/testimonials-bg.svg" alt="Decor">
                </div>
                <div class="wcl-testimonials__slider-container">
                    <div class="wcl-testimonials__slider swiper" id="testimonials-slider">
                        <div class="wcl-testimonials__slider-wrapper swiper-wrapper">
                            <?php
                            foreach ($testimonial_repeater as $testimonial): {
                                    $image = $testimonial['image'];
                                    $name = $testimonial['name'];
                                    $position = $testimonial['position'];
                                    $stars = $testimonial['stars'];
                                    $review = $testimonial['review'];
                                }
                                ?>
                                <div class="wcl-testimonials__slide swiper-slide">
                                    <div class="wcl-testimonials__content">
                                        <div class="wcl-testimonials__info">
                                            <?php if (!empty($image)): ?>
                                                <div class="wcl-testimonials__image">
                                                    <?php echo wp_get_attachment_image($image, 'image-sm'); ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="wcl-testimonials__person">
                                                <div class="wcl-testimonials__name"><?php echo $name; ?></div>
                                                <?php if (!empty($position)): ?>
                                                    <div class="wcl-testimonials__position"><?php echo $position; ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php if (!empty($stars)): ?>
                                            <div data-rating="<?php echo $stars; ?>" class="wcl-testimonials__rating rating">
                                                <div class="rating__items">
                                                    <label class="rating__item">
                                                        <input class="rating__input" type="radio" name="rating" value="1">
                                                    </label>
                                                    <label class="rating__item">
                                                        <input class="rating__input" type="radio" name="rating" value="2">
                                                    </label>
                                                    <label class="rating__item">
                                                        <input class="rating__input" type="radio" name="rating" value="3">
                                                    </label>
                                                    <label class="rating__item">
                                                        <input class="rating__input" type="radio" name="rating" value="4">
                                                    </label>
                                                    <label class="rating__item">
                                                        <input class="rating__input" type="radio" name="rating" value="5">
                                                    </label>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="wcl-testimonials__review">"<?php echo $review; ?>"</div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="wcl-testimonials__pagination swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>