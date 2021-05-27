<?php get_header(); ?>
<?php seodo_render_page_header( 'work' ); ?>
<main>
  <?php
  while ( have_posts() ):
    the_post();
  ?>
  <?php the_content(); ?>
  <?php endwhile; ?>
</main>
<?php get_footer(); ?>
