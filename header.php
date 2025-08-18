<!DOCTYPE html>
<html <?php echo get_language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo wp_get_document_title(); ?></title>

    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


<!--
====================================================================
    DEVELOPED BY WebComplete (webcomplete.io)
====================================================================
 -->
<?php $header_logo = get_field('header_logo', 'option'); ?>

    <div class="wcl-body-inner">
        <!-- HEADER -->
        <header id="wcl-header" class="wcl-header">
            <div class="wcl-header__container wcl-section-inner">
                <div class="wcl-header__body">

                    <a class="wcl-header__logo" href="<?= esc_url(home_url('/')); ?>" aria-label="Site Logo">
                        <?= wp_get_attachment_image($header_logo, 'logo'); ?>
                    </a>

                    <div class="wcl-header__menu menu">
                        <nav class="menu__body" id="main-menu">

                            <?php wp_nav_menu([
                                'theme_location' => 'header-menu',
                                'container' => 'false',
                                'menu_class' => 'menu__list'
                            ]); ?>
                        </nav>
                    </div>

                    <button type="button" class="menu__icon menu-icon" aria-label="Open-close menu button">
                        <span></span>
                    </button>
                </div>
        </header>