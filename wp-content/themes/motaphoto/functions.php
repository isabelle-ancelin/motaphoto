<?php
add_action("wp_enqueue_scripts", "theme_enqueue_styles");

function theme_enqueue_styles() {
    wp_enqueue_style("parent-style", get_template_directory_uri() . "/style.css");
    wp_enqueue_style("child-style", get_stylesheet_directory_uri() . "/style.css", );

    // Charger le css du thème enfant
    wp_enqueue_style("motaphoto-style", get_stylesheet_directory_uri() . "/css/theme.css", array('child-style'));
    wp_enqueue_style("main-menu-style", get_stylesheet_directory_uri() . "/css/main-menu.css", array('child-style'));
    wp_enqueue_style("main-page-style", get_stylesheet_directory_uri() . "/css/main-page.css", array('child-style'));
    wp_enqueue_style("modale-style", get_stylesheet_directory_uri() . "/css/modale.css", array('child-style'));
    wp_enqueue_style("footer-style", get_stylesheet_directory_uri() . "/css/footer.css", array('child-style'));
    wp_enqueue_style("photo-card-style", get_stylesheet_directory_uri() . "/css/photo-card.css", array('child-style'));

    // Charger les polices Space Mono et Poppins
    wp_enqueue_style("space-mono-font", get_stylesheet_directory_uri() . "/fonts/Space-Mono/stylesheet.css", array('child-style'));
    wp_enqueue_style("poppins-font", get_stylesheet_directory_uri() . "/fonts/Poppins/stylesheet.css", array('child-style'));

    // Enqueue du script JavaScript
    wp_enqueue_script('script-js', get_stylesheet_directory_uri() . '/js/script.js', array('jquery'), null, true);

    // Localisation du script
    wp_localize_script('script-js', 'ajax_object', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_ajax_load_more_photos', 'load_more_photos');
add_action('wp_ajax_nopriv_load_more_photos', 'load_more_photos');

function load_more_photos() {
    $paged = isset($_POST['page']) ? $_POST['page'] : 1; // Récupérez la page actuelle depuis la requête AJAX

    $args = array(
        'post_type'      => 'photos',
        'posts_per_page' => 2, // Récupérez tous les posts
        'paged'          => $paged,
    );

    $query = new WP_Query($args);
    $photos = []; // Initialisation d'un tableau pour stocker le HTML des photos

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            // Démarrez le tampon de sortie
            ob_start();
            ?>
            <div class="photo-more-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div>
            <?php
            $photos[] = ob_get_clean(); // Stockez le contenu du tampon de sortie dans le tableau
        endwhile;
    endif;

    wp_reset_postdata();

    // Encodez le tableau de photos en JSON et renvoyez-le
    echo json_encode($photos);

    // Important : Terminez toujours une fonction AJAX par wp_die() pour assurer une réponse correcte
    wp_die();
}

