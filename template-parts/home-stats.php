<section class="fms-stats-section">
    <div class="fms-stats-grid">
        <?php for ($i = 1; $i <= 4; $i++) : ?>
        <div class="fms-stat-card">
            <span class="fms-stat-number" data-target="<?php echo esc_attr(get_theme_mod('fms_stat_'.$i.'_number', '0')); ?>">0</span>
            <p><?php echo esc_html(get_theme_mod('fms_stat_'.$i.'_label', 'Stat')); ?></p>
        </div>
        <?php endfor; ?>
    </div>
</section>
