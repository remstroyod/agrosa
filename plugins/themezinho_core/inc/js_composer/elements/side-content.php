<?php
if ( !defined( 'ABSPATH' ) ) {
  die( '-1' );
}

class WPBakeryShortCode_ts_side_content extends WPBakeryShortCode {

  protected function content( $atts, $content = null ) {

    extract( shortcode_atts( array(
      'position' => 'left',
      'side_content' => '',

      'display_button' => 'hide',
      'button_label' => '',
      'button_url' => '',

      'display_link' => 'hide',
      'link_label' => '',
      'link_url' => '',

      'animate_block' => 'false',
      'animation_type' => 'fadeIn',
      'animation_delay' => '',
    ), $atts ) );

    ob_start();


    $wrapper_class = '';
    if ( $animate_block == 'yes' ) {
      $wrapper_class = 'wow ' . $animation_type;
    }
    ?>




<div class="side-content <?php if( $position != 'left' ) { echo 'right'; } ?><?php if( $position != 'right' ) { echo 'left'; } ?> <?php echo esc_attr( $wrapper_class ); ?>" <?php if( $animate_block == 'yes' && $animation_delay != '' ) { echo 'data-wow-delay="' . esc_attr( $animation_delay ) . '"'; } ?>>
  <?php if( $side_content != '' ) { ?>
	<?php echo wpb_js_remove_wpautop( $content, true ); ?>
  <?php } ?>
  <?php if( $display_button != 'hide' ) { ?>
  <a href="<?php echo esc_url( $button_url ); ?>" class="custom-button"><?php echo esc_html( $button_label ); ?></a>
  <?php } ?>
  <?php if( $display_link != 'hide' ) { ?>
  <a href="<?php echo esc_url( $link_url ); ?>" class="custom-link"><?php echo esc_html( $link_label ); ?></a>
  <?php } ?>
</div>
<?php

return ob_get_clean();
}
}


vc_map( array(
  "base" => "ts_side_content",
  "name" => __( 'Side Content', 'themezinho' ),
  "icon" => THEMEZINHO_CORE_URI . "assets/img/custom.png",
  "content_element" => true,
  "category" => PAGE_BUILDER_GROUP,
  'params' => array(

    array(
      "type" => "dropdown",
      "heading" => __( 'Select Position', 'themezinho' ),
      "param_name" => "position",
      "group" => 'General',
      "value" => array(
        "Left" => 'left',
        "Right" => 'right',
      )
    ),

    array(
      "type" => "textarea_html",
      "heading" => __( 'Content', 'themezinho' ),
      "param_name" => "content",
      "group" => 'General',
    ),


    array(
      "type" => "dropdown",
      "heading" => __( 'Display Button', 'themezinho' ),
      "param_name" => "display_button",
      "group" => 'Button',
      "value" => array(
        "Hide" => 'hide',
        "Show" => 'show',
      )
    ),
    array(
      "type" => "textfield",
      "heading" => __( 'Button Label', 'themezinho' ),
      "param_name" => "button_label",
      "dependency" => array( 'element' => "display_button", 'value' => 'show' ),
      "group" => 'Button',
      "value" => ""
    ),
    array(
      "type" => "textfield",
      "heading" => __( 'Button URL', 'themezinho' ),
      "param_name" => "button_url",
      "dependency" => array( 'element' => "display_button", 'value' => 'show' ),
      "group" => 'Button',
      "value" => ""
    ),


    array(
      "type" => "dropdown",
      "heading" => __( 'Display Link', 'themezinho' ),
      "param_name" => "display_link",
      "group" => 'Link',
      "value" => array(
        "Hide" => 'hide',
        "Show" => 'show',
      )
    ),
    array(
      "type" => "textfield",
      "heading" => __( 'Link Label', 'themezinho' ),
      "param_name" => "link_label",
      "dependency" => array( 'element' => "display_link", 'value' => 'show' ),
      "group" => 'Link',
      "value" => ""
    ),
    array(
      "type" => "textfield",
      "heading" => __( 'Link URL', 'themezinho' ),
      "param_name" => "link_url",
      "dependency" => array( 'element' => "display_link", 'value' => 'show' ),
      "group" => 'Link',
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
    )
  ),
) );
