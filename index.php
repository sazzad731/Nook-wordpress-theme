<?php get_header(); ?>


<main class="site-main">
    <!-- 1. Hero Section -->
    <section class="hero-section">
        <div class="nook-container">
            <div class="hero-content">
                <?php
                $hero_title = get_theme_mod('nook_hero_title', 'Make your environment minimalist and futuristic');
                $hero_subtitle = get_theme_mod('nook_hero_subtitle', 'Your unique space deserves the best minimalist and futuristic touch.');
                ?>
                <h1><?php echo esc_html($hero_title); ?></h1>
                <p><?php echo esc_html($hero_subtitle); ?></p>
            </div>


            <div class="hero-images-grid">
                
            </div>
        </div>
    </section>
</main>


<?php get_footer(); ?>