<?php
function nook_enqueue_styles(){
    wp_enqueue_style(
        'nook-variables',
        get_template_directory_uri() . '/css/variables.css',
        array(),
        '1.0',
        'all'
    );

    wp_enqueue_style(
        'nook-utilities',
        get_template_directory_uri() . '/css/utilities.css',
        array('nook-variables'),
        '1.0',
        'all'
    );

    wp_enqueue_style(
        'nook-style',
        get_stylesheet_uri(),
        array('nook-utilities'),
        '1.0',
        'all'
    );

    wp_enqueue_style(
        'nook-responsive',
        get_template_directory_uri() . '/css/responsive.css',
        array('nook-style'),
        '1.0',
        'all'
    );


    wp_enqueue_script(
        'nook-navigation',
        get_template_directory_uri() . '/js/navigation.js',
        array(),
        '1.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'nook_enqueue_styles');


// swiper cdn
function nook_swiper_assets(){
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0');

    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);
}
add_action('wp_enqueue_scripts', 'nook_swiper_assets');


function nook_setup_theme(){
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'nook'),
    ));

    add_theme_support('custom-logo', array(
        'width'  => 120,
        'height' => 26,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'nook_setup_theme');


function nook_customize_register($wp_customize){
    $wp_customize->add_section('nook_header_icons_section', array(
        'title'    => __('Header Icons', 'nook'),
        'priority' => 30,
    ));

    // Dynamic Menu Toggle Icon Settings
    $wp_customize->add_setting('nook_menu_toggle_icon', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'nook_menu_toggle_icon', array(
        'label'    => __('Menu Toggle Icon (PNG/SVG)', 'nook'),
        'section'  => 'nook_header_icons_section',
        'settings' => 'nook_menu_toggle_icon',
    )));

    // Account Icon
    $wp_customize->add_setting('nook_account_icon', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'nook_account_icon', array(
        'label'    => __('Account Icon (PNG/SVG)', 'nook'),
        'section'  => 'nook_header_icons_section',
        'settings' => 'nook_account_icon',
    )));

    // Wishlist Icon
    $wp_customize->add_setting('nook_wishlist_icon', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'nook_wishlist_icon', array(
        'label'    => __('Wishlist Icon (PNG/SVG)', 'nook'),
        'section'  => 'nook_header_icons_section',
        'settings' => 'nook_wishlist_icon',
    )));

    // Cart Icon
    $wp_customize->add_setting('nook_cart_icon', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'nook_cart_icon', array(
        'label'    => __('Cart Icon (PNG/SVG)', 'nook'),
        'section'  => 'nook_header_icons_section',
        'settings' => 'nook_cart_icon',
    )));
}
add_action('customize_register', 'nook_customize_register');



function nook_font_customize_register($wp_customize){
    // 1. Typography Section
    $wp_customize->add_section('nook_typography_section', array(
        'title'    => __('Typography / Fonts', 'nook'),
        'priority' => 31,
    ));

    // Google Font Setting
    $wp_customize->add_setting('nook_google_font', array(
        'default'   => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('nook_google_font', array(
        'label'       => __('Google Font Name', 'nook'),
        'description' => __('Google Font-er nam (Example: Poppins, Inter)', 'nook'),
        'section'     => 'nook_typography_section',
        'type'        => 'text',
    ));

    // Custom Font Family Name
    $wp_customize->add_setting('nook_custom_font_family', array(
        'default'   => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('nook_custom_font_family', array(
        'label'       => __('Custom Font Family Name', 'nook'),
        'description' => __('Custom font file-er jonno ekta nam din (Example: Roslindale)', 'nook'),
        'section'     => 'nook_typography_section',
        'type'        => 'text',
    ));

    // Custom Font - Regular (400)
    $wp_customize->add_setting('nook_font_regular', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'nook_font_regular', array(
        'label'    => __('Regular Font File (400)', 'nook'),
        'section'  => 'nook_typography_section',
        'settings' => 'nook_font_regular',
    )));

    // Custom Font - Medium (500)
    $wp_customize->add_setting('nook_font_medium', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'nook_font_medium', array(
        'label'    => __('Medium Font File (500)', 'nook'),
        'section'  => 'nook_typography_section',
        'settings' => 'nook_font_medium',
    )));

    // Custom Font - Semi-Bold (600)
    $wp_customize->add_setting('nook_font_semibold', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'nook_font_semibold', array(
        'label'    => __('Semi-Bold Font File (600)', 'nook'),
        'section'  => 'nook_typography_section',
        'settings' => 'nook_font_semibold',
    )));

    // Custom Font - Bold (700)
    $wp_customize->add_setting('nook_font_bold', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'nook_font_bold', array(
        'label'    => __('Bold Font File (700)', 'nook'),
        'section'  => 'nook_typography_section',
        'settings' => 'nook_font_bold',
    )));
}
add_action('customize_register', 'nook_font_customize_register');

function nook_apply_dynamic_fonts(){
    $google_font      = get_theme_mod('nook_google_font');
    $custom_font_name = get_theme_mod('nook_custom_font_family');

    $font_files = array(
        '400' => get_theme_mod('nook_font_regular'),
        '500' => get_theme_mod('nook_font_medium'),
        '600' => get_theme_mod('nook_font_semibold'),
        '700' => get_theme_mod('nook_font_bold'),
    );

    $custom_css = "";

    // A. Google Font
    if (!empty($google_font)) {
        $font_formatted = str_replace(' ', '+', trim($google_font));
        $google_font_url = "https://fonts.googleapis.com/css2?family=" . $font_formatted . ":wght@300;400;500;600;700&display=swap";
        wp_enqueue_style('nook-google-fonts', $google_font_url, array(), null);
        $custom_css .= ":root { --nook-font-primary: '" . esc_attr($google_font) . "', sans-serif; }\n";
    }

    // B. Custom Font Files (Multiple Weights)
    if (!empty($custom_font_name)) {
        foreach ($font_files as $weight => $file_url) {
            if (!empty($file_url)) {
                $font_ext = pathinfo($file_url, PATHINFO_EXTENSION);
                $format = 'truetype';
                if ($font_ext === 'woff2') $format = 'woff2';
                elseif ($font_ext === 'woff') $format = 'woff';

                $custom_css .= "
                @font-face {
                    font-family: '" . esc_attr($custom_font_name) . "';
                    src: url('" . esc_url($file_url) . "') format('" . $format . "');
                    font-weight: " . $weight . ";
                    font-style: normal;
                    font-display: swap;
                }
                ";
            }
        }

        $custom_css .= ":root { --nook-font-primary: '" . esc_attr($custom_font_name) . "', sans-serif; }\n";
    }

    if (!empty($custom_css)) {
        wp_add_inline_style('nook-style', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'nook_apply_dynamic_fonts', 20);


function nook_allow_font_uploads($mimes){
    $mimes['woff']  = 'font/woff';
    $mimes['woff2'] = 'font/woff2';
    $mimes['ttf']   = 'application/x-font-ttf';
    return $mimes;
};
add_filter('upload_mimes', 'nook_allow_font_uploads');



function nook_hero_customize_register($wp_customize){
    //hero section
    $wp_customize->add_section('nook_hero_section', array(
        'title' => __('Hero Section', 'nook'),
        'priority' => 32,
    ));

    // Hero background image
    $wp_customize->add_setting('hero_bg_image', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_bg_image', array(
        'label' => 'Hero Background Image',
        'section' => 'nook_hero_section',
        'settings' => 'hero_bg_image'
    )));


    // Hero title
    $wp_customize->add_setting('nook_hero_title', array(
        'default' => "Make your environment minimalistic and futuristic",
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('nook_hero_title', array(
        'label' => __('Hero Title', 'nook'),
        'section' => 'nook_hero_section',
        'type' => 'textarea',
    ));

    //Hero sub-title
    $wp_customize->add_setting('nook_hero_subtitle', array(
        'default' => 'Transform your closets into functional works of art with closet creations’ custom design solutions.',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('nook_hero_subtitle', array(
        'label' => __('Hero Subtitle', 'nook'),
        'section' => 'nook_hero_section',
        'type' => 'textarea',
    ));


    // --- LEFT CARD SETTINGS ---
    $wp_customize->add_setting('hero_left_card_img', array('default'=> '', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_left_card_img', array(
        'label' => __('Left Card Image', 'nook'),
        'section' => 'nook_hero_section',
        'settings' => 'hero_left_card_img',
    )));

    $wp_customize->add_setting('hero_left_card_title', array('default' => 'Minimal Desk', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('hero_left_card_title', array(
        'label' => __('Left Card Title', 'nook'),
        'section' => 'nook_hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_left_card_title_icon', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_left_card_title_icon', array(
        'label' => __('Left Card Play Icon', 'nook'),
        'section' => 'nook_hero_section',
        'settings' => 'hero_left_card_title_icon'
    )));


    // --- CENTER CARD SETTINGS ---
    $wp_customize->add_setting('hero_center_img', array('default'=> '', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_center_img', array(
        'label' => __('Center Main Image', 'nook'),
        'section' => 'nook_hero_section',
        'settings' => 'hero_center_img',
    )));

    $wp_customize->add_setting('hero_center_img_badge', array('default'=> '', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_center_img_badge', array(
        'label' => __('Center Main Image Badge', 'nook'),
        'section' => 'nook_hero_section',
        'settings' => 'hero_center_img_badge',
    )));


    // --- RIGHT CARD SETTINGS ---
    $wp_customize->add_setting('hero_right_card_img', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_right_card_img', array(
        'label' => __('Right Card Image', 'nook'),
        'section' => 'nook_hero_section',
        'settings' => 'hero_right_card_img',
    )));

    $wp_customize->add_setting('hero_right_card_title', array('default' => 'Minimal Desk', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('hero_right_card_title', array(
        'label' => __('Right Card Title', 'nook'),
        'section' => 'nook_hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_right_card_title_icon', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_right_card_title_icon', array(
        'label' => __('Right Card Play Icon', 'nook'),
        'section' => 'nook_hero_section',
        'settings' => 'hero_right_card_title_icon'
    )));
}
add_action('customize_register', 'nook_hero_customize_register');





function nook_marquee_customize_register($wp_customize){
    $wp_customize->add_section('marquee_section', array(
        'title' => __('Marquee Section', 'nook'),
        'priority' => 33,
    ));

    // text field
    $wp_customize->add_setting('marquee_text', array(
        'default' => 'Accent Table | Dining Table | Organic Fabrics | Vintage Couch | Minimalist Chair | Modern Decor',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('marquee_text', array(
        'label' => __('Text List (Separate with | )', 'nook'),
        'description' => __('Use (|) symbol in the middle of every word. This (|) symbol will be auto replaced by your icon'),
        'section' => 'marquee_section',
        'type' => 'textarea',
    ));

    // icon field
    $wp_customize->add_setting('marquee_icon', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'marquee_icon', array(
        'label' => "Marquee Icon",
        'section' => 'marquee_section',
        'settings' => 'marquee_icon'
    )));
}
add_action('customize_register', 'nook_marquee_customize_register');