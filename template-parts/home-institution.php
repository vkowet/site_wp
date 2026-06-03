<?php

$title = fms_get_option(
    'institution',
    'title',
    'Une congrégation au service de l\'Église et du monde'
);

$intro = fms_get_option(
    'institution',
    'intro',
    'Depuis sa fondation, la congrégation des Franciscaines Servantes de Marie poursuit sa mission d’éducation, de fraternité et de service auprès des populations qu’elle accompagne.'
);

$quote = fms_get_option(
    'institution',
    'quote',
    'Servir, apprendre et éduquer dans un esprit de fraternité, de simplicité et d’espérance.'
);

$author = fms_get_option(
    'institution',
    'quote_author',
    'Congrégation des Franciscaines Servantes de Marie'
);

?>

<section class="fms-institutional-section"
         style="
            padding:70px 20px;
            background:linear-gradient(
                180deg,
                #eef2f6 0%,
                #e6edf4 100%
            );
         ">

    <div class="fms-container" style="max-width:1200px;margin:0 auto;">

        <div style="text-align:center;margin-bottom:50px;">

            <h2 style="
                color:#16324f;
                margin-bottom:20px;
                font-size:2rem;
                font-weight:700;
            ">
                <?php echo esc_html($title); ?>
            </h2>

            <p style="
                max-width:850px;
                margin:0 auto;
                color:#4f5d6b;
                line-height:1.8;
                font-size:1.05rem;
            ">
                <?php echo esc_html($intro); ?>
            </p>

        </div>

        <?php get_template_part('template-parts/home-stats'); ?>

        <blockquote style="
            max-width:900px;
            margin:50px auto 0;
            padding:35px;
            background:#ffffff;
            border-left:5px solid #16324f;
            border-radius:8px;
            text-align:center;
            font-size:1.2rem;
            font-style:italic;
            color:#16324f;
            line-height:1.8;
            box-shadow:0 6px 20px rgba(0,0,0,.05);
        ">

            « <?php echo esc_html($quote); ?> »

            <footer style="
                margin-top:20px;
                font-size:1rem;
                font-style:normal;
                color:#5c6773;
                font-weight:600;
            ">
                <?php echo esc_html($author); ?>
            </footer>

        </blockquote>

    </div>

</section>