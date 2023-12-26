<?php
/*
Template Name: Photos
*/
?>
<?php get_header(); ?>
<main id="photo-container" class="photo-container">

    <?php
    while (have_posts()) :
        the_post();
    ?>
        <article id="photo-post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="photo-card">

                <div class="photo-details">
                    <h2 class="photo-title"><?php the_title(); ?></h2>
                    <?php
                    $reference = get_field('reference_de_la_photo');
                    if ($reference) {
                        echo '<p class="photo-reference">Référence : ' . esc_html($reference) . '</p>';
                    }
                    $categories = get_the_terms(get_the_ID(), 'categorie');
                    if (!empty($categories)) {
                        echo '<p class="photo-category">Catégorie : ' . esc_html($categories[0]->name) . '</p>';
                    }
                    $formats = get_the_terms(get_the_ID(), 'format');
                    if (!empty($formats)) {
                        echo '<p class="photo-format">Format : ' . esc_html($formats[0]->name) . '</p>';
                    }
                    $type = get_field('type_de_photo');
                    if ($type) {
                        echo '<p class="photo-type">Type : ' . esc_html($type) . '</p>';
                    }
                    $year = get_the_date('Y');
                    echo '<p class="photo-year">Année : ' . esc_html($year) . '</p>';
                    ?>
                </div>

                <figure class="photo-thumbnail">
                    <?php the_post_thumbnail('middle'); ?>
                </figure>
            </div>


            <div class="photo-contact-section">
                <div class="photo-contact">
                    <p> Cette photo vous interesse ?</p>
                    <button class="photo-contact-button" id="photo-contact-button" type="button">
                        <a href="#" class="photo-contact-link">Contact</a>
                    </button>
                </div>
                <div class="photo-navigation flexrow">
                    <div class="photo-navigation-prev">
                        <?php
                        $prev_post = get_previous_post();
                        if (!empty($prev_post)) : ?>
                            <a rel="prev" href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" title="<?php echo esc_attr(get_the_title($prev_post->ID)); ?>" class="previous_post">
                                <?php echo get_the_post_thumbnail($prev_post->ID, 'thumbnail', array('class' => 'photo-nav-thumbnail')); ?>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/pictures/previous-arrow.png" alt="Photo précédente">
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="photo-navigation-next">
                        <?php
                        $next_post = get_next_post();
                        if (!empty($next_post)) : ?>
                            <a rel="next" href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" title="<?php echo esc_attr(get_the_title($next_post->ID)); ?>" class="next_post">
                                <?php echo get_the_post_thumbnail($next_post->ID, 'thumbnail', array('class' => 'photo-nav-thumbnail')); ?>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/pictures/next-arrow.png" alt="Photo suivante">
                            </a>
                        <?php endif; ?>
                    </div>

                </div>


            </div>

            <div class="photo-more-main">

                <div class="photo-more">
                    <h3>Vous aimerez aussi</h3>
                    <div class="photo-more-thumbnails">
                        <?php
                        $loop = new WP_Query(array('post_type' => 'photos', 'posts_per_page' => 2));
                        while ($loop->have_posts()) : $loop->the_post();
                            // Ici, ajoutez le code pour afficher chaque post. Par exemple :
                            echo '<div class="photo-more-thumbnail-div">';
                            the_post_thumbnail('large', array('class' => 'photo-more-thumbnail'));
                            echo '</div>';

                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>


                </div>
                <button class="photo-more-button" id="load-more-btn">Charger plus</button>

            </div>


            <footer class="entry-footer default-max-width">
                <?php the_category(); ?>
            </footer><!-- .entry-footer -->

        </article>

    <?php endwhile; ?>

</main><!-- #main -->

<?php get_footer(); ?>