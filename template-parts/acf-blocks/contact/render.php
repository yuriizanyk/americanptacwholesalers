<?php
/**
 * Contact Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */

if (isset($block['data']['is_example']) && $block['data']['is_example']) {
    ?>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/acf-preview/contact.png" alt="Contact Preview"
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
$address = get_field('address');
$phones = get_field('phones');
$emails = get_field('emails');
$hours = get_field('hours');
$socials = get_field('socials', 'option');
$contact_form = get_field('contact_form');
?>

<?php if ($title): ?>
    <section <?= $anchor; ?> class="wcl-contact">
        <div class="wcl-contact__container wcl-section">
            <div class="wcl-contact__header wcl-section-inner">
                <h2 class="wcl-contact__title wcl-h2 wcl-h2--anim"><?= $title; ?></h2>
                <?php if ($text): ?>
                    <div class="wcl-contact__text"><?= $text; ?></div>
                <?php endif; ?>
            </div>
            <div class="wcl-contact__body wcl-section-inner">
                <?php if ($contact_form): ?>
                    <div class="wcl-contact__form">
                        <h3 class="wcl-contact__form-title wcl-h3">Send Us a Message</h3>
                        <div class="wcl-contact__form-container">
                            <?php echo do_shortcode($contact_form); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="wcl-contact__contacts">
                    <h3 class="wcl-contact__contacts-title wcl-h3">Contact Information</h3>
                    <div class="wcl-contact__contacts-list">
                        <div class="wcl-contact__contacts-items">
                            <?php if ($address): ?>
                                <div class="wcl-contact__contacts-item">
                                    <div class="wcl-contact__contacts-item-icon">
                                        <svg width="38" height="38" viewBox="0 0 38 38" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="Iconly/Bulk/Location">
                                                <g id="Location">
                                                    <path id="Path_34175" fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M13.5087 4.64973C16.9681 2.63969 21.2202 2.67482 24.6471 4.74175C28.0403 6.85078 30.1026 10.6148 30.0834 14.6638C30.0044 18.6862 27.793 22.4673 25.0288 25.3903C23.4334 27.085 21.6486 28.5835 19.711 29.8552C19.5114 29.9706 19.2928 30.0479 19.066 30.0832C18.8477 30.0739 18.6351 30.0094 18.4474 29.8955C15.4892 27.9846 12.8939 25.5454 10.7865 22.6953C9.02309 20.3162 8.02123 17.4418 7.91699 14.4627C7.9147 10.4059 10.0494 6.65976 13.5087 4.64973ZM15.5081 16.1415C16.09 17.5761 17.4635 18.5119 18.9873 18.5119C19.9856 18.519 20.9453 18.1192 21.6524 17.4014C22.3596 16.6835 22.7555 15.7074 22.752 14.6905C22.7573 13.1383 21.8434 11.7359 20.4371 11.1382C19.0308 10.5404 17.4095 10.8652 16.3301 11.9608C15.2507 13.0565 14.9262 14.7069 15.5081 16.1415Z"
                                                        fill="#3D7E71" />
                                                    <ellipse id="Ellipse_743" opacity="0.4" cx="19.0007" cy="33.2498"
                                                        rx="7.91667" ry="1.58333" fill="#3D7E71" />
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="wcl-contact__contacts-item-info">
                                        <h3 class="wcl-contact__contacts-item-title">Our Location</h3>
                                        <?php if ($address):
                                            $url = $address['url'];
                                            $name = $address['title'];
                                            $target = $address['target'] ?: '_self';
                                            ?>
                                            <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>"
                                                class="wcl-contact__contacts-item-connect">
                                                <?= wp_kses_post($name); ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if ($phones): ?>
                                <div class="wcl-contact__contacts-item">
                                    <div class="wcl-contact__contacts-item-icon">
                                        <svg width="38" height="38" viewBox="0 0 38 38" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="Iconly/Bulk/Calling">
                                                <g id="Group">
                                                    <g id="Calling">
                                                        <path id="Fill 1" opacity="0.4"
                                                            d="M22.8286 8.69244C22.0749 8.55321 21.3826 9.03421 21.2391 9.76995C21.0956 10.5057 21.5782 11.224 22.3114 11.368C24.519 11.7984 26.2235 13.5072 26.6556 15.7224V15.7239C26.7786 16.3616 27.3399 16.8252 27.9864 16.8252C28.0732 16.8252 28.1599 16.8173 28.2482 16.8015C28.9814 16.6543 29.464 15.9376 29.3205 15.2002C28.6755 11.8917 26.1289 9.33642 22.8286 8.69244Z"
                                                            fill="#3D7E71" />
                                                        <path id="Fill 3" opacity="0.4"
                                                            d="M22.7304 3.17906C22.3772 3.12843 22.0224 3.23286 21.7402 3.45753C21.45 3.68538 21.2687 4.01449 21.2293 4.38315C21.1457 5.12839 21.6834 5.80242 22.4277 5.88628C27.5603 6.45906 31.5497 10.4574 32.1268 15.606C32.2041 16.2959 32.7828 16.8164 33.4735 16.8164C33.5255 16.8164 33.576 16.8133 33.628 16.8069C33.9891 16.7674 34.3108 16.5886 34.5378 16.3038C34.7633 16.019 34.8658 15.6646 34.8248 15.3022C34.1058 8.87831 29.134 3.89265 22.7304 3.17906Z"
                                                            fill="#3D7E71" />
                                                    </g>
                                                </g>
                                                <g id="Call">
                                                    <path id="Stroke 1" fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M17.4672 20.5396C23.7833 26.8539 25.2161 19.549 29.2376 23.5676C33.1146 27.4435 35.3429 28.2201 30.4308 33.1308C29.8155 33.6253 25.9062 39.5742 12.1676 25.8395C-1.57268 12.103 4.37283 8.1897 4.86744 7.57459C9.79145 2.65026 10.5546 4.89152 14.4316 8.76744C18.4531 12.7878 11.1512 14.2253 17.4672 20.5396Z"
                                                        fill="#3D7E71" />
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="wcl-contact__contacts-item-info">
                                        <h3 class="wcl-contact__contacts-item-title">Phone Number</h3>
                                        <div class="wcl-contact__contacts-item-connects">
                                            <?php foreach ($phones as $phone):
                                                $phone_link = $phone['phone_link'];
                                                $phone_text = $phone['phone_text'];
                                                ?>
                                                <?php
                                                if ($phone_link):
                                                    $url = $phone_link['url'];
                                                    $name = $phone_link['title'];
                                                    $target = $phone_link['target'] ?: '_self';
                                                    ?>
                                                    <div class="wcl-contact__contacts-item-block">
                                                        <a href="<?= esc_url($url); ?>" target="<?= esc_attr($target); ?>"
                                                            class="wcl-contact__contacts-item-connect"><?= esc_html($name); ?></a>
                                                        <?php if ($phone_text): ?>
                                                            <div class="wcl-contact__contacts-item-description">
                                                                <?= esc_html($phone_text); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="wcl-contact__contacts-items">
                            <?php if ($emails): ?>
                                <div class="wcl-contact__contacts-item">
                                    <div class="wcl-contact__contacts-item-icon">
                                        <svg width="38" height="38" viewBox="0 0 38 38" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="Iconly/Bulk/Message">
                                                <g id="Group">
                                                    <path id="Fill 1" opacity="0.4"
                                                        d="M34.8337 25.2387C34.8337 29.6562 31.287 33.2345 26.8695 33.2503H26.8537H11.1628C6.76116 33.2503 3.16699 29.6878 3.16699 25.2703V25.2545C3.16699 25.2545 3.17649 18.2467 3.18916 14.7222C3.19074 14.0603 3.95074 13.6898 4.46849 14.1015C8.23049 17.0861 14.9581 22.528 15.042 22.5992C16.1662 23.5002 17.5912 24.0084 19.0478 24.0084C20.5045 24.0084 21.9295 23.5002 23.0537 22.5818C23.1376 22.5264 29.7147 17.2476 33.5337 14.2139C34.0531 13.8007 34.8162 14.1712 34.8178 14.8314C34.8337 18.329 34.8337 25.2387 34.8337 25.2387Z"
                                                        fill="#3D7E71" />
                                                    <path id="Fill 4"
                                                        d="M34.0034 8.98335C32.6322 6.39935 29.9342 4.74951 26.9639 4.74951H11.1622C8.1919 4.74951 5.4939 6.39935 4.12273 8.98335C3.81557 9.56126 3.96123 10.2817 4.47265 10.6902L16.2289 20.0936C17.0522 20.7586 18.0497 21.0895 19.0472 21.0895C19.0536 21.0895 19.0583 21.0895 19.0631 21.0895C19.0678 21.0895 19.0742 21.0895 19.0789 21.0895C20.0764 21.0895 21.0739 20.7586 21.8972 20.0936L33.6535 10.6902C34.1649 10.2817 34.3106 9.56126 34.0034 8.98335Z"
                                                        fill="#3D7E71" />
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="wcl-contact__contacts-item-info">
                                        <h3 class="wcl-contact__contacts-item-title">Email Address</h3>
                                        <div class="wcl-contact__contacts-item-connects">
                                            <?php foreach ($emails as $email):
                                                $email_link = $email['email_link'];
                                                ?>
                                                <?php
                                                if ($email_link):
                                                    $url = $email_link['url'];
                                                    $name = $email_link['title'];
                                                    $target = $email_link['target'] ?: '_self';
                                                    ?>
                                                    <a href="<?= esc_url($url); ?>" target="<?= esc_attr($target); ?>"
                                                        class="wcl-contact__contacts-item-connect"><?= esc_html($name); ?></a>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if ($hours): ?>
                                <div class="wcl-contact__contacts-item">
                                    <div class="wcl-contact__contacts-item-icon">
                                        <svg width="38" height="38" viewBox="0 0 38 38" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4"
                                                d="M34.8337 18.9998C34.8337 27.7462 27.7451 34.8332 19.0003 34.8332C10.2556 34.8332 3.16699 27.7462 3.16699 18.9998C3.16699 10.2567 10.2556 3.1665 19.0003 3.1665C27.7451 3.1665 34.8337 10.2567 34.8337 18.9998Z"
                                                fill="#3D7E71" />
                                            <path
                                                d="M24.6579 25.0396C24.4505 25.0396 24.2415 24.9857 24.0499 24.8733L17.8338 21.1652C17.4759 20.9498 17.2559 20.5619 17.2559 20.1439V12.1528C17.2559 11.4973 17.7879 10.9653 18.4434 10.9653C19.0989 10.9653 19.6309 11.4973 19.6309 12.1528V19.4694L25.2675 22.8308C25.8296 23.1681 26.0149 23.8964 25.6792 24.4601C25.4559 24.8322 25.0617 25.0396 24.6579 25.0396Z"
                                                fill="#3D7E71" />
                                        </svg>
                                    </div>
                                    <div class="wcl-contact__contacts-item-info">
                                        <h3 class="wcl-contact__contacts-item-title">Business Hours</h3>
                                        <div class="wcl-contact__contacts-item-connects">
                                            <?php foreach ($hours as $hour): ?>
                                                <div class="wcl-contact__contacts-item-period">
                                                    <div class="wcl-contact__contacts-item-days"><?= $hour['days']; ?>: </div>
                                                    <div class="wcl-contact__contacts-item-hours"><?= $hour['period']; ?></div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if ($socials): ?>
                        <div class="wcl-contact__contacts-social-item">
                            <h4 class="wcl-contact__contacts-item-title">Follow Us</h4>
                            <div class="wcl-contact__contacts-item-socials">
                                <?php foreach ($socials as $social):
                                    $social_icon = $social['social_icon'];
                                    $social_link = $social['social_link'];
                                    ?>
                                    <?php
                                    if ($social_link):
                                        $url = $social_link['url'];
                                        $name = $social_link['title'];
                                        $target = $social_link['target'] ?: '_self';
                                        ?>
                                        <a href="<?= esc_url($url); ?>" target="<?= esc_attr($target); ?>"
                                            class="wcl-contact__contacts-item-social">
                                            <?php echo wp_get_attachment_image($social_icon, 'icon-sm'); ?>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>