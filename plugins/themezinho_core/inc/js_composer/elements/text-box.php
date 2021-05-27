<?php
if ( !defined( 'ABSPATH' ) ) {
  die( '-1' );
}

class WPBakeryShortCode_ts_text_box extends WPBakeryShortCode {

  protected function content( $atts, $content = null ) {

    extract( shortcode_atts( array(
      'color' => '',
      'block_type' => 'normal',
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
    ?>
<div style='color:<?php echo esc_attr( $color ); ?>;' class="text-box <?php echo esc_attr( $wrapper_class ); ?>" <?php if( $animate_block == 'yes' && $animation_delay != '' ) { echo 'data-wow-delay="' . esc_attr( $animation_delay ) . '"'; } ?>> <?php echo wpb_js_remove_wpautop( $content, true ); ?> </div>
<?php

return ob_get_clean();
}
}


vc_map( array(
  "base" => "ts_text_box",
  "name" => __( 'Text Box', 'themezinho' ),
  "icon" => THEMEZINHO_CORE_URI . "assets/img/custom.png",
  "content_element" => true,
  "category" => PAGE_BUILDER_GROUP,
  'params' => array(
    array(
      "type" => "colorpicker",
      "heading" => __( 'Color', 'themezinho' ),
      "param_name" => "color",
      "group" => 'General',
      "value" => ''
    ),
    array(
      "type" => "textarea_html",
      "heading" => __( 'Text', 'themezinho' ),
      "param_name" => "content",
      "group" => 'General',
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
    )
  ),
) );
