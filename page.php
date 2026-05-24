<?php get_header(); ?>

<section class="fms-page-hero">
    <div class="fms-page-hero-overlay">
        <div class="fms-page-hero-content">
            <span class="fms-breadcrumb">
                <a href="<?php echo home_url(); ?>">Accueil</a> > <?php the_title(); ?>
            </span>
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
</section>

<section class="fms-page-content">
    <div class="fms-page-container">

        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        endif;
        ?>

    </div>
</section>

<?php get_footer(); ?>
