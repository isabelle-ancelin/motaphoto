<?php
/* 
* Template Name: accueil
*/
get_header();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="main-title">
  <h1 class="main-title-title">Photographe Event</h1>
</div>

<div class="main-photos hide-title" id="photo-container">
  <?php
  $loop = new WP_Query(array('post_type' => 'photos', 'posts_per_page' => 8, 'paged' => $paged));

  while ($loop->have_posts()) : $loop->the_post();
  ?>

    <div class="entry-content">
      <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">
        <img src="<?php echo get_the_post_thumbnail_url($loop->ID, 'large'); ?>" />
      </a>

      <?php the_content(); ?>
    </div>

    <?php the_terms($post->ID, 'genre', 'Genre : '); ?>

  <?php endwhile; ?>

</div>

<div class="load-more-container">
  <button id="load-more-btn">Charger plus</button>
</div>

<?php if ($paged > 1): ?>
  <?php endif; ?>

	
</article><!-- #post-<?php the_ID(); ?> -->
<?php get_footer(); ?>