<?php
$stats = [
    ['value' => '1891', 'label' => 'Année de fondation'],
    ['value' => '10+', 'label' => 'Pays de présence'],
    ['value' => '100+', 'label' => 'Religieuses et missionnaires'],
    ['value' => '50+', 'label' => 'Œuvres éducatives et sociales'],
];
?>
<section class="fms-institutional-section" style="padding:60px 20px;background:#f8f9fb;">
    <div class="fms-container" style="max-width:1200px;margin:0 auto;">
        <div style="text-align:center;margin-bottom:40px;">
            <h2 style="color:#16324f;margin-bottom:15px;">Une congrégation au service de l'Église et du monde</h2>
            <p style="max-width:800px;margin:0 auto;color:#555;line-height:1.7;">
                Depuis sa fondation, la congrégation des Franciscaines Servantes de Marie poursuit sa mission d'éducation, de fraternité et de service auprès des populations qu'elle accompagne.
            </p>
        </div>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:20px;margin-bottom:45px;">
            <?php foreach ($stats as $item) : ?>
                <div style="background:#fff;padding:30px 20px;text-align:center;border-radius:10px;box-shadow:0 4px 18px rgba(0,0,0,.06);">
                    <div style="font-size:2rem;font-weight:700;color:#16324f;"><?php echo esc_html($item['value']); ?></div>
                    <div style="margin-top:10px;color:#666;"><?php echo esc_html($item['label']); ?></div>
                </div>
            <?php endforeach; ?>
        </div>
        <blockquote style="max-width:900px;margin:0 auto;text-align:center;font-size:1.2rem;font-style:italic;color:#16324f;line-height:1.8;">
            « Servir, apprendre et éduquer dans un esprit de fraternité, de simplicité et d'espérance. »
            <footer style="margin-top:15px;font-size:1rem;font-style:normal;color:#666;">Congrégation des Franciscaines Servantes de Marie</footer>
        </blockquote>
    </div>
</section>