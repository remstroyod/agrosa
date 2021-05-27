<?php
if ( !defined( 'ABSPATH' ) ) {
  die( '-1' );
}

class WPBakeryShortCode_ts_side_text_box extends WPBakeryShortCode {

  protected function content( $atts, $content = null ) {

    extract( shortcode_atts( array(
      'tagline' => '',
      'title' => '',
      'description' => '',
      'image' => '',
      'button_label' => '',
      'button_url' => '',
      'animate_block' => 'false',
      'animation_type' => 'fadeIn',
      'animation_delay' => '',
    ), $atts ) );


    $image_url = '';
    if ( $image != '' ) {
      $image_url = wp_get_attachment_url( $image );
    }

    if ( !$image_url ) return;

    ob_start();

    $wrapper_class = array();

    if ( $animate_block == 'yes' ) {
      $wrapper_class[] = 'wow';
      $wrapper_class[] = $animation_type;
    }

    $wrapper_class = implode( ' ', $wrapper_class );
    ?>
<div class="side-text-box <?php echo esc_attr( $wrapper_class ); ?>" <?php if( $animate_block == 'yes' && $animation_delay != '' ) { echo 'data-wow-delay="' . esc_attr( $animation_delay ) . '"'; } ?>>
  <?php if( $tagline ) { ?>
  <h6> <?php echo esc_html( $tagline ); ?> </h6>
  <?php } ?>
  <?php if( $title ) { ?>
  <h2><?php echo wp_kses_post( $title ); ?></h2>
  <?php } ?>
  <?php if( $description ) { ?>
  <p><?php echo esc_html( $description ); ?></p>
  <?php } ?>
  <figure> <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_url( $title ); ?>"> </figure>
  <?php if( $button_label ) { ?>
  <a href="<?php echo esc_url( $button_url ); ?>"><?php echo wp_kses_post( $button_label ); ?></a>
  <?php } ?>
</div>
<?php

return ob_get_clean();
}
}


vc_map( array(
  "base" => "ts_side_text_box",
  "name" => __( 'Side Text Box', 'themezinho' ),
  "icon" => THEMEZINHO_CORE_URI . "assets/img/custom.png",
  "content_element" => true,
  "category" => PAGE_BUILDER_GROUP,
  'params' => array(
    array(
      "type" => "textfield",
      "heading" => __( 'Tagline', 'themezinho' ),
      "param_name" => "tagline",
      "group" => 'General',
    ),
    array(
      "type" => "textfield",
      "heading" => __( 'Title', 'themezinho' ),
      "param_name" => "title",
      "group" => 'General',
    ),
    array(
      "type" => "textarea",
      "heading" => __( 'Description', 'themezinho' ),
      "param_name" => "description",
      "group" => 'General',
    ),
    array(
      "type" => "attach_image",
      "heading" => __( 'Image', 'themezinho' ),
      "param_name" => "image",
      "group" => "General",
    ),
    array(
      "type" => "textfield",
      "heading" => __( 'Button Label', 'themezinho' ),
      "param_name" => "button_label",
      "group" => 'General',
    ),
    array(
      "type" => "textfield",
      "heading" => __( 'Button URL', 'themezinho' ),
      "param_name" => "button_url",
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
