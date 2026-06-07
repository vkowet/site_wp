<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
        <?php
        $categories = get_the_category();
        $category_ids = wp_list_pluck($categories, 'term_id');
        $related_query = new WP_Query([
            'post_type'           => 'post',
            'post_status'         => 'publish',
            'posts_per_page'      => 3,
            'post__not_in'        => [get_the_ID()],
            'category__in'        => $category_ids,
            'ignore_sticky_posts' => true,
        ]);

        if (!$related_query->have_posts()) {
            wp_reset_postdata();
            $related_query = new WP_Query([
                'post_type'           => 'post',
                'post_status'         => 'publish',
                'posts_per_page'      => 3,
                'post__not_in'        => [get_the_ID()],
                'ignore_sticky_posts' => true,
            ]);
        }
        ?>

        <main class="fms-single-post">
            <article <?php post_class('fms-single-post-article'); ?>>
                <header class="fms-single-post-header">
                    <a class="fms-single-post-back" href="<?php echo esc_url(home_url('/actualites')); ?>">Actualités</a>
                    <div class="fms-single-post-meta">
                        <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
                        <?php if (!empty($categories)): ?>
                            <span><?php echo esc_html($categories[0]->name); ?></span>
                        <?php endif; ?>
                    </div>
                    <h1><?php the_title(); ?></h1>
                    <?php if (has_excerpt()): ?>
                        <p><?php echo esc_html(get_the_excerpt()); ?></p>
                    <?php endif; ?>
                </header>

                <?php if (has_post_thumbnail()): ?>
                    <figure class="fms-single-post-featured">
                        <?php the_post_thumbnail('fms-single-post-image'); ?>
                        <?php if (get_the_post_thumbnail_caption()): ?>
                            <figcaption><?php echo esc_html(get_the_post_thumbnail_caption()); ?></figcaption>
                        <?php endif; ?>
                    </figure>
                <?php endif; ?>

                <div class="fms-single-post-layout">
                    <div class="fms-single-post-main">
                        <div class="fms-single-post-content">
                            <?php the_content(); ?>
                        </div>

                        <?php
                        wp_link_pages([
                            'before' => '<nav class="fms-single-post-pages" aria-label="Pages de l’article">',
                            'after'  => '</nav>',
                        ]);
                        ?>

                        <footer class="fms-single-post-footer">
                            <?php the_tags('<div class="fms-single-post-tags"><span>Mots-clés</span>', '', '</div>'); ?>

                            <nav class="fms-single-post-nav" aria-label="Articles précédent et suivant">
                                <div><?php previous_post_link('%link', 'Article précédent<br><strong>%title</strong>'); ?></div>
                                <div><?php next_post_link('%link', 'Article suivant<br><strong>%title</strong>'); ?></div>
                            </nav>
                        </footer>
                    </div>

                    <aside class="fms-single-post-sidebar" aria-label="Informations complémentaires">
                        <?php if (is_active_sidebar('single-post-sidebar')): ?>
                            <?php dynamic_sidebar('single-post-sidebar'); ?>
                        <?php else: ?>
                            <section class="fms-single-sidebar-widget fms-single-sidebar-search">
                                <h2>Rechercher</h2>
                                <?php get_search_form(); ?>
                            </section>

                            <?php if ($related_query->have_posts()): ?>
                                <section class="fms-single-sidebar-widget">
                                    <h2>Articles similaires</h2>
                                    <div class="fms-single-related-list">
                                        <?php while ($related_query->have_posts()): $related_query->the_post(); ?>
                                            <a class="fms-single-related-item" href="<?php the_permalink(); ?>">
                                                <?php if (has_post_thumbnail()): ?>
                                                    <?php the_post_thumbnail('fms-news-thumbnail'); ?>
                                                <?php endif; ?>
                                                <span>
                                                    <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
                                                    <strong><?php the_title(); ?></strong>
                                                </span>
                                            </a>
                                        <?php endwhile; ?>
                                    </div>
                                </section>
                            <?php endif; ?>
                            <?php if (!empty($categories)): ?>
                                <section class="fms-single-sidebar-widget">
                                    <h2>Rubrique</h2>
                                    <a class="fms-single-category-link" href="<?php echo esc_url(get_category_link($categories[0])); ?>"><?php echo esc_html($categories[0]->name); ?></a>
                                </section>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </aside>
                </div>
            </article>
        </main>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
