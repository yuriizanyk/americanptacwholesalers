<?php

get_header();

$product_page_title = get_field('product_page_title', 'option');
$product_page_text_start = get_field('product_page_text_start', 'option');
$product_page_text_end = get_field('product_page_text_end', 'option');
$link = get_field('product_button', 'option');
$product_button_details = get_field('product_button_details', 'option');
$no_product_text = get_field('no_product_text', 'option');
$help_section_title = get_field('help_section_title', 'option');
$help_section_text = get_field('help_section_text', 'option');
$help_section_button = get_field('help_section_button', 'option');
$help_section_details = get_field('help_section_details', 'option');
?>

<main id="wcl-page-content" class="wcl-page-content">
    <div class="wcl-state">
        <div class="wcl-state__container wcl-section">

            <div class="wcl-state__content wcl-section-inner">
                <div class="wcl-state__header">
                    <div class="wcl-state__breadcrumb">
                        <a class="wcl-state__back" href="/states">
                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.875 14.25L7.125 9.5L11.875 4.75" stroke="#3D7E71" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span>Back to all states</span>
                        </a>
                    </div>
                    <?php if (!empty($product_page_title)): ?>
                        <h1 class="wcl-state__title">
                            <?= esc_html($product_page_title); ?>     <?php single_term_title(); ?>
                        </h1>
                    <?php endif; ?>
                    <?php if (!empty($product_page_text_start) || !empty($product_page_text_end)): ?>
                    <p class="wcl-state__text">
                        <?php
                        echo (!empty($product_page_text_start) ? esc_html($product_page_text_start) . ' ' . single_term_title('', false) . '. ' : '')
                            . (!empty($product_page_text_end) ? esc_html($product_page_text_end) : '');
                        ?>
                    </p>
                    <?php endif; ?>
                </div>

                <?php
                if (have_posts()): ?>
                    <div class="wcl-state__products">
                        <?php while (have_posts()):
                            the_post();
                            $btu = get_field('btu', get_the_ID());
                            $volt = get_field('volt', get_the_ID());
                            $amper = get_field('amper', get_the_ID());
                            $pump = get_field('pump', get_the_ID());
                            $controls = get_field('controls', get_the_ID());
                            $additional_info = get_field('additional_info', get_the_ID());
                            $images = get_field('gallery', get_the_ID());
                            ?>
                            <div class="wcl-state__product">
                                <div class="wcl-state__product-content">
                                    <h2 class="wcl-state__product-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    <div class="wcl-state__product-info">
                                        <p class="wcl-state__product-info-top">
                                            <?php if ($btu): ?>
                                                <span><?php echo esc_html($btu); ?> BTU |</span>
                                            <?php endif; ?>
                                            <?php if ($pump): ?>
                                                <span><?php echo esc_html($pump); ?></span>
                                            <?php endif; ?>
                                        </p>
                                        <p class="wcl-state__product-info-middle">
                                            <?php if ($volt): ?>
                                                <span><?php echo esc_html($volt); ?> Volt |</span>
                                            <?php endif; ?>
                                            <?php if ($amper): ?>
                                                <span><?php echo esc_html($amper); ?> Amp |</span>
                                            <?php endif; ?>
                                            <?php if ($controls): ?>
                                                <span><?php echo esc_html($controls); ?></span>
                                            <?php endif; ?>
                                        </p>
                                        <?php if ($additional_info): ?>
                                            <p class="wcl-state__product-info-bottom"><?php echo esc_html($additional_info); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="wcl-state__product-buttons">
                                        <?php if ($link):
                                            $url = $link['url'];
                                            $name = $link['title'];
                                            $target = $link['target'] ?: '_self';
                                            ?>
                                            <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>"
                                                class="wcl-state__product-button wcl-button wcl-button--green">
                                                <?= esc_html($name); ?>
                                            </a>
                                        <?php endif; ?>
                                        <div class="wcl-state__product-description"><?= esc_html($product_button_details); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($images): ?>
                                    <div class="wcl-state__product-gallery">
                                        <div class="wcl-state__product-slider swiper">
                                            <div class="swiper-wrapper">
                                                <?php foreach ($images as $image): ?>
                                                    <div class="swiper-slide">
                                                        <div class="wcl-state__product-image">
                                                            <?= wp_get_attachment_image($image, 'landscape-sm'); ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <div class="wcl-state__button-prev swiper-button-prev"></div>
                                            <div class="wcl-state__button-next swiper-button-next"></div>
                                            <div class="wcl-state__pagination swiper-pagination"></div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <?php the_posts_pagination(); ?>
                <?php else: ?>
                    <p class="wcl-state__no-products"><?= esc_html($no_product_text); ?></p>
                <?php endif; ?>
            </div>

            <div class="wcl-state__help">
                <div class="wcl-state__help-content wcl-section-inner">
                    <div class="wcl-state__help-body">
                        <h2 class="wcl-state__help-title wcl-h2"><?= $help_section_title; ?></h2>
                        <div class="wcl-state__help-text"><?= $help_section_text; ?></div>
                    </div>
                    <div class="wcl-state__help-action">
                        <?php if ($help_section_button):
                            $url = $help_section_button['url'];
                            $name = $help_section_button['title'];
                            $target = $help_section_button['target'] ?: '_self';
                            ?>
                            <a href="<?= esc_url($url); ?>" target="<?= esc_attr($target); ?>"
                                class="wcl-state__help-link wcl-button wcl-button--green">
                                <?= esc_html($name); ?>
                            </a>
                        <?php endif; ?>
                        <?php if (!empty($help_section_details)): ?>
                            <div class="wcl-state__help-link-text"><?= $help_section_details; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

<?php

get_footer();

?>