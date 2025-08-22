<?php get_header(); ?>

<main id="wcl-page-content" class="wcl-page-content">
    <div class="wcl-products wcl-section-inner">
        <?php if (have_posts()): ?>
            <div class="wcl-products__grid">
                <?php while (have_posts()):
                    the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('wcl-product__item'); ?>>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="excerpt"><?php the_excerpt(); ?></div>
                    </article>
                <?php endwhile; ?>
            </div>
            <?php the_posts_pagination(); ?>
        <?php else: ?>
            <p>No products found</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>