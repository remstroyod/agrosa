<?php
/*
Plugin Name: Themezinho Core
Plugin URI: https://themeforest.net/user/themezinho/portfolio
Description: Themezinho Core
Author: themezinho
Version: 1.0.0
Author URI: http://themeforest.net/user/themezinho/portfolio
*/

define( "THEMEZINHO_CORE_PATH", plugin_dir_path( __FILE__ ) );
define( "THEMEZINHO_CORE_URI", plugins_url( 'themezinho_core/'  ) );
define( "PAGE_BUILDER_GROUP", __( 'seodo', 'themezinho' ) );

add_action( 'vc_before_init', 'themezinho_vc_addons' );
/**
* JS Composer Elements
*/

function themezinho_vc_addons() {
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/header.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/side-content.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/side-image.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/side-slider.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/image-content-box.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/section-title.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/carousel-image-content-box.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/counter-box.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/service-list-box.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/icon-box.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/timeline-slider.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/recent-news.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/years-box.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/testimonial.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/testimonials-slider.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/highlight-slider.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/logo-item.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/contact-box.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/google-maps.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/image-title-box.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/icon-circle-box.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/expert-box.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/accordion-box.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/gallery-grid.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/works.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/text-box.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/side-half-image.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/side-content-image-box.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/image-caption-box.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/text-box.php';
	require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/image.php';
	

	
	
	

}

require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/vc_extra_params.php';

/**
 * Include advanced custom field
 */
// 1. customize ACF path
add_filter('acf/settings/path', 'themezinho_acf_settings_path');

function themezinho_acf_settings_path( $path ) {
	$path = THEMEZINHO_CORE_PATH . '/inc/acf/';

	return $path;
}


// 2. customize ACF dir
add_filter('acf/settings/dir', 'themezinho_acf_settings_dir');

function themezinho_acf_settings_dir( $dir ) {
	$dir = THEMEZINHO_CORE_URI . '/inc/acf/';

	return $dir;
}

//Hide ACF field group menu item
add_filter('acf/settings/show_admin', '__return_false');
require THEMEZINHO_CORE_PATH .  '/inc/acf/acf.php';

require_once THEMEZINHO_CORE_PATH . '/inc/theme-options.php';

require_once THEMEZINHO_CORE_PATH . '/inc/cpt-taxonomy.php';


function motts_animations(){

    return array(
	    'bounce' => 'bounce',
	    'flash' => 'flash',
	    'pulse' => 'pulse',
	    'rubberBand' => 'rubberBand',
	    'shake' => 'shake',
	    'headShake' => 'headShake',
	    'swing' => 'swing',
	    'tada' => 'tada',
	    'wobble' => 'wobble',
	    'jello' => 'jello',
	    'bounceIn' => 'bounceIn',
	    'bounceInDown' => 'bounceInDown',
	    'bounceInLeft' => 'bounceInLeft',
	    'bounceInRight' => 'bounceInRight',
	    'bounceInUp' => 'bounceInUp',
	    'bounceOut' => 'bounceOut',
	    'bounceOutDown' => 'bounceOutDown',
	    'bounceOutLeft' => 'bounceOutLeft',
	    'bounceOutRight' => 'bounceOutRight',
	    'bounceOutUp' => 'bounceOutUp',
	    'fadeIn' => 'fadeIn',
	    'fadeInDown' => 'fadeInDown',
	    'fadeInDownBig' => 'fadeInDownBig',
	    'fadeInLeft' => 'fadeInLeft',
	    'fadeInLeftBig' => 'fadeInLeftBig',
	    'fadeInRight' => 'fadeInRight',
	    'fadeInRightBig' => 'fadeInRightBig',
	    'fadeInUp' => 'fadeInUp',
	    'fadeInUpBig' => 'fadeInUpBig',
	    'fadeOut' => 'fadeOut',
	    'fadeOutDown' => 'fadeOutDown',
	    'fadeOutDownBig' => 'fadeOutDownBig',
	    'fadeOutLeft' => 'fadeOutLeft',
	    'fadeOutLeftBig' => 'fadeOutLeftBig',
	    'fadeOutRight' => 'fadeOutRight',
	    'fadeOutRightBig' => 'fadeOutRightBig',
	    'fadeOutUp' => 'fadeOutUp',
	    'fadeOutUpBig' => 'fadeOutUpBig',
	    'flipInX' => 'flipInX',
	    'flipInY' => 'flipInY',
	    'flipOutX' => 'flipOutX',
	    'flipOutY' => 'flipOutY',
	    'lightSpeedIn' => 'lightSpeedIn',
	    'lightSpeedOut' => 'lightSpeedOut',
	    'rotateIn' => 'rotateIn',
	    'rotateInDownLeft' => 'rotateInDownLeft',
	    'rotateInDownRight' => 'rotateInDownRight',
	    'rotateInUpLeft' => 'rotateInUpLeft',
	    'rotateInUpRight' => 'rotateInUpRight',
	    'rotateOut' => 'rotateOut',
	    'rotateOutDownLeft' => 'rotateOutDownLeft',
	    'rotateOutDownRight' => 'rotateOutDownRight',
	    'rotateOutUpLeft' => 'rotateOutUpLeft',
	    'rotateOutUpRight' => 'rotateOutUpRight',
	    'hinge' => 'hinge',
	    'jackInTheBox' => 'jackInTheBox',
	    'rollIn' => 'rollIn',
	    'rollOut' => 'rollOut',
	    'zoomIn' => 'zoomIn',
	    'zoomInDown' => 'zoomInDown',
        'zoomInLeft' => 'zoomInLeft',
        'zoomInRight' => 'zoomInRight',
        'zoomInUp' => 'zoomInUp',
        'zoomOut' => 'zoomOut',
        'zoomOutDown' => 'zoomOutDown',
        'zoomOutLeft' => 'zoomOutLeft',
        'zoomOutRight' => 'zoomOutRight',
        'zoomOutUp' => 'zoomOutUp',
        'slideInDown' => 'slideInDown',
        'slideInLeft' => 'slideInLeft',
        'slideInRight' => 'slideInRight',
        'slideInUp' => 'slideInUp',
        'slideOutDown' => 'slideOutDown',
        'slideOutLeft' => 'slideOutLeft',
        'slideOutRight' => 'slideOutRight',
        'slideOutUp' => 'slideOutUp',
        'heartBeat' => 'heartBeat'
    );
}


function ts_get_hero_slider() {
	$args = array (
		'post_type'			=> 'hero',
		'posts_per_page'	=> -1,
	);
	$sliders = get_posts( $args );

	$_slider = array();

	if( count( $sliders ) ) {
		foreach( $sliders as $slider ) {
			$_slider[ $slider->ID . ' ' . $slider->post_title ] = $slider->ID;
		}
	}

	return $_slider;
}


function ts_get_testo_carousel() {
	$args = array (
		'post_type'			=> 'testimonial',
		'posts_per_page'	=> -1,
	);
	$reviews = get_posts( $args );

	$_review = array();

	if( count( $reviews ) ) {
		foreach( $reviews as $review ) {
			$_review[ $review->ID . ' ' . $review->post_title ] = $review->ID;
		}
	}

	return $_review;
}


// default options
function seodo_after_import(){

	update_field('enable_page_transition', 1, 'option');
	update_field('enable_search', 1, 'option');
	update_field('enable_topbar', 1, 'option');	
	update_field( 'archive_show_sidebar', 'yes', 'option' );

	$topbar_social_media = array(
		array(
			'label'		=> wp_kses_post( '<i class="lni lni-facebook-filled"></i>', 'seodo' ),
			'url'		=> '#',
		),
		array(
			'label'		=> wp_kses_post( '<i class="lni lni-twitter-original"></i>', 'seodo' ),
			'url'		=> '#',
		),
		array(
			'label'		=> wp_kses_post( '<i class="lni lni-instagram"></i>', 'seodo' ),
			'url'		=> '#',
		),
		array(
			'label'		=> wp_kses_post( '<i class="lni lni-youtube"></i>', 'seodo' ),
			'url'		=> '#',
		),
		array(
			'label'		=> wp_kses_post( '<i class="lni lni-pinterest"></i>', 'seodo' ),
			'url'		=> '#',
		),
	);
	  update_field( 'topbar_social_media', $topbar_social_media, 'option' );
	
	update_field( 'topbar_text', esc_html( "That's right, we only sell 100% organic" ), 'option' );
	update_field( 'topbar_social_label', esc_html( "Follow us" ), 'option' );
	update_field( 'topbar_phone', esc_html( "+1 (850) 344 0 66" ), 'option' );

	
	
	
}