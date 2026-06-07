<?php
$title = fms_get_option('homepage', 'news_title', 'Actualités et missions');
$count = (int) fms_get_option('homepage', 'news_count', 3);
$button = fms_get_option('homepage', 'news_button_text', 'Lire l’actualité');
$news = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => $count,
    'post_status' => 'publish'
]);

if ($news->have_posts()) :
?>
<section class="fms-news-section">
    <?php if ($title): ?><h2><?php echo esc_html($title); ?></h2><?php endif; ?>
    <div class="fms-news-grid">
        <?php while ($news->have_posts()) : $news->the_post(); ?>
            <article class="fms-news-card">
                <?php if (has_post_thumbnail()) : ?><div class="fms-news-image"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium_large'); ?></a></div><?php endif; ?>
                <div class="fms-news-content">
                    <span class="fms-news-date"><?php echo esc_html(get_the_date()); ?></span>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 18)); ?></p>
                    <?php if ($button): ?><a href="<?php the_permalink(); ?>" class="fms-news-btn"><?php echo esc_html($button); ?></a><?php endif; ?>
                </div>
            </article>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</section>
<?php endif; ?>
