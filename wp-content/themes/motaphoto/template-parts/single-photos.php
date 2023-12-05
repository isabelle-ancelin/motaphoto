<?php
/*
Template Name: Photos
*/

get_header(); ?>

<div class="main-title" >
  <h1 class="main-title-title">photographe event</h1>
</div>

<div class="main-photos hide-title" >
<?php $loop = new WP_Query( array( 'post_type' => 'photos', 'posts_per_page' => 8, 'paged' => $paged) ); ?>

<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

<div class="entry-content">
  <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">
  <img src="<?php echo get_the_post_thumbnail_url( $loop->ID, 'large' ); ?>" />
  </a>
  <?php the_content() ; ?>
</div>

<?php the_terms( $post->ID, 'genre', 'Genre : ' ); ?>

<?php endwhile ; ?>

</div>

<?php get_footer() ; ?>
