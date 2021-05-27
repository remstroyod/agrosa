
<div id="post-<?php the_ID(); ?>" <?php post_class( array( 'blog-post' ) ); ?>>
  <?php if( seodo_get_post_thumbnail_url() ) { ?>
  <figure class="post-image"> <img src="<?php echo esc_url( seodo_get_post_thumbnail_url() ); ?>" alt="<?php the_title_attribute(); ?>"> </figure>
  <?php } ?>
  <div class="post-content">
    <div class="post-inner"> <small class="post-date">
     <?php echo get_the_date(); ?>
      </small>
      <h3 class="post-title"><a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
        </a></h3>
      <?php seodo_posted_by(); ?>
    </div>
    <!-- end post-inner --> 
  </div>
  <!-- end post-content --> 
  
</div>
<!-- end blog-post --> 
