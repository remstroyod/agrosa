<?php
if ( !defined( 'ABSPATH' ) ) {
  die( '-1' );
}

class WPBakeryShortCode_ts_testimonial_slider extends WPBakeryShortCode {

  protected function content( $atts, $content = null ) {

    extract( shortcode_atts( array(
      'hero_slider' => 0,
    ), $atts ) );


    ob_start();
    $args = array(
      'post_type' => 'testimonial',
    );

    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ):
      while ( $the_query->have_posts() ):
        $the_query->the_post();


    if ( have_rows( 'testimonial' ) ):


      ?>
<div class="carousel-testimonials">
  <div class="swiper-wrapper">
    <?php

    while ( have_rows( 'testimonial' ) ): the_row();
    ?>
    <div class="swiper-slide">
      <div class="testimonial">
        <p>
          <?php the_sub_field( 'testimonial' ); ?>
        </p>
        <figure><img src="<?php the_sub_field( 'testimonial_avatar' ); ?>" alt="Image"></figure>
        <div class="infos">
          <h6>
            <?php the_sub_field( 'testimonial_name' ); ?>
          </h6>
          <small>
          <?php the_sub_field( 'testimonial_subtitle' ); ?>
          </small> </div>
      </div>
    </div>
    <!-- end swiper-slide -->
    <?php
    endwhile;
    ?>
  </div>
  <!-- end swiper-wrapper -->
  <div class="swiper-pagination"></div>
</div>
<?php
endif;


?>
<?php


endwhile;
endif;

return ob_get_clean();
}
}

vc_map( array(
  "base" => "ts_testimonial_slider",
  "name" => __( 'Testimonials Slider', 'ts' ),
  "icon" => THEMEZINHO_CORE_URI . "assets/img/custom.png",
  "content_element" => true,
  "category" => PAGE_BUILDER_GROUP,
  'params' => array(
    array(
      "type" => "dropdown",
      "heading" => __( 'Testimonials Slider', 'ts' ),
      "param_name" => "hero_slider",
      "group" => "General",
      "value" => ts_get_testo_carousel()
    )
  ),
) );
