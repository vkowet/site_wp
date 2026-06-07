<?php

$title = fms_get_option(
    'governance',
    'title',
    'Notre gouvernance'
);

$subtitle = fms_get_option(
    'governance',
    'subtitle',
    'Une gouvernance au service de la mission, de l’unité et de la fidélité au charisme.'
);

$superior_name = fms_get_option(
    'governance',
    'superior_name',
    'Mère Supérieure Générale'
);

$superior_role = fms_get_option(
    'governance',
    'superior_role',
    'Supérieure Générale'
);

$superior_message = fms_get_option(
    'governance',
    'superior_message',
    'La Supérieure Générale, avec son Conseil, accompagne la vie de la Congrégation et veille à la communion entre les communautés, au service de l’Église et du monde.'
);

$superior_photo = fms_get_option(
    'governance',
    'superior_photo'
);

$superior_photo_url = $superior_photo
    ? wp_get_attachment_image_url($superior_photo, 'large')
    : '';

$hero_title = fms_get_option(
    'governance',
    'hero_title',
    'Gouvernance'
);

$hero_text = fms_get_option(
    'governance',
    'hero_text',
    'Une responsabilité exercée dans l’écoute, le discernement et le service de la mission commune.'
);

$council_title = fms_get_option(
    'governance',
    'council_title',
    'Conseil Général'
);

$org_title = fms_get_option(
    'governance',
    'org_title',
    'Organisation de la Congrégation'
);

$org_text = fms_get_option(
    'governance',
    'org_text',
    'La Congrégation est gouvernée par la Supérieure Générale et son Conseil. Ensemble, elles veillent à la fidélité au charisme, à la mission éducative et sociale, et à l’unité des communautés présentes dans le monde.'
);

$council_members = [];

for ($i = 1; $i <= 6; $i++) {
    $name = fms_get_option('governance', 'member_' . $i . '_name');

    if (empty($name)) {
        continue;
    }

    $photo = fms_get_option('governance', 'member_' . $i . '_photo');

    $council_members[] = [
        'name' => $name,
        'role' => fms_get_option('governance', 'member_' . $i . '_role'),
        'photo_url' => $photo ? wp_get_attachment_image_url($photo, 'medium') : '',
    ];
}
?>

<style>
.fms-governance-section {
    background: #f7f9fb;
    color: #22313f;
    padding: 56px 20px 80px;
}

.fms-governance-container {
    max-width: 1120px;
    margin: 0 auto;
}

.fms-governance-header {
    border-left: 5px solid #234e70;
    padding: 10px 0 12px 28px;
    margin-bottom: 48px;
}

.fms-governance-kicker {
    color: #567086;
    font-size: 0.78rem;
    font-weight: 700;
    letter-spacing: 0.12em;
    margin: 0 0 12px;
    text-transform: uppercase;
}

.fms-governance-header h1 {
    color: #16324f;
    font-size: clamp(2rem, 4vw, 3rem);
    line-height: 1.12;
    margin: 0 0 18px;
}

.fms-governance-header p,
.fms-governance-intro p,
.fms-governance-org p {
    color: #3e5367;
    font-size: 1.04rem;
    line-height: 1.85;
    margin: 0;
    max-width: 820px;
}

.fms-governance-intro {
    margin-bottom: 42px;
}

.fms-governance-intro h2,
.fms-governance-council h2,
.fms-governance-org h2 {
    color: #16324f;
    font-size: 1.65rem;
    line-height: 1.25;
    margin: 0 0 14px;
}

.fms-governance-tree {
    display: grid;
    gap: 0;
}

.fms-governance-superior {
    background: #ffffff;
    border: 1px solid #d9e2ec;
    border-top: 4px solid #234e70;
    display: grid;
    gap: 34px;
    grid-template-columns: 220px minmax(0, 1fr);
    padding: 34px;
}

.fms-governance-photo,
.fms-governance-photo-placeholder {
    aspect-ratio: 4 / 5;
    background: #e6edf4;
    border: 1px solid #d9e2ec;
    width: 100%;
}

.fms-governance-photo {
    object-fit: cover;
}

.fms-governance-person h3,
.fms-governance-member h3 {
    color: #16324f;
    font-size: 1.35rem;
    line-height: 1.25;
    margin: 0 0 8px;
}

.fms-governance-role {
    color: #567086;
    font-size: 0.92rem;
    font-weight: 700;
    letter-spacing: 0.04em;
    margin: 0 0 18px;
    text-transform: uppercase;
}

.fms-governance-message {
    color: #334e68;
    font-size: 1rem;
    line-height: 1.9;
    margin: 0;
}

.fms-governance-connector {
    align-items: center;
    display: flex;
    flex-direction: column;
    height: 72px;
    justify-content: center;
}

.fms-governance-connector::before {
    background: #b8c7d3;
    content: '';
    display: block;
    height: 42px;
    width: 1px;
}

.fms-governance-connector span {
    background: #f7f9fb;
    border: 1px solid #b8c7d3;
    color: #234e70;
    font-size: 0.76rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    padding: 7px 14px;
    text-transform: uppercase;
}

.fms-governance-council {
    margin-bottom: 54px;
}

.fms-governance-council h2 {
    text-align: center;
}

.fms-governance-members {
    display: grid;
    gap: 18px;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
}

.fms-governance-member {
    background: #ffffff;
    border: 1px solid #d9e2ec;
    padding: 24px;
    text-align: center;
}

.fms-governance-member img,
.fms-governance-member-placeholder {
    background: #e6edf4;
    border: 1px solid #d9e2ec;
    height: 104px;
    margin: 0 auto 18px;
    object-fit: cover;
    width: 104px;
}

.fms-governance-member h3 {
    font-size: 1.12rem;
}

.fms-governance-member p {
    color: #567086;
    line-height: 1.6;
    margin: 0;
}

.fms-governance-org {
    background: #ffffff;
    border: 1px solid #d9e2ec;
    padding: 34px;
}

@media (max-width: 760px) {
    .fms-governance-section {
        padding: 40px 16px 64px;
    }

    .fms-governance-header {
        padding-left: 20px;
    }

    .fms-governance-superior {
        grid-template-columns: 1fr;
        padding: 24px;
    }

    .fms-governance-photo,
    .fms-governance-photo-placeholder {
        max-width: 220px;
    }

    .fms-governance-org {
        padding: 24px;
    }
}
</style>

<section class="fms-governance-section">
    <div class="fms-governance-container">
        <header class="fms-governance-header">
            <p class="fms-governance-kicker"><?php echo esc_html($hero_title); ?></p>
            <h1><?php echo esc_html($title); ?></h1>
            <p><?php echo esc_html($hero_text); ?></p>
        </header>

        <div class="fms-governance-intro">
            <p><?php echo esc_html($subtitle); ?></p>
        </div>

        <div class="fms-governance-tree" aria-label="<?php echo esc_attr($org_title); ?>">
            <article class="fms-governance-superior">
                <div>
                    <?php if ($superior_photo_url): ?>
                        <img
                            class="fms-governance-photo"
                            src="<?php echo esc_url($superior_photo_url); ?>"
                            alt="<?php echo esc_attr($superior_name); ?>">
                    <?php else: ?>
                        <div class="fms-governance-photo-placeholder" aria-hidden="true"></div>
                    <?php endif; ?>
                </div>

                <div class="fms-governance-person">
                    <p class="fms-governance-role"><?php echo esc_html($superior_role); ?></p>
                    <h3><?php echo esc_html($superior_name); ?></h3>
                    <p class="fms-governance-message"><?php echo nl2br(esc_html($superior_message)); ?></p>
                </div>
            </article>

            <?php if (!empty($council_members)): ?>
                <div class="fms-governance-connector" aria-hidden="true">
                    <span><?php echo esc_html($council_title); ?></span>
                </div>

                <section class="fms-governance-council">
                    <h2><?php echo esc_html($council_title); ?></h2>
                    <div class="fms-governance-members">
                        <?php foreach ($council_members as $member): ?>
                            <article class="fms-governance-member">
                                <?php if ($member['photo_url']): ?>
                                    <img
                                        src="<?php echo esc_url($member['photo_url']); ?>"
                                        alt="<?php echo esc_attr($member['name']); ?>">
                                <?php else: ?>
                                    <div class="fms-governance-member-placeholder" aria-hidden="true"></div>
                                <?php endif; ?>

                                <h3><?php echo esc_html($member['name']); ?></h3>
                                <?php if (!empty($member['role'])): ?>
                                    <p><?php echo esc_html($member['role']); ?></p>
                                <?php endif; ?>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>
        </div>

        <section class="fms-governance-org">
            <h2><?php echo esc_html($org_title); ?></h2>
            <p><?php echo nl2br(esc_html($org_text)); ?></p>
        </section>
    </div>
</section>
