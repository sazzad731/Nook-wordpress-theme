<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="nook-pt-24px site-header">
        <div class="nook-container nook-flex nook-align-center nook-justify-between header-inner">

            <!-- Left: Logo -->
            <div class="logo">
                <?php
                if (function_exists('get_custom_logo') && has_custom_logo()) {
                    the_custom_logo();
                } else {
                    echo '<a href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a>';
                }
                ?>
            </div>

            <!-- Middle: Dynamic Menu Toggle & Dropdown -->
            <div class="menu-wrapper">
                <button class="menu-toggle" id="menu-toggle-btn" aria-expanded="false" aria-label="Toggle Menu">
                    <?php
                    $menu_icon = get_theme_mod('nook_menu_toggle_icon');
                    if (!empty($menu_icon)) {
                        echo '<img src="' . esc_url($menu_icon) . '" alt="Menu Icon" class=" menu-icon-img">';
                    } else {
                        // Default SVG 3-line hamburger icon matching design
                        echo '<svg width="24" height="18" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 1H24M0 9H24M0 17H24" stroke="currentColor" stroke-width="2"/>
                              </svg>';
                    }
                    ?>
                </button>

                <nav class="main-navigation" id="site-navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary-menu',
                        'container'      => false,
                        'menu_class'     => 'nav-menu',
                        'fallback_cb'    => false,
                    ));
                    ?>
                </nav>
            </div>

            <!-- Right: Action Icons -->
            <div class="nook-flex nook-gap-24px header-icons">
                <a href="<?php echo esc_url(wp_login_url()); ?>" class="icon-user" title="Account">
                    <?php
                    $account_icon = get_theme_mod('nook_account_icon');
                    if (!empty($account_icon)) {
                        echo '<img src="' . esc_url($account_icon) . '" alt="Account" class="header-icon-img">';
                    } else {
                        echo '<span class="dashicons dashicons-admin-users">👤</span>';
                    }
                    ?>
                </a>

                <a href="#" class="icon-wishlist" title="Wishlist">
                    <?php
                    $wishlist_icon = get_theme_mod('nook_wishlist_icon');
                    if (!empty($wishlist_icon)) {
                        echo '<img src="' . esc_url($wishlist_icon) . '" alt="Wishlist" class="header-icon-img">';
                    } else {
                        echo '<span>♡</span>';
                    }
                    ?>
                </a>

                <a href="#" class="icon-cart" title="Cart">
                    <?php
                    $cart_icon = get_theme_mod('nook_cart_icon');
                    if (!empty($cart_icon)) {
                        echo '<img src="' . esc_url($cart_icon) . '" alt="Cart" class="header-icon-img">';
                    } else {
                        echo '<span>🛒</span>';
                    }
                    ?>
                </a>
            </div>

        </div>
    </header>