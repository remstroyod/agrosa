<?php
if ( !defined( 'ABSPATH' ) ) {
  die( '-1' );
}

class WPBakeryShortCode_ts_expert_box extends WPBakeryShortCode {


  protected function content( $atts, $content = null ) {

    extract( shortcode_atts( array(
      'title' => '',
      'details' => '',
      'image' => '',
      'animate_block' => 'false',
      'animation_type' => 'fadeIn',
      'animation_delay' => '',
    ), $atts ) );


    ob_start();


    $wrapper_class = array();

    if ( $animate_block == 'yes' ) {
      $wrapper_class[] = 'wow';
      $wrapper_class[] = $animation_type;
    }

    $wrapper_class = implode( ' ', $wrapper_class );


    $images = wp_get_attachment_image_src( $image, '' );
    $details = vc_param_group_parse_atts( $atts[ 'details' ] );
    ?>
<div class="experts-box <?php echo esc_attr( $wrapper_class ); ?>" <?php if( $animate_block == 'yes' && $animation_delay != '' ) { echo 'data-wow-delay="' . esc_attr( $animation_delay ) . '"'; } ?>>
  <h6><?php echo esc_html( $title ); ?></h6>
  <div class="experts-slider">
    <div class="swiper-wrapper">
      <?php
      $new_accordion_value = array();
      foreach ( $details as $data ) {
        $new_line = $data;
        $new_line[ 'image' ] = isset( $new_line[ 'image' ] ) ? $new_line[ 'image' ] : '';
        $new_line[ 'name' ] = isset( $new_line[ 'name' ] ) ? $new_line[ 'name' ] : '';
        $new_line[ 'expert' ] = isset( $new_line[ 'expert' ] ) ? $new_line[ 'expert' ] : '';
        $new_line[ 'social_icons' ] = isset( $new_line[ 'social_icons' ] ) ? $new_line[ 'social_icons' ] : '';

        $new_accordion_value[] = $new_line;

      }

      $idd = 0;
      foreach ( $new_accordion_value as $accordion ):
        $idd++;
      $images = wp_get_attachment_image_src( $accordion[ 'image' ], '' );
      ?>
      <?php if($accordion['image']){ ?>
      <div class="swiper-slide">
        <figure> <img src="<?php echo esc_url($images[0]);?>" alt="Image">
          <figcaption>
            <h5><?php echo wp_kses_post($accordion['name']);?></h5>
            <small><?php echo wp_kses_post($accordion['expert']);?></small> <?php echo wp_kses_post($accordion['social_icons']);?> </figcaption>
        </figure>
      </div>
      <?php } ?>
      <?php
      endforeach;
      wp_reset_query();
      ?>
    </div>
    <!-- end swiper-wrapper -->
    <div class="swiper-pagination"></div>
  </div>
</div>
<?php
return ob_get_clean();
}
}


vc_map( array(
  "base" => "ts_expert_box",
  "name" => __( 'Expert Box', 'themezinho' ),
  "icon" => THEMEZINHO_CORE_URI . "assets/img/custom.png",
  "content_element" => true,
  "category" => PAGE_BUILDER_GROUP,
  'params' => array(
    array(
      "type" => "textfield",
      "holder" => "div",
      "class" => "",
      "heading" => __( "Title", 'themezinho' ),
      "param_name" => "title",
      "value" => ""
    ),

    array(
      'type' => 'param_group',
      'param_name' => 'details',
      'heading' => __( 'Item Slider', 'themezinho' ),
      'params' => array(
        array(
          'type' => 'attach_image',
          'heading' => __( 'Expert Image', 'themezinho' ),
          'param_name' => 'image',
          'value' => ''
        ),

        array(
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => __( "Name", 'themezinho' ),
          "param_name" => "name",
          "value" => ""
        ),
        array(
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => __( "Expert", 'themezinho' ),
          "param_name" => "expert",
          "value" => ""
        ),
        array(
          "type" => "textarea",
          "holder" => "div",
          "class" => "",
          "heading" => __( "Social Icons", 'themezinho' ),
          "param_name" => "social_icons",
          "value" => ""
        ),


      )
    ),
    array(
      "type" => "dropdown",
      "heading" => __( 'Animate', 'themezinho' ),
      "param_name" => "animate_block",
      "group" => 'Animation',
      "value" => array(
        "No" => 'no',
        "Yes" => 'yes',
      )
    ),
    array(
      "type" => "dropdown",
      "heading" => __( 'Animation Type', 'themezinho' ),
      "param_name" => "animation_type",
      "dependency" => array( 'element' => "animate_block", 'value' => 'yes' ),
      "group" => 'Animation',
      "value" => motts_animations()
    ),
    array(
      "type" => "textfield",
      "heading" => __( 'Animation Delay', 'themezinho' ),
      "param_name" => "animation_delay",
      "dependency" => array( 'element' => "animate_block", 'value' => 'yes' ),
      "description" => __( 'Animation delay set in second e.g. 0.6s', 'themezinho' ),
      "group" => 'Animation',
    ),
  ) ) );
