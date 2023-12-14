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
                <p> Cette photo vous interesse ?</p>
                <button class="photo-contact-btn">contact</button>
                <div class="photo-navigation flexrow">
                    <div class="photo-navigation-prev">
                        <a rel="prev" href="https://nathalie-mota.stephane-mouron.fr/photo/fin-de-match-au-stade-monumental-au-perou/" title="Fin de match" class="previous_post">
                            <div>
                                <img width="60" height="60" src="https://nathalie-mota.stephane-mouron.fr/wp-content/uploads/2023/05/nathalie-10-150x150.jpeg" class="attachment-77x60 size-77x60 wp-post-image" alt="Photo fin de match au Pérou" decoding="async">
                            </div>
                            <img src="https://nathalie-mota.stephane-mouron.fr/wp-content/themes/nathalie-mota/assets/img/precedent.png" alt="Photo précédente">
                        </a>
                    </div>
                    <div class="photo-navigation-next">
                        <!-- next_post_link( '%link', '%title', false );  -->
                        <a rel="next" href="https://nathalie-mota.stephane-mouron.fr/photo/lamour-sans-fin/" title="L'amour sans fin" class="next_post">
                            <div><img width="60" height="60" src="https://nathalie-mota.stephane-mouron.fr/wp-content/uploads/2023/05/nathalie-14-150x150.jpeg" class="attachment-77x60 size-77x60 wp-post-image" alt="Photo mariage de Vadim Paripa" decoding="async"></div>
                            <img src="https://nathalie-mota.stephane-mouron.fr/wp-content/themes/nathalie-mota/assets/img/suivant.png" alt="Photo suivante">
                        </a>
                    </div>
                </div>
            </div><!-- .entry-content -->

            <footer class="entry-footer default-max-width">
                <?php the_category(); ?>
            </footer><!-- .entry-footer -->

        </article>

    <?php endwhile; ?>

</main><!-- #main -->
<?

?>



<?php get_footer(); ?>