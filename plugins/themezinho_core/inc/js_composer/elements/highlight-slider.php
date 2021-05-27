<?php
if ( !defined( 'ABSPATH' ) ) {
  die( '-1' );
}

class WPBakeryShortCode_ts_highlight_slider extends WPBakeryShortCode {


  protected function content( $atts, $content = null ) {

    extract( shortcode_atts( array(
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
<div class="highlight-slider <?php echo esc_attr( $wrapper_class ); ?>" <?php if( $animate_block == 'yes' && $animation_delay != '' ) { echo 'data-wow-delay="' . esc_attr( $animation_delay ) . '"'; } ?>>

    <div class="swiper-wrapper">
      <?php
      $new_accordion_value = array();
      foreach ( $details as $data ) {
        $new_line = $data;
        $new_line[ 'image' ] = isset( $new_line[ 'image' ] ) ? $new_line[ 'image' ] : '';
        $new_line[ 'tagline' ] = isset( $new_line[ 'tagline' ] ) ? $new_line[ 'tagline' ] : '';
        $new_line[ 'title' ] = isset( $new_line[ 'title' ] ) ? $new_line[ 'title' ] : '';
        $new_line[ 'button_label' ] = isset( $new_line[ 'button_label' ] ) ? $new_line[ 'button_label' ] : '';
        $new_line[ 'button_url' ] = isset( $new_line[ 'button_url' ] ) ? $new_line[ 'button_url' ] : '';

        $new_accordion_value[] = $new_line;

      }

      $idd = 0;
      foreach ( $new_accordion_value as $accordion ):
        $idd++;
      $images = wp_get_attachment_image_src( $accordion[ 'image' ], '' );
      ?>
      <?php if($accordion['image']){ ?>
      <div class="swiper-slide" data-background="<?php echo esc_url($images[0]);?>">
        <div class="container">
          <h6><?php echo esc_html($accordion['tagline']);?></h6>
          <h2><?php echo wp_kses_post($accordion['title']);?></h2>
          <a href="<?php echo esc_url($accordion['button_url']);?>" class="custom-button"><?php echo esc_html($accordion['button_label']);?></a> </div>
        <!-- end container --> 
        
      </div>
      <?php } ?>
      <?php
      endforeach;
      wp_reset_query();
      ?>
    </div>
    <!-- end swiper-wrapper -->
    <div class="custom-pagination"></div>
    <!-- end custom-pagination --> 
    
</div>
<!-- end side-slider -->

<?php
return ob_get_clean();
}
}


vc_map( array(
  "base" => "ts_highlight_slider",
  "name" => __( 'Highlight Slider', 'themezinho' ),
  "icon" => THEMEZINHO_CORE_URI . "assets/img/custom.png",
  "content_element" => true,
  "category" => PAGE_BUILDER_GROUP,
  'params' => array(


    array(
      'type' => 'param_group',
      'param_name' => 'details',
      'heading' => __( 'Item Slider', 'themezinho' ),
      'params' => array(
        array(
          'type' => 'attach_image',
          'heading' => __( 'Image', 'themezinho' ),
          'param_name' => 'image',
          'value' => ''
        ),

        array(
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => __( "Tagline", 'themezinho' ),
          "param_name" => "tagline",
          "value" => ""
        ),
        array(
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => __( "Title", 'themezinho' ),
          "param_name" => "title",
          "value" => ""
        ),
        array(
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => __( "Button Label", 'themezinho' ),
          "param_name" => "button_label",
          "value" => ""
        ),
        array(
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => __( "Button URL", 'themezinho' ),
          "param_name" => "button_url",
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
