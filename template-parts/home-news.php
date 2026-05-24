<?php
$news = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 3
]);

if ($news->have_posts()) :
?>
<section class="fms-news-section">
    <h2>ACTUALITÉS & MISSIONS</h2>

    <div class="fms-news-grid">

        <?php while ($news->have_posts()) : $news->the_post(); ?>

            <article class="fms-news-card">

                <?php if (has_post_thumbnail()) : ?>
                    <div class="fms-news-image">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium_large'); ?>
                        </a>
                    </div>
                <?php endif; ?>

                <div class="fms-news-content">
                    <span class="fms-news-date"><?php echo get_the_date(); ?></span>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php echo wp_trim_words(get_the_excerpt(), 18); ?></p>
                    <a href="<?php the_permalink(); ?>" class="fms-news-btn">Lire l’actualité</a>
                </div>

            </article>

        <?php endwhile; wp_reset_postdata(); ?>

    </div>
</section>
<?php endif; ?>
