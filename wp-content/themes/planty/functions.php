<?php
// Action qui permet de charger des scripts dans notre thème
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles(){
    // Chargement du style.css du thème parent blankslate
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
}
function masquer_element_admin_non_connecte($items, $args) {
    if ($args->theme_location == 'primary') {
        if (is_user_logged_in ()) {
            $items .= '<li id="menu-item-1134" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-1130 current_page_item menu-item-1134"><a class="menu-link" href="http://localhost:8888/Planty/wp-admin/index.php" aria-current="page">Admin</a></li>';
        }
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'masquer_element_admin_non_connecte', 10, 2);
