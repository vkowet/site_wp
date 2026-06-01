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

$stats = [];

for($i=1;$i<=4;$i++){

    $defaults_values = ['1891','10+','100+','50+'];

    $defaults_labels = [
        'Année de fondation',
        'Pays de présence',
        'Religieuses et missionnaires',
        'Œuvres éducatives et sociales'
    ];

    $stats[] = [
        'value' => fms_get_option(
            'institution',
            'stat_'.$i.'_value',
            $defaults_values[$i-1]
        ),
        'label' => fms_get_option(
            'institution',
            'stat_'.$i.'_label',
            $defaults_labels[$i-1]
        ),
    ];
}

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

<section class="fms-institutional-section" style="padding:60px 20px;background:#f8f9fb;">
<div class="fms-container" style="max-width:1200px;margin:0 auto;">

<div style="text-align:center;margin-bottom:40px;">
<h2 style="color:#16324f;margin-bottom:15px;">
<?php echo esc_html($title); ?>
</h2>

<p style="max-width:800px;margin:0 auto;color:#555;line-height:1.7;">
<?php echo esc_html($intro); ?>
</p>
</div>

<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:20px;margin-bottom:45px;">

<?php foreach($stats as $item): ?>

<div style="background:#fff;padding:30px 20px;text-align:center;border-radius:10px;box-shadow:0 4px 18px rgba(0,0,0,.06);">
<div style="font-size:2rem;font-weight:700;color:#16324f;">
<?php echo esc_html($item['value']); ?>
</div>

<div style="margin-top:10px;color:#666;">
<?php echo esc_html($item['label']); ?>
</div>
</div>

<?php endforeach; ?>

</div>

<blockquote style="max-width:900px;margin:0 auto;text-align:center;font-size:1.2rem;font-style:italic;color:#16324f;line-height:1.8;">
« <?php echo esc_html($quote); ?> »
<footer style="margin-top:15px;font-size:1rem;font-style:normal;color:#666;">
<?php echo esc_html($author); ?>
</footer>
</blockquote>

</div>
</section>
