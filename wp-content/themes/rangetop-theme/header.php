<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>    
<header>
    <div class="header_container container_1200 flex_row">
        <div class="header_star_wire">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header_star_wire.svg" alt="Header Decoration">
        </div>
        <div class="logo">
            <?php
            if (has_custom_logo()) {
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                echo '<a href="' . esc_url(home_url('/')) . '">';
                echo '<img src="' . esc_url($logo[0]) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
                echo '</a>';
            } else {
                echo '<h1><a href="' . esc_url(home_url('/')) . '">' . esc_html(get_bloginfo('name')) . '</a></h1>';
            }
            ?>
        </div>
        <div class="ryt_content_wrapper flex_row">
            <div class="nav_bar_wrapper">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary-menu',
                    'container' => false,
                    'menu_class' => 'flex_row',
                    'fallback_cb' => false,
                ));
                ?>
            </div>
			  <a href="<?php echo esc_url(get_theme_mod('header_button_url', '#')); ?>" class="header_btn white_btn global_btn">
        <?php echo esc_html(get_theme_mod('header_button_text', 'Subscribe')); ?>
    </a>
<!--             <a href="#" class="header_btn white_btn global_btn">Subscribe</a> -->
        </div>
    </div>
    <!-- mobile_header -->
    <div class="mobile_header container_1200">
        <div class="header_star_wire">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header_star_wire.svg" alt="Header Decoration">
        </div>
        <div class="logo">
            <?php
            if (has_custom_logo()) {
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                echo '<a href="' . esc_url(home_url('/')) . '">';
                echo '<img src="' . esc_url($logo[0]) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
                echo '</a>';
            } else {
                echo '<h1><a href="' . esc_url(home_url('/')) . '">' . esc_html(get_bloginfo('name')) . '</a></h1>';
            }
            ?>
        </div>
        <div class="hamburger">
            <img class="hamburger_btn" src="<?php echo get_stylesheet_directory_uri(); ?>/images/hamburger_btn.svg" alt="Menu Button">
        </div>
    </div>
    <!-- menu_off_canvas start -->
    <div class="menu_off_canvas">
        <div class="menu_inner_wrapper flex_column">
            <div class="heading_row flex_row">
                <?php
                if (has_custom_logo()) {
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                    echo '<a href="' . esc_url(home_url('/')) . '">';
                    echo '<img src="' . esc_url($logo[0]) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
                    echo '</a>';
                } else {
                    echo '<h1><a href="' . esc_url(home_url('/')) . '">' . esc_html(get_bloginfo('name')) . '</a></h1>';
                }
                ?>
                <div class="close_btn">
                    <img class="w_auto" src="<?php echo get_stylesheet_directory_uri(); ?>/images/close_x_btn.svg" alt="Close Menu">
                </div>
            </div>
            <div class="lists_stove_protect flex_column">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'mobile-menu',
                    'container' => false,
                    'items_wrap' => '<ul>%3$s</ul>',
                ));
                ?>
            </div>
        </div>
    </div>
    <!-- overlay -->
    <div class="overlay"></div>
</header>
