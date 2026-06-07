<?php
/**
 * Template Name: Actualités (FMS)
 * Template Post Type: page
 */

get_header();

$paged = max(1, (int) get_query_var('paged'), (int) get_query_var('page'));
$news_query = new WP_Query([
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 9,
    'paged'          => $paged,
]);
?>

<main class="fms-news-archive">
    <section class="fms-news-archive-hero">
        <div class="fms-news-archive-hero-inner">
            <p class="fms-news-archive-kicker">Vie de la congrégation</p>
            <h1>Actualités</h1>
            <p>Retrouvez les nouvelles publiées par les Sœurs Franciscaines Servantes de Marie, leurs activités, leurs missions et les temps forts de la vie des communautés.</p>
        </div>
    </section>

    <section class="fms-news-archive-content">
        <div class="fms-news-archive-heading">
            <div>
                <span>Articles publiés</span>
                <h2>À lire récemment</h2>
            </div>
            <a href="<?php echo esc_url(home_url('/')); ?>">Retour à l'accueil</a>
        </div>

        <?php if ($news_query->have_posts()): ?>
            <div class="fms-news-archive-grid">
                <?php while ($news_query->have_posts()): $news_query->the_post(); ?>
                    <article class="fms-news-archive-card">
                        <a class="fms-news-archive-image" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr(sprintf('Lire %s', get_the_title())); ?>">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('fms-news-thumbnail'); ?>
                            <?php else: ?>
                                <span><?php echo esc_html(mb_substr(get_the_title(), 0, 1)); ?></span>
                            <?php endif; ?>
                        </a>

                        <div class="fms-news-archive-card-content">
                            <div class="fms-news-archive-meta">
                                <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)):
                                ?>
                                    <span><?php echo esc_html($categories[0]->name); ?></span>
                                <?php endif; ?>
                            </div>

                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 28)); ?></p>
                            <a class="fms-news-archive-more" href="<?php the_permalink(); ?>">Lire plus</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php
            $pagination = paginate_links([
                'total'     => $news_query->max_num_pages,
                'current'   => $paged,
                'mid_size'  => 1,
                'prev_text' => 'Précédent',
                'next_text' => 'Suivant',
            ]);
            ?>

            <?php if ($pagination): ?>
                <nav class="fms-news-pagination" aria-label="Pagination des actualités">
                    <?php echo wp_kses_post($pagination); ?>
                </nav>
            <?php endif; ?>

            <?php wp_reset_postdata(); ?>
        <?php else: ?>
            <div class="fms-news-empty">
                <h2>Aucun article publié pour le moment</h2>
                <p>Les prochaines nouvelles de la congrégation seront publiées ici.</p>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php get_footer(); ?>
