<?php add_action("wp_enqueue_scripts", "theme_enqueue_styles");

function theme_enqueue_styles()
{
    wp_enqueue_style("parent-style", get_template_directory_uri() . "/style.css");
    wp_enqueue_style("child-style", get_stylesheet_directory_uri() . "/style.css");
    wp_enqueue_style("motaphoto-style", get_stylesheet_directory_uri() . "/css/theme.css");

    // Charger les polices Space Mono et Poppins
    wp_enqueue_style("space-mono-font", get_stylesheet_directory_uri() . "/fonts/Space-Mono/stylesheet.css", array(), );
    wp_enqueue_style("poppins-font", get_stylesheet_directory_uri() . "/fonts/Poppins/stylesheet.css", array(), );

    wp_enqueue_script("script-js", get_stylesheet_directory_uri() . "/js/script.js");
}

