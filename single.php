<?php get_header(); ?>

<!-- MAIN CONTENT -->
<main id="wcl-page-content" class="wcl-page-content">
    <div class="wcl-single wcl-container">
        <div class="wcl-single__container wcl-section-inner">
            <h1><?php the_title(); ?></h1>
            <div><?php the_content(); ?></div>
        </div>
    </div>
</main>

<?php get_footer(); ?>