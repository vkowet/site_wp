<?php

$title = fms_get_option(
    'governance',
    'title',
    'Notre gouvernance'
);

$subtitle = fms_get_option(
    'governance',
    'subtitle',
    'Une gouvernance au service de la mission et de la fraternité.'
);

$superior_name = fms_get_option(
    'governance',
    'superior_name',
    'Mère Supérieure Générale'
);

$superior_role = fms_get_option(
    'governance',
    'superior_role',
    'Congrégation des Franciscaines Servantes de Marie'
);

$superior_message = fms_get_option(
    'governance',
    'superior_message',
    'Message de présentation de la gouvernance.'
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
    'Au service de la mission, de la fraternité et de l’Évangile.'
);

$org_title = fms_get_option(
    'governance',
    'org_title',
    'Organisation de la Congrégation'
);

$org_text = fms_get_option(
    'governance',
    'org_text',
    'La Congrégation est gouvernée par la Supérieure Générale et son Conseil. Ensemble, ils veillent à la fidélité au charisme, à la mission éducative et à l’unité des communautés.'
);

?>

<section class="fms-governance-section"
style="
background:#f5f7fa;
">

<div class="fms-container" style="max-width:1200px;margin:0 auto;">

    <div style="
background:linear-gradient(135deg,#16324f,#21476f);
color:white;
padding:80px 40px;
border-radius:14px;
margin:50px 0;
text-align:center;
">

<h1 style="
margin-bottom:20px;
font-size:3rem;
color:white;
">
<?php echo esc_html($hero_title); ?>
</h1>

<p style="
max-width:700px;
margin:0 auto;
font-size:1.2rem;
line-height:1.8;
opacity:.95;
">
<?php echo esc_html($hero_text); ?>
</p>

</div>

<div style="text-align:center;margin-bottom:50px;">

<h2 style="color:#16324f;margin-bottom:15px;">
<?php echo esc_html($title); ?>
</h2>

<p style="max-width:800px;margin:0 auto;color:#666;">
<?php echo esc_html($subtitle); ?>
</p>

</div>

<div style="
display:grid;
grid-template-columns:300px 1fr;
gap:40px;
align-items:center;
margin-bottom:50px;
">

<div>

<?php if($superior_photo_url): ?>

<img
src="<?php echo esc_url($superior_photo_url); ?>"
alt="<?php echo esc_attr($superior_name); ?>"
style="
width:100%;
border-radius:12px;
box-shadow:0 6px 20px rgba(0,0,0,.08);
">

<?php endif; ?>

</div>

<div>

<h3 style="color:#16324f;">
<?php echo esc_html($superior_name); ?>
</h3>

<p style="
font-weight:600;
color:#666;
margin-bottom:20px;
">
<?php echo esc_html($superior_role); ?>
</p>

<p style="
line-height:1.9;
color:#444;
">
<?php echo nl2br(esc_html($superior_message)); ?>
</p>

</div>

</div>

<div style="
display:grid;
grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
gap:25px;
">

<?php for($i=1;$i<=6;$i++): ?>

<?php

$name = fms_get_option(
'governance',
'member_'.$i.'_name'
);

if(empty($name)){
    continue;
}

$role = fms_get_option(
'governance',
'member_'.$i.'_role'
);

$photo = fms_get_option(
'governance',
'member_'.$i.'_photo'
);

$photo_url = $photo
? wp_get_attachment_image_url($photo,'medium')
: '';

?>

<div style="
background:white;
border-top:4px solid #16324f;
box-shadow:0 6px 20px rgba(0,0,0,.05);
padding:25px;
border-radius:10px;
text-align:center;
">

<?php if($photo_url): ?>

<img
src="<?php echo esc_url($photo_url); ?>"
style="
width:120px;
height:120px;
object-fit:cover;
border-radius:50%;
margin-bottom:15px;
">

<?php endif; ?>

<h4 style="margin-bottom:8px;color:#16324f;">
<?php echo esc_html($name); ?>
</h4>

<p style="color:#666;">
<?php echo esc_html($role); ?>
</p>

</div>

<?php endfor; ?>

</div>

<div style="
margin-top:70px;
background:white;
padding:50px;
border-radius:12px;
box-shadow:0 6px 20px rgba(0,0,0,.05);
">

<h2 style="
color:#16324f;
margin-bottom:25px;
">
<?php echo esc_html($org_title); ?>
</h2>

<p style="
line-height:2;
color:#444;
max-width:900px;
">
<?php echo nl2br(esc_html($org_text)); ?>
</p>

</div>

<div style="
text-align:center;
padding:60px 20px;
">

<h3 style="
color:#16324f;
font-size:1.8rem;
margin-bottom:15px;
">
Une question concernant notre gouvernance ?
</h3>

<p style="
color:#666;
margin-bottom:25px;
">
Nous sommes à votre écoute pour toute demande d'information.
</p>

<a
href="<?php echo esc_url(home_url('/contact')); ?>"
style="
display:inline-block;
background:#16324f;
color:white;
padding:15px 32px;
border-radius:6px;
text-decoration:none;
font-weight:600;
">
Nous contacter
</a>

</div>

</div>

</section>
