<?php
if ( !defined( 'ABSPATH' ) ) {
  die( '-1' );
}

class WPBakeryShortCode_ts_side_slider extends WPBakeryShortCode {


  protected function content( $atts, $content = null ) {

    extract( shortcode_atts( array(
      'details' => '',
      'image' => '',
      'display_notebox' => '',
      'notebox' => '',
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
<div class="side-slider <?php echo esc_attr( $wrapper_class ); ?>" <?php if( $animate_block == 'yes' && $animation_delay != '' ) { echo 'data-wow-delay="' . esc_attr( $animation_delay ) . '"'; } ?>>
	<div class="slider">
  <div class="swiper-wrapper">
    <?php
    $new_accordion_value = array();
    foreach ( $details as $data ) {
      $new_line = $data;
      $new_line[ 'image' ] = isset( $new_line[ 'image' ] ) ? $new_line[ 'image' ] : '';
      $new_line[ 'title' ] = isset( $new_line[ 'title' ] ) ? $new_line[ 'title' ] : '';

      $new_accordion_value[] = $new_line;

    }

    $idd = 0;
    foreach ( $new_accordion_value as $accordion ):
      $idd++;
    $images = wp_get_attachment_image_src( $accordion[ 'image' ], '' );
    ?>
    <?php if($accordion['image']){ ?>
    <div class="swiper-slide"> <img src="<?php echo esc_url($images[0]);?>" alt="<?php echo esc_html($accordion['title']);?>"> </div>
    <?php } ?>
    <?php
    endforeach;
    wp_reset_query();
    ?>
  </div>
  <!-- end swiper-wrapper -->
  <div class="swiper-pagination"></div>
  <!-- end swiper-pagination --> 
	
		 <?php if( $notebox != '' ) { ?>
		<div class="note-box">
  <?php echo esc_html( $notebox ); ?>
		</div>
  <?php } ?>
		
       
		</div>
	<!-- end slider -->
</div>
<!-- end side-slider -->

<?php
return ob_get_clean();
}
}


vc_map( array(
  "base" => "ts_side_slider",
  "name" => __( 'Side Slider', 'themezinho' ),
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
          "heading" => __( "Alt Tag", 'themezinho' ),
          "param_name" => "title",
          "value" => ""
        ),


      )
    ),
	  
	  
	  
	  array(
      "type" => "dropdown",
      "heading" => __( 'Display Note Box', 'themezinho' ),
      "param_name" => "display_notebox",
      "group" => 'Note Box',
      "value" => array(
        "Hide" => 'hide',
        "Show" => 'show',
      )
    ),
    array(
      "type" => "textfield",
      "heading" => __( 'Note Box Text', 'themezinho' ),
      "param_name" => "notebox",
      "dependency" => array( 'element' => "display_notebox", 'value' => 'show' ),
      "group" => 'Note Box',
      "value" => ""
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
