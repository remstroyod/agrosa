<?php
$footer_bg_color = seodo_get_option( 'footer_bg_color' ) ? seodo_get_option( 'footer_bg_color' ) : '#009a4e';
$footer_bg_image = seodo_get_option( 'footer_bg_image' ) ? seodo_get_option( 'footer_bg_image' ) : '';
$footer_style = 'background-color: ' . $footer_bg_color;
$copyright = seodo_get_option( 'footer_copyright_text' );
$site_credit = seodo_get_option( 'footer_site_credit' );


if ( !$copyright ) {
  $copyright = esc_html__( '&copy; 2020 Seodo | Agriculture Farming Foundation', 'seodo' );
}

if ( !$site_credit ) {
  $site_credit =
    wp_specialchars_decode( esc_html( 'Site created by <a href=#>Themezinho</a>', 'seodo' ) );
}


$footer_bg = ( $footer_bg_image != '' ) ? 'data-background="' . esc_url( $footer_bg_image ) . '"': '';
?>
<footer class="footer" <?php echo esc_attr( $footer_bg ); ?> style="<?php echo esc_attr( $footer_style ); ?>">
  <div class="container">
    <div class="row">
      <?php if( is_active_sidebar( 'footer-widget-1' ) || is_active_sidebar( 'footer-widget-2' ) || is_active_sidebar( 'footer-widget-3' ) || is_active_sidebar( 'footer-widget-4' ) ) { ?>
      <?php if( is_active_sidebar( 'footer-widget-1' ) ) : ?>
      <div class="col-lg-4">
        <?php dynamic_sidebar( 'footer-widget-1' ); ?>
      </div>
      <?php endif; ?>
      <?php if( is_active_sidebar( 'footer-widget-2' ) ) : ?>
      <div class="col-lg-8">
        <?php dynamic_sidebar( 'footer-widget-2' ); ?>
      </div>
      <?php endif; ?>
      <?php if( is_active_sidebar( 'footer-widget-3' ) ) : ?>
      <div class="col-md-4">
        <?php dynamic_sidebar( 'footer-widget-3' ); ?>
      </div>
      <?php endif; ?>
      <?php if( is_active_sidebar( 'footer-widget-4' ) ) : ?>
      <div class="col-md-4">
        <?php dynamic_sidebar( 'footer-widget-4' ); ?>
      </div>
      <?php endif; ?>
      <?php if( is_active_sidebar( 'footer-widget-5' ) ) : ?>
      <div class="col-md-4">
        <?php dynamic_sidebar( 'footer-widget-5' ); ?>
      </div>
      <?php endif; ?>
      <?php } ?>
      <div class="col-12">
        <?php if( $copyright ) { ?>
        <div class="footer-bottom"> 
			<span><?php echo esc_html( $copyright ); ?></span> 
			<span> <?php echo wp_specialchars_decode( esc_html( $site_credit ) ); ?> </span> 
		  </div>
        <!-- end footer-bottom -->
        <?php } ?>
      </div>
      <!-- end col-12 --> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</footer>
<?php wp_footer(); ?>
</body></html>