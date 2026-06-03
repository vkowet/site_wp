<?php
/**
 * Module : Page de Don configurable
 * Description : Ajoute une page de don avec options personnalisables
 */

if (!defined('ABSPATH')) {
    exit;
}

// 1. Ajouter les options dans l'admin
add_action('admin_menu', 'donation_add_admin_menu');
function donation_add_admin_menu() {
    add_theme_page(
        'Page de Don',
        'Faire un Don',
        'manage_options',
        'donation-settings',
        'donation_settings_page'
    );
}

// 2. Enregistrer les réglages
add_action('admin_init', 'donation_register_settings');
function donation_register_settings() {
    register_setting('donation_settings_group', 'donation_title');
    register_setting('donation_settings_group', 'donation_subtitle');
    register_setting('donation_settings_group', 'donation_description');
    register_setting('donation_settings_group', 'donation_amounts');
    register_setting('donation_settings_group', 'donation_rib');
    register_setting('donation_settings_group', 'donation_button_color');
    register_setting('donation_settings_group', 'donation_image');
    
    // Valeurs par défaut
    add_option('donation_title', 'Soutenez notre mission');
    add_option('donation_subtitle', 'Votre générosité fait la différence');
    add_option('donation_amounts', '10,25,50,100');
    add_option('donation_button_color', '#10b981');
}

// 3. Interface d'administration
function donation_settings_page() {
    ?>
    <div class="wrap">
        <h1>Configuration de la page "Faire un Don"</h1>
        <form method="post" action="options.php">
            <?php settings_fields('donation_settings_group'); ?>
            <?php do_settings_sections('donation-settings'); ?>
            
            <div class="donation-settings-panel" style="max-width: 800px;">
                <div class="card" style="margin: 20px 0; padding: 20px;">
                    <h2>📝 Contenu principal</h2>
                    <table class="form-table">
                        <tr>
                            <th scope="row">Titre</th>
                            <td>
                                <input type="text" name="donation_title" 
                                       value="<?php echo esc_attr(get_option('donation_title')); ?>" 
                                       class="regular-text" required>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Sous-titre</th>
                            <td>
                                <input type="text" name="donation_subtitle" 
                                       value="<?php echo esc_attr(get_option('donation_subtitle')); ?>" 
                                       class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Description</th>
                            <td>
                                <?php wp_editor(get_option('donation_description'), 'donation_description', array(
                                    'textarea_rows' => 5,
                                    'media_buttons' => false,
                                    'teeny' => true
                                )); ?>
                            </td>
                        </tr>
                    </table>
                </div>
                
                <div class="card" style="margin: 20px 0; padding: 20px;">
                    <h2>💰 Montants de don</h2>
                    <table class="form-table">
                        <tr>
                            <th scope="row">Montants suggérés (€)</th>
                            <td>
                                <input type="text" name="donation_amounts" 
                                       value="<?php echo esc_attr(get_option('donation_amounts')); ?>" 
                                       class="regular-text" 
                                       placeholder="10,25,50,100">
                                <p class="description">Séparés par des virgules</p>
                            </td>
                        </tr>
                    </table>
                </div>
                
                <div class="card" style="margin: 20px 0; padding: 20px;">
                    <h2>🏦 Informations bancaires</h2>
                    <table class="form-table">
                        <tr>
                            <th scope="row">RIB / IBAN</th>
                            <td>
                                <textarea name="donation_rib" rows="4" class="large-text"><?php 
                                    echo esc_textarea(get_option('donation_rib')); 
                                ?></textarea>
                                <p class="description">IBAN, BIC, titulaire du compte</p>
                            </td>
                        </tr>
                    </table>
                </div>
                
                <div class="card" style="margin: 20px 0; padding: 20px;">
                    <h2>🎨 Apparence</h2>
                    <table class="form-table">
                        <tr>
                            <th scope="row">Couleur des boutons</th>
                            <td>
                                <input type="color" name="donation_button_color" 
                                       value="<?php echo esc_attr(get_option('donation_button_color')); ?>">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <?php submit_button('Enregistrer les paramètres', 'primary', 'submit', true); ?>
        </form>
        
        <div class="card" style="margin-top: 30px; padding: 20px; background: #f0f9ff;">
            <h3>📄 Shortcode à utiliser</h3>
            <p>Insérez ce shortcode dans votre page "Faire un Don" :</p>
            <code style="display: block; padding: 10px; background: #fff; border-left: 3px solid #10b981;">
                [faire_un_don]
            </code>
        </div>
    </div>
    <?php
}

// 4. Shortcode pour afficher le formulaire de don
add_shortcode('faire_un_don', 'donation_render_form');
function donation_render_form() {
    ob_start();
    
    $title = get_option('donation_title', 'Soutenez notre mission');
    $subtitle = get_option('donation_subtitle', '');
    $description = get_option('donation_description', '');
    $amounts = array_map('trim', explode(',', get_option('donation_amounts', '10,25,50,100')));
    $button_color = get_option('donation_button_color', '#10b981');
    $rib = get_option('donation_rib', '');
    ?>
    
    <style>
        .donation-module {
            max-width: 700px;
            margin: 0 auto;
            font-family: inherit;
        }
        .donation-header {
            text-align: center;
            margin-bottom: 40px;
        }
        .donation-header h2 {
            color: <?php echo esc_attr($button_color); ?>;
            margin-bottom: 10px;
        }
        .donation-description {
            text-align: center;
            color: #4b5563;
            line-height: 1.6;
        }
        .donation-amounts {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            gap: 15px;
            margin: 30px 0;
        }
        .amount-btn {
            background: white;
            border: 2px solid #e5e7eb;
            padding: 15px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            border-radius: 8px;
            font-family: inherit;
        }
        .amount-btn:hover {
            border-color: <?php echo esc_attr($button_color); ?>;
            transform: translateY(-2px);
        }
        .amount-btn.active {
            background: <?php echo esc_attr($button_color); ?>;
            border-color: <?php echo esc_attr($button_color); ?>;
            color: white;
        }
        .custom-amount {
            margin: 20px 0;
            text-align: center;
        }
        .custom-amount input {
            padding: 12px;
            font-size: 16px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            width: 200px;
            text-align: center;
            font-family: inherit;
        }
        .donate-btn {
            background: <?php echo esc_attr($button_color); ?>;
            color: white;
            border: none;
            padding: 15px 40px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            border-radius: 8px;
            display: block;
            margin: 30px auto;
            transition: opacity 0.3s;
            font-family: inherit;
        }
        .donate-btn:hover {
            opacity: 0.9;
        }
        .rib-info {
            background: #f9fafb;
            border-left: 4px solid <?php echo esc_attr($button_color); ?>;
            padding: 20px;
            margin-top: 40px;
            border-radius: 8px;
        }
        .rib-info h4 {
            margin-top: 0;
            color: <?php echo esc_attr($button_color); ?>;
        }
        .rib-info pre {
            white-space: pre-wrap;
            font-family: monospace;
            background: white;
            padding: 15px;
            border-radius: 5px;
        }
        @media (max-width: 640px) {
            .donation-amounts {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
    
    <div class="donation-module">
        <div class="donation-header">
            <h2><?php echo esc_html($title); ?></h2>
            <?php if($subtitle): ?>
                <p style="color: #6b7280;"><?php echo esc_html($subtitle); ?></p>
            <?php endif; ?>
        </div>
        
        <?php if($description): ?>
            <div class="donation-description">
                <?php echo wpautop($description); ?>
            </div>
        <?php endif; ?>
        
        <div class="donation-amounts">
            <?php foreach($amounts as $amount): ?>
                <button type="button" class="amount-btn" data-amount="<?php echo intval($amount); ?>">
                    <?php echo intval($amount); ?> €
                </button>
            <?php endforeach; ?>
        </div>
        
        <div class="custom-amount">
            <input type="number" id="custom-amount" placeholder="Autre montant" min="1" step="1">
        </div>
        
        <button class="donate-btn" onclick="handleDonation()">
            Faire un don
        </button>
        
        <?php if($rib): ?>
            <div class="rib-info">
                <h4>📋 Coordonnées bancaires</h4>
                <?php echo wpautop($rib); ?>
            </div>
        <?php endif; ?>
    </div>
    
    <script>
        // Gestion des montants
        const amountBtns = document.querySelectorAll('.amount-btn');
        const customInput = document.getElementById('custom-amount');
        
        amountBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                amountBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                if(customInput) customInput.value = '';
            });
        });
        
        if(customInput) {
            customInput.addEventListener('input', function() {
                amountBtns.forEach(b => b.classList.remove('active'));
            });
        }
        
        function handleDonation() {
            let selectedAmount = document.querySelector('.amount-btn.active');
            let customAmount = customInput ? customInput.value : '';
            let amount = customAmount || (selectedAmount ? selectedAmount.dataset.amount : '');
            
            if(!amount || amount <= 0) {
                alert('Veuillez sélectionner ou entrer un montant valide');
                return;
            }
            
            // TODO: Intégrer Stripe/PayPal ici
            alert(`Merci pour votre don de ${amount}€ !\nLes informations bancaires sont disponibles ci-dessous.`);
        }
    </script>
    
    <?php
    return ob_get_clean();
}

// 5. Ajouter le support du shortcode dans le contenu de la page
add_filter('the_content', 'donation_auto_shortcode');
function donation_auto_shortcode($content) {
    global $post;
    if(is_page() && $post && $post->ID == get_option('donation_page_id')) {
        if(!has_shortcode($content, 'faire_un_don')) {
            $content = '[faire_un_don]' . $content;
        }
    }
    return $content;
}

// 6. Définir la page courante comme page de don (optionnel)
add_action('admin_init', 'donation_save_page_id');
function donation_save_page_id() {
    $page = get_page_by_path('faire-un-don');
    if($page && !get_option('donation_page_id')) {
        update_option('donation_page_id', $page->ID);
    }
}