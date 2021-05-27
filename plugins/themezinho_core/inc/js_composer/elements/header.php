<?php
if ( !defined( 'ABSPATH' ) ) {
  die( '-1' );
}

class WPBakeryShortCode_ts_hero_slider extends WPBakeryShortCode {

  protected function content( $atts, $content = null ) {

    extract( shortcode_atts( array(
      'hero_slider' => 0,
    ), $atts ) );

    //		 if( !is_int( $hero_slider ) ) {
    //		 	return;
    //		 }
    ob_start();
    $args = array(
      'post_type' => 'hero',
      'post__in' => array( $hero_slider )
    );

    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ):
      while ( $the_query->have_posts() ):
        $the_query->the_post();

    $hero_type = get_field( 'type' );


    if ( $hero_type === 'swiper' ):

    if ( have_rows( 'slider' ) ):


	  $pagination = ( get_field( 'disable_pagination' ) ) ? false : true;
	  $navigation = ( get_field( 'disable_navigation' ) ) ? false : true;
	  $slider_parallax = get_field( 'slider_parallax_image' );
	  $slides = count( get_field( 'slider' ) );

    

    ?>
<header class="header">
  <div class="main-slider">
    <div class="swiper-wrapper">
      <?php

      while ( have_rows( 'slider' ) ): the_row();
      $background_image = get_sub_field( 'background_image' );
      ?>
      <div class="swiper-slide">
        <div class="slide-image" data-background="<?php echo esc_url( $background_image ); ?>"></div>
        <!-- end slider-image -->
        <div class="slide-inner">
          <h1>
            <?php the_sub_field( 'title' ); ?>
          </h1>
          <p>
            <?php the_sub_field( 'description' ); ?>
          </p>
          <?php
          if ( $button_link = get_sub_field( 'button_link' ) ) {
            $button_label = get_sub_field( 'button_label' );
            ?>
          <a href="<?php echo esc_url( $button_link ); ?>"> <?php echo esc_html( $button_label ); ?></a>
          <?php } ?>
        </div>
        <!-- end slide-inner --> 
      </div>
      <!-- end swiper-slide -->
      <?php
      endwhile;
      ?>
    </div>
    <!-- end swiper-wrapper -->
    <div class="button-prev"><i class="lni lni-chevron-left"></i></div>
    <!-- end button-prev -->
    <div class="button-next"><i class="lni lni-chevron-right"></i></div>
    <!-- end button-next -->
    <div class="swiper-pagination"></div>
    <!-- end swiper-pagination -->
	  
   
    <?php if( $slider_parallax != '' ) { ?>
     <div class="parallax-element" data-stellar-ratio="2" data-background="<?php echo esc_url( $slider_parallax ); ?>"></div>
    <!-- end parallax-element -->
    <?php } ?>
  </div>
  <!-- end main-slider --> 
  
</header>
<?php
endif;


elseif ( $hero_type === 'video' ):
  ?>
<header class="header">
  <div class="video-bg">
    <video src="" muted loop autoplay></video>
  </div>
  <!-- end video-bg -->
  <div class="container">
    <div class="inner">
      <?php if( get_field( 'video_bg_tagline' ) ) { ?>
      <div class="tagline"><span></span>
        <h6>
          <?php the_field( 'video_bg_tagline' ); ?>
        </h6>
      </div>
      <?php } ?>
      <h1>
        <?php the_field( 'video_bg_title' ); ?>
      </h1>
      <?php if( get_field( 'video_bg_button_link' ) ){ ?>
      <a href="<?php echo esc_url( get_field( 'video_bg_button_link' ) ); ?>" title="<?php echo esc_attr( get_field( 'video_bg_button_label' ) ); ?>"> <?php echo esc_html( get_field( 'video_bg_button_label' ) ); ?> </a>
      <?php } ?>
    </div>
  </div>
</header>
<?php

endif;

endwhile;
endif;

return ob_get_clean();
}
}

vc_map( array(
  "base" => "ts_hero_slider",
  "name" => __( 'Hero Slider', 'ts' ),
  "icon" => THEMEZINHO_CORE_URI . "assets/img/custom.png",
  "content_element" => true,
  "category" => PAGE_BUILDER_GROUP,
  'params' => array(
    array(
      "type" => "dropdown",
      "heading" => __( 'Hero Slider', 'ts' ),
      "param_name" => "hero_slider",
      "group" => "General",
      "description" => __( 'Before add slider please create slides from HEADER menu', 'ts' ),
      "value" => ts_get_hero_slider()
    )
  ),
) );
