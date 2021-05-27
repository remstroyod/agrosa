<?php
if ( !defined( 'ABSPATH' ) ) {
  die( '-1' );
}

class WPBakeryShortCode_ts_timeline_slider extends WPBakeryShortCode {


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
<div class="cd-horizontal-timeline <?php echo esc_attr( $wrapper_class ); ?>" <?php if( $animate_block == 'yes' && $animation_delay != '' ) { echo 'data-wow-delay="' . esc_attr( $animation_delay ) . '"'; } ?>>
  <?php if( $title ) { ?>
  <h2 class="title"><?php echo wp_kses_post( $title ); ?></h2>
  <?php } ?>
  <?php
  $new_accordion_value = array();
  foreach ( $details as $data ) {
    $new_line = $data;
    $new_line[ 'year' ] = isset( $new_line[ 'year' ] ) ? $new_line[ 'year' ] : '';
    $new_line[ 'title' ] = isset( $new_line[ 'title' ] ) ? $new_line[ 'title' ] : '';
    $new_line[ 'description' ] = isset( $new_line[ 'description' ] ) ? $new_line[ 'description' ] : '';

    $new_accordion_value[] = $new_line;

  }
  ?>
  <div class="timeline">
    <div class="events-wrapper">
      <div class="events">
        <ol>
          <?php

          $idd = 0;
          foreach ( $new_accordion_value as $accordion ):
            $idd++;
          ?>
          <li><a href="#0" data-date="01/01/<?php echo esc_html($accordion['year']);?>"><?php echo esc_html($accordion['year']);?></a></li>
          <?php
          endforeach;
          wp_reset_query();
          ?>
        </ol>
        <span class="filling-line" aria-hidden="true"></span> </div>
      <!-- .events --> 
    </div>
    <!-- .events-wrapper --> 
    
  </div>
  <!-- end timeline -->
  
  <div class="events-content">
    <ol>
      <?php

      $idd = 0;
      foreach ( $new_accordion_value as $accordion ):
        $idd++;
      ?>
      <li data-date="01/01/<?php echo esc_html($accordion['year']);?>">
        <div class="content">
          <?php if($accordion['title']) { ?>
          <h2><?php echo esc_html($accordion['title']);?></h2>
          <?php } ?>
          <?php if($accordion['description']) { ?>
          <p><?php echo esc_html($accordion['description']);?></p>
          <?php } ?>
        </div>
        <!--end content --> 
      </li>
      <?php
      endforeach;
      wp_reset_query();
      ?>
    </ol>
  </div>
  <!-- end events-content --> 
  
</div>
<?php
return ob_get_clean();
}
}


vc_map( array(
  "base" => "ts_timeline_slider",
  "name" => __( 'Timeline Slider', 'themezinho' ),
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
          'type' => 'textfield',
          'heading' => __( 'Year', 'themezinho' ),
          'param_name' => 'year',
          'value' => '',
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
          "heading" => __( "Description", 'themezinho' ),
          "param_name" => "description",
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
