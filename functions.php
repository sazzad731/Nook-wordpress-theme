<?php
function nook_enqueue_styles()
{
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
function nook_swiper_assets()
{
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0');

    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);
}
add_action('wp_enqueue_scripts', 'nook_swiper_assets');


function nook_setup_theme()
{
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


function nook_customize_register($wp_customize)
{
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



function nook_font_customize_register($wp_customize)
{
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

function nook_apply_dynamic_fonts()
{
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


function nook_allow_font_uploads($mimes)
{
    $mimes['woff']  = 'font/woff';
    $mimes['woff2'] = 'font/woff2';
    $mimes['ttf']   = 'application/x-font-ttf';
    return $mimes;
};
add_filter('upload_mimes', 'nook_allow_font_uploads');



function nook_hero_customize_register($wp_customize)
{
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
    $wp_customize->add_setting('hero_left_card_img', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
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
    $wp_customize->add_setting('hero_center_img', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_center_img', array(
        'label' => __('Center Main Image', 'nook'),
        'section' => 'nook_hero_section',
        'settings' => 'hero_center_img',
    )));

    $wp_customize->add_setting('hero_center_img_badge', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
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





function nook_marquee_customize_register($wp_customize)
{
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







function nook_slider_customize_register($wp_customize)
{
    if (! class_exists('WP_Customize_Control')) return;

    class Nook_Slider_Repeater_Control extends WP_Customize_Control
    {
        public $type = 'nook_slider_repeater';

        public function enqueue()
        {
            // Needed media library script for image upload
            wp_enqueue_media();
        }

        public function render_content()
        {
            $values = json_decode($this->value(), true);
            if (! is_array($values)) {
                $values = array();
            }
?>
            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
            </label>

            <div class="nook-repeater-container">
                <div class="nook-repeater-items">
                    <?php
                    if (! empty($values)) {
                        foreach ($values as $index => $item) {
                            $img_url = isset($item['image']) ? $item['image'] : '';
                            $title   = isset($item['title']) ? $item['title'] : '';
                    ?>
                            <div class="nook-repeater-item" style="background: #fff; border: 1px solid #ccc; padding: 12px; margin-bottom: 10px; border-radius: 4px;">
                                <div style="margin-bottom: 8px;">
                                    <label><strong>Slide Image</strong></label>
                                    <input type="hidden" class="nook-slide-img-url" value="<?php echo esc_attr($img_url); ?>">
                                    <div class="nook-img-preview" style="margin: 5px 0;">
                                        <?php if ($img_url): ?>
                                            <img src="<?php echo esc_url($img_url); ?>" style="max-width: 100px; height: auto; display: block; border-radius: 4px;">
                                        <?php endif; ?>
                                    </div>
                                    <button type="button" class="button nook-upload-img-btn"><?php echo $img_url ? 'Change Image' : 'Upload Image'; ?></button>
                                </div>
                                <div style="margin-bottom: 8px;">
                                    <label><strong>Slide Title</strong></label>
                                    <input type="text" class="nook-slide-title-input" value="<?php echo esc_attr($title); ?>" style="width: 100%;">
                                </div>
                                <button type="button" class="button button-link-delete nook-remove-item" style="color: red;">Remove Slide</button>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>

                <!-- Add Slide Button -->
                <button type="button" class="button button-primary" id="nook-add-slide-btn">+ Add Slide</button>
                <input type="hidden" id="<?php echo esc_attr($this->id); ?>" name="<?php echo esc_attr($this->id); ?>" value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?>>
            </div>

            <!-- JavaScript for Customizer Media Upload & Repeat Logic -->
            <script>
                jQuery(document).ready(function($) {
                    function updateRepeaterValue() {
                        var slides = [];
                        $('.nook-repeater-item').each(function() {
                            var img = $(this).find('.nook-slide-img-url').val();
                            var title = $(this).find('.nook-slide-title-input').val();
                            if (img || title) {
                                slides.push({
                                    image: img,
                                    title: title
                                });
                            }
                        });
                        $('#<?php echo esc_attr($this->id); ?>').val(JSON.stringify(slides)).trigger('change');
                    }

                    // Add Slide Click
                    $('#nook-add-slide-btn').on('click', function() {
                        var newItem = `
                        <div class="nook-repeater-item" style="background: #fff; border: 1px solid #ccc; padding: 12px; margin-bottom: 10px; border-radius: 4px;">
                            <div style="margin-bottom: 8px;">
                                <label><strong>Slide Image</strong></label>
                                <input type="hidden" class="nook-slide-img-url" value="">
                                <div class="nook-img-preview" style="margin: 5px 0;"></div>
                                <button type="button" class="button nook-upload-img-btn">Upload Image</button>
                            </div>
                            <div style="margin-bottom: 8px;">
                                <label><strong>Slide Title</strong></label>
                                <input type="text" class="nook-slide-title-input" value="" style="width: 100%;">
                            </div>
                            <button type="button" class="button button-link-delete nook-remove-item" style="color: red;">Remove Slide</button>
                        </div>`;
                        $('.nook-repeater-items').append(newItem);
                        updateRepeaterValue();
                    });

                    // Remove Slide
                    $(document).on('click', '.nook-remove-item', function() {
                        $(this).closest('.nook-repeater-item').remove();
                        updateRepeaterValue();
                    });

                    // Title Input Change
                    $(document).on('keyup change', '.nook-slide-title-input', function() {
                        updateRepeaterValue();
                    });

                    // Media Frame Image Upload
                    $(document).on('click', '.nook-upload-img-btn', function(e) {
                        e.preventDefault();
                        var button = $(this);
                        var item = button.closest('.nook-repeater-item');

                        var frame = wp.media({
                            title: 'Select Slide Image',
                            button: {
                                text: 'Use this image'
                            },
                            multiple: false
                        });

                        frame.on('select', function() {
                            var attachment = frame.state().get('selection').first().toJSON();
                            item.find('.nook-slide-img-url').val(attachment.url);
                            item.find('.nook-img-preview').html('<img src="' + attachment.url + '" style="max-width: 100px; height: auto; display: block; border-radius: 4px;">');
                            button.text('Change Image');
                            updateRepeaterValue();
                        });

                        frame.open();
                    });
                });
            </script>
        <?php
        }
    }


    $wp_customize->add_section('slider_section', array(
        'title'    => __('Slider Section', 'nook'),
        'priority' => 34,
    ));


    $wp_customize->add_setting('nook_slides_repeater_data', array(
        'default'           => '[]',
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Nook_Slider_Repeater_Control($wp_customize, 'nook_slides_repeater_data', array(
        'label'       => __('Category Slides', 'nook'),
        'description' => __('"Add Slide" button-e click kore ekaadhik slide add korun.', 'nook'),
        'section'     => 'slider_section',
    )));
}
add_action('customize_register', 'nook_slider_customize_register');






// 1. Popular Collection Repeater Custom Control
if (class_exists('WP_Customize_Control')) {
    class Nook_Popular_Repeater_Control extends WP_Customize_Control
    {
        public $type = 'nook_popular_repeater';

        public function enqueue()
        {
            wp_enqueue_media();
        }

        public function render_content()
        {
            $values = json_decode($this->value(), true);
            if (! is_array($values)) {
                $values = array();
            }
        ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
            </label>

            <div class="nook-popular-repeater-container">
                <div class="nook-popular-items">
                    <?php
                    if (! empty($values)) {
                        foreach ($values as $item) {
                            $img   = isset($item['image']) ? $item['image'] : '';
                            $title = isset($item['title']) ? $item['title'] : '';
                            $price = isset($item['price']) ? $item['price'] : '';
                            $cat   = isset($item['category']) ? $item['category'] : 'sofa';
                    ?>
                            <div class="nook-popular-item" style="background: #fff; border: 1px solid #ccc; padding: 12px; margin-bottom: 10px; border-radius: 4px;">
                                <div style="margin-bottom: 8px;">
                                    <label><strong>Product Image</strong></label>
                                    <input type="hidden" class="pop-img-url" value="<?php echo esc_attr($img); ?>">
                                    <div class="pop-img-preview" style="margin: 5px 0;">
                                        <?php if ($img): ?>
                                            <img src="<?php echo esc_url($img); ?>" style="max-width: 80px; height: auto; display: block; border-radius: 4px;">
                                        <?php endif; ?>
                                    </div>
                                    <button type="button" class="button pop-upload-btn"><?php echo $img ? 'Change Image' : 'Upload Image'; ?></button>
                                </div>
                                <div style="margin-bottom: 8px;">
                                    <label><strong>Product Title</strong></label>
                                    <input type="text" class="pop-title-input" value="<?php echo esc_attr($title); ?>" style="width: 100%;">
                                </div>
                                <div style="margin-bottom: 8px;">
                                    <label><strong>Product Price</strong></label>
                                    <input type="text" class="pop-price-input" value="<?php echo esc_attr($price); ?>" style="width: 100%;">
                                </div>
                                <div style="margin-bottom: 8px;">
                                    <label><strong>Category Slug (sofa, chair, table, accessories)</strong></label>
                                    <input type="text" class="pop-cat-input" value="<?php echo esc_attr($cat); ?>" style="width: 100%;">
                                </div>
                                <button type="button" class="button button-link-delete pop-remove-item" style="color: red;">Remove Product</button>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>

                <button type="button" class="button button-primary" id="nook-add-popular-btn">+ Add Product</button>
                <input type="hidden" id="<?php echo esc_attr($this->id); ?>" name="<?php echo esc_attr($this->id); ?>" value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?>>
            </div>

            <script>
                jQuery(document).ready(function($) {
                    function updatePopValue() {
                        var products = [];
                        $('.nook-popular-item').each(function() {
                            var img = $(this).find('.pop-img-url').val();
                            var title = $(this).find('.pop-title-input').val();
                            var price = $(this).find('.pop-price-input').val();
                            var cat = $(this).find('.pop-cat-input').val();
                            if (img || title) {
                                products.push({
                                    image: img,
                                    title: title,
                                    price: price,
                                    category: cat
                                });
                            }
                        });
                        $('#<?php echo esc_attr($this->id); ?>').val(JSON.stringify(products)).trigger('change');
                    }

                    $('#nook-add-popular-btn').on('click', function() {
                        var newItem = `
                        <div class="nook-popular-item" style="background: #fff; border: 1px solid #ccc; padding: 12px; margin-bottom: 10px; border-radius: 4px;">
                            <div style="margin-bottom: 8px;">
                                <label><strong>Product Image</strong></label>
                                <input type="hidden" class="pop-img-url" value="">
                                <div class="pop-img-preview" style="margin: 5px 0;"></div>
                                <button type="button" class="button pop-upload-btn">Upload Image</button>
                            </div>
                            <div style="margin-bottom: 8px;">
                                <label><strong>Product Title</strong></label>
                                <input type="text" class="pop-title-input" value="" style="width: 100%;">
                            </div>
                            <div style="margin-bottom: 8px;">
                                <label><strong>Product Price</strong></label>
                                <input type="text" class="pop-price-input" value="" style="width: 100%;">
                            </div>
                            <div style="margin-bottom: 8px;">
                                <label><strong>Category Slug (sofa, chair, table, accessories)</strong></label>
                                <input type="text" class="pop-cat-input" value="sofa" style="width: 100%;">
                            </div>
                            <button type="button" class="button button-link-delete pop-remove-item" style="color: red;">Remove Product</button>
                        </div>`;
                        $('.nook-popular-items').append(newItem);
                        updatePopValue();
                    });

                    $(document).on('click', '.pop-remove-item', function() {
                        $(this).closest('.nook-popular-item').remove();
                        updatePopValue();
                    });

                    $(document).on('keyup change', '.pop-title-input, .pop-price-input, .pop-cat-input', function() {
                        updatePopValue();
                    });

                    $(document).on('click', '.pop-upload-btn', function(e) {
                        e.preventDefault();
                        var button = $(this);
                        var item = button.closest('.nook-popular-item');

                        var frame = wp.media({
                            title: 'Select Product Image',
                            button: {
                                text: 'Use this image'
                            },
                            multiple: false
                        });

                        frame.on('select', function() {
                            var attachment = frame.state().get('selection').first().toJSON();
                            item.find('.pop-img-url').val(attachment.url);
                            item.find('.pop-img-preview').html('<img src="' + attachment.url + '" style="max-width: 80px; height: auto; display: block; border-radius: 4px;">');
                            button.text('Change Image');
                            updatePopValue();
                        });

                        frame.open();
                    });
                });
            </script>
<?php
        }
    }
}

// 2. Register Customizer Section and Settings
function nook_popular_customize_register($wp_customize)
{
    $wp_customize->add_section('nook_popular_section', array(
        'title'    => __('Popular Collection Section', 'nook'),
        'priority' => 35,
    ));

    $wp_customize->add_setting('nook_popular_title', array(
        'default'           => 'Popular Collection',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('nook_popular_title', array(
        'label'   => __('Section Title', 'nook'),
        'section' => 'nook_popular_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('nook_popular_products_data', array(
        'default'           => '[]',
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Nook_Popular_Repeater_Control($wp_customize, 'nook_popular_products_data', array(
        'label'       => __('Popular Products', 'nook'),
        'description' => __('Add products with image, title, price and category.', 'nook'),
        'section'     => 'nook_popular_section',
    )));
}
add_action('customize_register', 'nook_popular_customize_register');
