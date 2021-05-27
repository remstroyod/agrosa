<?php
if ( !defined( 'ABSPATH' ) ) {
  die( '-1' );
}

class WPBakeryShortCode_ts_side_image extends WPBakeryShortCode {

  protected function content( $atts, $content = null ) {

    extract( shortcode_atts( array(
      'image' => '',
      'alt' => '',
		'display_notebox' => '',
      'notebox' => '',
		
		'display_video_button' => '',
      'video_button_url' => '',
		
		
      'animate_block' => 'false',
      'animation_type' => 'fadeIn',
      'animation_delay' => '',
    ), $atts ) );

    $wrapper_class = array();

    $image_url = '';
    if ( $image != '' ) {
      $image_url = wp_get_attachment_url( $image );
    }

    if ( !$image_url ) return;

    if ( $animate_block == 'yes' ) {
      $wrapper_class[] = 'wow';
      $wrapper_class[] = $animation_type;
    }

    $wrapper_class = implode( ' ', $wrapper_class );

    ob_start();
    ?>
<figure class="side-image <?php echo esc_attr( $wrapper_class ); ?>" <?php if( $animate_block == 'yes' && $animation_delay != '' ) { echo 'data-wow-delay="' . esc_attr( $animation_delay ) . '"'; } ?>> <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $alt ); ?>">

<?php if( $notebox != '' ) { ?>
		<div class="big-note-box">
			<?php echo wpb_js_remove_wpautop( $notebox, true ); ?>
		</div>
  <?php } ?>
	
	<?php if( $video_button_url != '' ) { ?>
	<a href="<?php echo esc_url( $video_button_url ); ?>" class="video-button" data-fancybox><i class="lni lni-play"></i></a>
	<?php } ?>
	
	
</figure>
<?php

return ob_get_clean();
}
}


vc_map( array(
  "base" => "ts_side_image",
  "name" => __( 'Side Image', 'themezinho' ),
  "icon" => THEMEZINHO_CORE_URI . "assets/img/custom.png",
  "content_element" => true,
  "category" => PAGE_BUILDER_GROUP,
  'params' => array(
    array(
      "type" => "attach_image",
      "heading" => __( 'Image', 'themezinho' ),
      "param_name" => "image",
      "group" => "General",
    ),
    array(
      "type" => "textfield",
      "heading" => __( 'Alt Tag', 'themezinho' ),
      "param_name" => "alt",
      "group" => 'General',
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
      "type" => "textarea_html",
      "heading" => __( 'Note Box Text', 'themezinho' ),
      "param_name" => "notebox",
      "dependency" => array( 'element' => "display_notebox", 'value' => 'show' ),
      "group" => 'Note Box',
      "value" => ""
    ),
	  
	  
	   array(
      "type" => "dropdown",
      "heading" => __( 'Display Video Button', 'themezinho' ),
      "param_name" => "display_video_button",
      "group" => 'Video Button',
      "value" => array(
        "Hide" => 'hide',
        "Show" => 'show',
      )
    ),
    array(
      "type" => "textfield",
      "heading" => __( 'Note Box Text', 'themezinho' ),
      "param_name" => "video_button_url",
      "dependency" => array( 'element' => "display_video_button", 'value' => 'show' ),
      "group" => 'Video Button',
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
