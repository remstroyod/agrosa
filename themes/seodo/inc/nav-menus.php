<?php

if( ! function_exists( 'seodo_register_nav_menus' ) ) {
	/**
	 * Register required nav menus
	 */
	function seodo_register_nav_menus() {

		register_nav_menus( array(
			'header' => esc_html__( 'Main menu',  'seodo' ),
		) );
		

	}
	add_action( 'after_setup_theme', 'seodo_register_nav_menus' );
}