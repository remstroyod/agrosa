<?php
if ( !defined( 'ABSPATH' ) ) {
  die( '-1' );
}

class WPBakeryShortCode_ts_gallery_grid extends WPBakeryShortCode {


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
<ul class="gallery-grid <?php echo esc_attr( $wrapper_class ); ?>" <?php if( $animate_block == 'yes' && $animation_delay != '' ) { echo 'data-wow-delay="' . esc_attr( $animation_delay ) . '"'; } ?>>
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
  <li>
    <figure> <a href="<?php echo esc_url($images[0]);?>" data-fancybox><img src="<?php echo esc_url($images[0]);?>" alt="<?php echo esc_attr($accordion['title']);?>"></a> </figure>
  </li>
  <?php } ?>
  <?php
  endforeach;
  wp_reset_query();
  ?>
</ul>
<?php
return ob_get_clean();
}
}


vc_map( array(
  "base" => "ts_gallery_grid",
  "name" => __( 'Gallery Grid', 'themezinho' ),
  "icon" => THEMEZINHO_CORE_URI . "assets/img/custom.png",
  "content_element" => true,
  "category" => PAGE_BUILDER_GROUP,
  'params' => array(


    array(
      'type' => 'param_group',
      'param_name' => 'details',
      'heading' => __( 'Gallery', 'themezinho' ),
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
          "heading" => __( "Image Alt", 'themezinho' ),
          "param_name" => "title",
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
