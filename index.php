<?php get_header(); ?>


<main class="site-main">
    <!-- 1. Hero Section -->
    <section class="hero-section" style="background-image: url(<?php echo esc_url(get_theme_mod('hero_bg_image')); ?>);">
        <div class="nook-container">
            <div class="nook-mb-20px hero-content">
                <?php
                $hero_title = get_theme_mod('nook_hero_title', 'Make your environment minimalist and futuristic');
                $hero_subtitle = get_theme_mod('nook_hero_subtitle', 'Your unique space deserves the best minimalist and futuristic touch.');

                // Left Card Data
                $left_img = get_theme_mod('hero_left_card_img');
                $left_title = get_theme_mod('hero_left_card_title');
                $left_icon = get_theme_mod('hero_left_card_title_icon');

                //Center image data
                $center_img = get_theme_mod('hero_center_img');
                $center_img_badge = get_theme_mod('hero_center_img_badge');

                // Right Card Data
                $right_card_img = get_theme_mod('hero_right_card_img');
                $right_card_title = get_theme_mod('hero_right_card_title');
                $right_card_title_icon = get_theme_mod('hero_right_card_title_icon');
                ?>
                <h1 class="nook-font-ros nook-font-500 nook-text-center nook-font-64px nook-line-130 nook-mb-40px hero-h1"><?php echo esc_html($hero_title); ?></h1>
                <p class="nook-font-inter nook-font-400 nook-font-18px nook-line-120 nook-color-muted nook-text-center hero-subtitle"><?php echo esc_html($hero_subtitle); ?></p>
            </div>


            <div class="nook-flex-between nook-gap-16px hero-images">
                <!-- left card -->
                <div class="nook-overflow-hidden hero-left-card">
                    <img class="nook-width-100 nook-mb-20px" src="<?php echo esc_url($left_img); ?>" alt="<?php echo esc_attr($left_title); ?>">
                    <div class="nook-flex nook-justify-between nook-gap-24px">
                        <p class="nook-font-400 nook-font-20px nook-line-29px hero-left-card-title"><?php echo esc_html($left_title) ?></p>
                        <img class="hero-play-icon" src="<?php echo esc_url($left_icon); ?>" alt="play icon">
                    </div>
                </div>

                <!-- middle image -->
                <div class="hero-center-img-container">
                    <img class="nook-margin-0px-auto center-img-badge" src="<?php echo esc_url($center_img_badge); ?>" alt="seal">
                    <img class="nook-width-100" src="<?php echo esc_url($center_img) ?>" alt="Furniture image">
                </div>

                <!-- right card -->
                <div class="nook-overflow-hidden hero-right-card">
                    <img class="nook-width-100 nook-mb-20px" src="<?php echo esc_url($right_card_img); ?>" alt="<?php echo esc_attr($right_card_title) ?>">
                    <div class="nook-flex nook-justify-between">
                        <p class="nook-font-400 nook-font-24px nook-line-32px right-card-title"><?php echo esc_html($right_card_title); ?></p>
                        <img class="hero-play-icon" src="<?php echo esc_url($right_card_title_icon); ?>" alt="music play icon">
                    </div>
                </div>
            </div>
    </section>

    <!-- Marquee section -->
    <section class="nook-mb-100px nook-marquee-section">
        <div class="marquee-track">
            <?php
            $brand_string = get_theme_mod('marquee_text', 'Accent Table | Dining Table | Organic Fabrics | Vinbrande Couch | Minimalist Chair | Modern Decor');
            $star_icon = get_theme_mod('marquee_icon');
            $brand_array = explode('|', $brand_string);

            for ($i = 0; $i < 3; $i++) {
                echo '<div class="marquee-group">';
                foreach ($brand_array as $brand) {
                    $trimmed_brand = trim($brand);
                    if (!empty($trimmed_brand)) {
                        echo '<span class="nook-font-ros nook-font-500 nook-font-22px nook-line-20px marquee-item">' . esc_html($trimmed_brand) . '</span>';
                        echo '<img src="' . esc_url($star_icon) . '" alt="' . esc_html($trimmed_brand) . '" class="marquee-icon">';
                    }
                }
                echo '</div>';
            }
            ?>
        </div>
    </section>
</main>


<?php get_footer(); ?>