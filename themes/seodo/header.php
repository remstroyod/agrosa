<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php
$copyright = seodo_get_option( 'footer_copyright_text' );

if ( !$copyright ) {
  $copyright = esc_html__( '&copy; 2020 Seodo | Agriculture Farming Foundation', 'seodo' );
}

$enable_search = ( seodo_get_option( 'disable_search' ) ) ? false : true;
$enable_topbar = ( seodo_get_option( 'disable_navbar_button' ) ) ? false : true;
$topbar_social_media = seodo_get_option( 'topbar_social_media' );
$topbar_phone = seodo_get_option( 'topbar_phone' );

$logo = ( seodo_get_option( 'logo' ) ) ? seodo_get_option( 'logo' ) : get_template_directory_uri() . '/images/logo@2x.png';
$retina_logo = ( seodo_get_option( 'retina_logo' ) ) ? seodo_get_option( 'retina_logo' ) : '';
$pre_loader_icon = get_template_directory_uri() . '/images/preloader.gif';

?>
<?php
if ( seodo_get_option( 'enable_page_transition' ) ):
  ?>
<div class="preloader"> 
	<img src="<?php echo esc_url( $pre_loader_icon ); ?>" alt="<?php bloginfo( 'name' ); ?>"> </div>
<!-- end preloader -->
<div class="page-transition"></div>
<!-- end page-transition -->

<?php endif; ?>
<div class="search-box">
  <div class="inner">
    <form action="<?php echo esc_url(home_url('/')); ?>">
      <input type="search" placeholder="<?php echo esc_attr__( 'Type here to search', 'seodo' );?>" value="<?php echo get_search_query() ?>" name="s" id="s">
      <input type="submit" value="<?php echo esc_attr__( 'SEARCH', 'seodo' );?>">
    </form>
  </div>
</div>
<!-- end search-box -->
	
<aside class="side-widget">
  <div class="inner">
    <div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $logo ); ?>"
	<?php if( $retina_logo != '' ) : ?>
		srcset="<?php echo esc_url( $retina_logo ); ?>"
	<?php endif; ?>
		alt="<?php bloginfo( 'name' ); ?>"></a></div>
    <div class="hide-mobile">
      <?php if( is_active_sidebar( 'aside-bar' ) ) : ?>
      <?php dynamic_sidebar( 'aside-bar' ); ?>
      <?php endif; ?>
    </div>
    <!-- end hide-mobile -->
    <div class="show-mobile">
      <?php
      if ( seodo_get_option( 'custom_menu' ) ):
        ?>
      <div class="custom-menu">
        <ul>
          <?php foreach ( $custom_menu as $menu ) { ?>
          <li> <a href="<?php echo esc_url( $menu['url'] ); ?>"><?php echo esc_html( $menu['label'] ); ?></a> </li>
          <?php } ?>
        </ul>
      </div>
      <?php endif; ?>
      <div class="site-menu">
        <?php
        if ( has_nav_menu( 'header' ) ) {
          wp_nav_menu( array(
            'theme_location' => 'header',
            'menu_class' => 'menu-horizontal',
            'walker' => new WP_Consto_Navwalker(),
          ) );
        }
        ?>
      </div>
    </div>
    <!-- end show-mobile --> 
    <small><?php echo esc_html( $copyright ); ?></small> </div>
  <!-- end inner --> 
</aside>
<!-- end side-widget -->	
	
<?php if ( seodo_get_option( 'enable_topbar' ) ): ?>
<div class="topbar">
  <div class="container">
    <div class="text"><?php echo esc_html( seodo_get_option( 'topbar_text' ) ); ?></div>
    <div class="social-media"> <span><?php echo esc_html( seodo_get_option( 'topbar_social_label' ) ); ?></span>
      <?php if ( seodo_get_option( 'topbar_social_media' ) ): ?>
      <ul>
        <?php foreach ( $topbar_social_media as $media ) { ?>
        <li> <a href="<?php echo esc_url( $media['url'] ); ?>"><?php echo wp_kses_post( $media['label'] ); ?></a> </li>
        <?php } ?>
      </ul>
      <!-- end social-media -->
      <?php endif; ?>
    </div>
    <div class="phone"><i class="lni lni-mobile"></i> <?php echo esc_html( seodo_get_option( 'topbar_phone' ) ); ?></div>
  </div>
  <!-- end container --> 
</div>
<!-- end topbar -->
<?php endif; ?>
	
<nav class="navbar">
  <div class="container">
    <div class="logo">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<img src="<?php echo esc_url( $logo ); ?>"
	<?php if( $retina_logo != '' ) : ?>
		srcset="<?php echo esc_url( $retina_logo ); ?>"
	<?php endif; ?>
		alt="<?php bloginfo( 'name' ); ?>"></a></div>
    <?php seodo_get_wpml_langs(); ?>
    <div class="site-menu">
      <?php
      if ( has_nav_menu( 'header' ) ) {
        wp_nav_menu( array(
          'theme_location' => 'header',
          'menu_class' => 'menu-horizontal',
          'walker' => new WP_Consto_Navwalker(),
        ) );
      }
      ?>
    </div>
    <?php if ( seodo_get_option( 'enable_search' ) ): ?>
    <div class="search-button"> <i class="lni lni-search-alt"></i> </div>
    <?php endif; ?>
    <?php if ( has_nav_menu( 'header' ) ) : ?>
    <div class="hamburger-menu"> <span></span> <span></span> <span></span> </div>
    <?php endif; ?>
  </div>
</nav>
<!-- end navbar -->