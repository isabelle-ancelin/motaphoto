<?php
/*
Template Name: Photo-block
*/

get_header(); ?>

<main id="main" class="site-main">

  <?php
  
  while (have_posts()) :
    the_post();
  ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <header class="entry-header alignwide">
        <h1 class="entry-title"><?php the_title(); ?></h1>

        <figure class="post-thumbnail">
          <?php the_post_thumbnail('full'); ?>
        </figure><!-- .post-thumbnail -->

      </header><!-- .entry-header -->

      <div class="entry-content">
        <?php the_content(); ?>
      </div><!-- .entry-content -->

      <footer class="entry-footer default-max-width">
        <?php the_category(); ?>
      </footer><!-- .entry-footer -->

    </article>

  <?php endwhile; ?>

</main><!-- #main -->

<?php get_footer(); ?>


