<?php
if ( !defined( 'ABSPATH' ) ) {
  die( '-1' );
}

class WPBakeryShortCode_ts_section_title extends WPBakeryShortCode {

  protected function content( $atts, $content = null ) {

    extract( shortcode_atts( array(
      'align' => '',
      'color' => '#212529',
      'shape' => 'show',
      'tagline' => '',
      'title' => '',
      'description' => '',
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
<div class="section-title <?php if( $align == 'text-left' ) { ?> text-left <?php } ?> <?php echo esc_attr( $wrapper_class ); ?>"  style='color:<?php echo esc_attr( $color ); ?>;' <?php if( $animate_block == 'yes' && $animation_delay != '' ) { echo 'data-wow-delay="' . esc_attr( $animation_delay ) . '"'; } ?>>
	
	
	
	
	 <?php if( $shape == 'show' ) { ?>
	<figure> <img src="<?php echo get_template_directory_uri(); ?>/images/section-title-shape.png" alt="Image"> </figure>
	<?php } ?>
	
  <?php if( $tagline ) { ?>
  <h6> <?php echo esc_html( $tagline ); ?> </h6>
  <?php } ?>
  <?php if( $title ) { ?>
  <h2><?php echo wp_kses_post( $title ); ?></h2>
  <?php } ?>
	
	 <?php if( $description ) { ?>
  <p><?php echo wp_kses_post( $description ); ?></p>
  <?php } ?>
</div>
<?php

return ob_get_clean();
}
}


vc_map( array(
  "base" => "ts_section_title",
  "name" => __( 'Section Title', 'themezinho' ),
  "icon" => THEMEZINHO_CORE_URI . "assets/img/custom.png",
  "content_element" => true,
  "category" => PAGE_BUILDER_GROUP,
  'params' => array(
    array(
      "type" => "colorpicker",
      "heading" => __( 'Color', 'themezinho' ),
      "param_name" => "color",
      "group" => 'General',
      "value" => '#212529'
    ),
	   array(
      "type" => "dropdown",
      "heading" => __( 'Title Shape', 'themezinho' ),
      "param_name" => "shape",
      "group" => 'General',
      "value" => array(
        "Show" => 'show',
        "Hide" => '',

      )
    ),
    array(
      "type" => "dropdown",
      "heading" => __( 'Alignment', 'themezinho' ),
      "param_name" => "align",
      "group" => 'General',
      "value" => array(
        "Center" => '',
        "Left" => 'text-left',

      )
    ),

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
      "type" => "textarea_html",
      "heading" => __( 'Description', 'themezinho' ),
      "param_name" => "description",
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
