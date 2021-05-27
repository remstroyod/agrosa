<?php


if ( !function_exists( 'seodo_google_fonts_url' ) ) {
  /*
   * Register Google Font Family
   */
  function seodo_google_fonts_url() {

    wp_enqueue_style( 'seodo_google_fonts', 'https://fonts.googleapis.com/css?family=Poppins:400,600,800', false );
  }

  add_action( 'wp_enqueue_scripts', 'seodo_google_fonts_url' );

}

if ( !function_exists( 'seodo_enqueue_styles_and_scripts' ) ) {
  /**
   * This function enqueues the required css and js files.
   *
   * @return void
   */
  function seodo_enqueue_styles_and_scripts() {
    /**
     * Enqueue css files.
     */
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
    wp_enqueue_style( 'lineicons', get_template_directory_uri() . '/css/lineicons.css' );
    wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/css/fancybox.min.css' );
    wp_enqueue_style( 'timeline', get_template_directory_uri() . '/css/timeline.css' );
    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/css/swiper.min.css' );
    wp_enqueue_style( 'odometer', get_template_directory_uri() . '/css/odometer.min.css' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_style( 'seodo-main-style', get_template_directory_uri() . '/css/style.css' );
    wp_enqueue_style( 'seodo-stylesheet', get_stylesheet_uri() );
    wp_add_inline_style( 'seodo-stylesheet', seodo_dynamic_css() );

    /**
     * Enqueue javascript files.
     */

    wp_enqueue_script( 'comments', get_template_directory_uri() . '/js/comments.js', array(), false, false );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/fancybox.min.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'odometer', get_template_directory_uri() . '/js/odometer.min.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.min.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'stellar', get_template_directory_uri() . '/js/jquery.stellar.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'timeline', get_template_directory_uri() . '/js/timeline.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.min.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'seodo-scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), false, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }

    $data = array(
      'pre_loader_typewriter' => [],
      'audio_source' => '',
      'enable_sound_bar' => false
    );

    if ( seodo_get_option( 'enable_preloader' ) ) {
      $typewriter_text = [];
      $text_rotater = seodo_get_option( 'pre_loader_text_rotater' );
      if ( $text_rotater ) {
        foreach ( $text_rotater as $rotater ) {
          $typewriter_text[] = esc_html( $rotater[ 'title' ] );
        }
      }
      $data[ 'pre_loader_typewriter' ] = $typewriter_text;
    }


    $comment_data = array(
      'name' => esc_html__( 'Name is required', 'seodo' ),
      'email' => esc_html__( 'Email is required', 'seodo' ),
      'comment' => esc_html__( 'Comment is required', 'seodo' ),

    );

    wp_localize_script( 'seodo-scripts', 'data', $data );
    wp_localize_script( 'comments', 'comment_data', $comment_data );
  }

  add_action( 'wp_enqueue_scripts', 'seodo_enqueue_styles_and_scripts', 10 );
}

if ( !function_exists( 'seodo_dynamic_css' ) ) {
  function seodo_dynamic_css() {

    $styles = '';
    if ( seodo_get_option( 'logo_height' ) ) {
      $logo_height = str_replace( ' ', '', seodo_get_option( 'logo_height' ) );
      $logo_height = str_replace( 'px', '', $logo_height );
      $styles .= "
				.navbar .logo a img{
					height: {$logo_height}px;
				}
			";
    }
    if ( seodo_get_option( 'pageheader_height' ) ) {
      $pageheader_height = str_replace( ' ', '', seodo_get_option( 'pageheader_height' ) );
      $styles .= "
				.page-header{
					height: {$pageheader_height};
				}
			";
    }
    if ( seodo_get_option( 'enable_dynamic_color' ) ) {

      $site_color = ( seodo_get_option( 'theme_color' ) ) ? seodo_get_option( 'theme_color' ) : '#009a4e';
      $site_color2 = ( seodo_get_option( 'theme_color2' ) ) ? seodo_get_option( 'theme_color2' ) : '#fbc50b';
      $body_bg_color = ( seodo_get_option( 'body_background_color' ) ) ? seodo_get_option( 'body_background_color' ) : '#009a4e';

      $styles .= "
				main{
					background: {$body_bg_color} !important;
				}
				.search-box .inner form input[type='submit'],
				.navbar,
				.header .main-slider .swiper-slide .slide-inner a:hover,
				.custom-button:hover,
				.side-image .big-note-box,
				.carousel-image-box .swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active,
				.timeline-image:after,
				.carousel-testimonials .swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active,
				.testimonial,
				.blog-post .post-content blockquote,
				.sidebar .widget-title:after,
				.sidebar .categories li:before,
				.contact-form,
				.blog-post .post-content .post-tags li a,
				.blog-post .post-content blockquote,
				.blog-post .post-content .wp-block-quote,
				.blog-post .post-content .wp-block-calendar #today,
				.blog-post .post-content .wp-block-tag-cloud a:hover,
				.blog-post .post-content .post-navigation .navigation .nav-links .nav-previous:before,
				.blog-post .post-content .post-navigation .navigation .nav-links .nav-next:after,
				.blog-post .post-content blockquote,
				.post-comment .comment-list .comment .comment-content .comment-reply-link:hover,
				.sidebar .widget_calendar table tbody #today,
				.sidebar .widget_calendar table tbody td a,
				.sidebar .widget_calendar table tbody #today,
				.sidebar .widget_tag_cloud .tagcloud a,
				.side-widget .widget_calendar caption,
				.side-widget .widget_calendar table tbody td a,
				.side-widget .widget_tag_cloud .tagcloud a,
				.woocommerce ul.products li.product .onsale,
				.woocommerce span.onsale
				{
					background-color: {$site_color} !important;
				}
				
				.side-slider .note-box,
				.side-content h2,
				.side-content h5,
				.side-image .video-button,
				.image-content-box h5,
				.counter-box .odometer,
				.side-content-image-box .content h4,
				.services-list-box h2,
				.sidebar .widget-title,
				.blog-post .post-content .post-title a:hover,
				.blog-post .post-content .link-more:hover,
				.sidebar .widget-title,
				.post-comment .comment-form .comment-respond form label,
				.sidebar .widget_calendar caption
				
				
				{
				  color: {$site_color} !important;
				}
				
				.blog-post .post-content .post-categories li a:hover,
				.blog-post .post-content u
				{
				  border-color: {$site_color} !important;
				}
				
				.side-image .big-note-box:after,
				.testimonial:before
				
				{
				
				border-color: transparent transparent  {$site_color} transparent !important;
				}
				
				input[type='submit'], input[type='button'], button[type='button'], button[type='submit'],
				.swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active,
				.preloader,
				.page-transition,
				.topbar .text:before,
				.navbar .site-menu ul li ul,
				.navbar .site-menu ul li a:after,
				.header .main-slider .swiper-slide .slide-inner a,
				.header .button-prev:hover,
				.header .button-next:hover,
				.custom-link:before,
				.custom-button,
				.side-slider .swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active,
				.icon-box:hover,
				.circle-icon-box:after,
				.experts-box h6:after,
				.accordion-box h6:after,
				.accordion .card [aria-expanded='true'],
				.cd-horizontal-timeline .filling-line,
				.latest-news figure span,
				.highlight-slider .custom-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active,
				.blog-post .post-content .post-date,
				.blog-post.sticky:before,
				.blog-post .post-content .post-tags li a:hover,
				.sidebar .widget .widget-title:after,
				.cd-horizontal-timeline .events a.selected::after
				
				{
				  background-color: {$site_color2} !important;
				}
				
				
				.side-widget .social-media li a:hover,
				.topbar .social-media ul li a:hover,
				.experts-slider figure figcaption ul li a:hover,
				.accordion .card .card-header a:hover,
				.cd-horizontal-timeline .events a.older-event,
				.cd-horizontal-timeline .events a.selected,
				.footer .footer-bottom span:last-child a
				
				{
				  color: {$site_color2} !important;
				}
				
				.side-widget .widget-title,
				.section-title.text-left h6,
				.image-caption-box .content small,
				.carousel-image-box .content small,
				.cd-horizontal-timeline .events a.selected::after,
				.footer,
				.footer .widget-title
				
				{
				  border-color: {$site_color2} !important;
				}
				
				.navbar .site-menu ul li ul:after
				
				{
				  border-color:transparent transparent {$site_color2} transparent !important;
				}
				
				
				
			";
    }

    return $styles;
  }
}


add_action( 'init', 'seodo_dynamic_css' );
add_action(
  'after_setup_theme',
  function () {
    add_theme_support( 'html5', [ 'script', 'style' ] );
  }
);