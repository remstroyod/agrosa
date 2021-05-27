<?php
/**
 * Bovos functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package seodo
 */

if ( !function_exists( 'seodo_setup' ) ):
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function seodo_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Anchor, use a find and replace
     * to change  'seodo' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'seodo', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );


    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    add_image_size( 'seodo-post-thumb-small', 1015, 698, true );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );
  }
endif;
add_action( 'after_setup_theme', 'seodo_setup' );
if ( !isset( $content_width ) )$content_width = 900;

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function seodo_content_width() {
  // This variable is intended to be overruled from themes.
  // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
  // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
  $GLOBALS[ 'content_width' ] = apply_filters( 'seodo_content_width', 640 );
}
add_action( 'after_setup_theme', 'seodo_content_width', 0 );



/**
 * Post link read more text content.
 */
function seodo_post_link() {
  return '<a class="link-more" title="' . get_the_title() . '" href="' . esc_url( get_permalink() ) . '">' . sprintf( esc_html__( 'READ MORE', 'seodo' ) ) . '</a>';
}
add_filter( 'the_content_more_link', 'seodo_post_link' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function seodo_widgets_init() {
  register_sidebar( array(
    'name' => esc_html__( 'Aside Bar', 'seodo' ),
    'id' => 'aside-bar',
    'description' => esc_html__( 'Add widgets here.', 'seodo' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="widget-title">',
    'after_title' => '</h6>',
  ) );

  register_sidebar( array(
    'name' => esc_html__( 'Sidebar', 'seodo' ),
    'id' => 'sidebar-1',
    'description' => esc_html__( 'Add widgets here.', 'seodo' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="widget-title">',
    'after_title' => '</h6>',
  ) );

  register_sidebar( array(
    'name' => esc_html__( 'Footer 1', 'seodo' ),
    'id' => 'footer-widget-1',
    'before_widget' => '<div class="widget footer-widget">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="widget-title">',
    'after_title' => '</h6>',
  ) );

  register_sidebar( array(
    'name' => esc_html__( 'Footer 2', 'seodo' ),
    'id' => 'footer-widget-2',
    'before_widget' => '<div class="widget footer-widget">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="widget-title">',
    'after_title' => '</h6>',
  ) );

  register_sidebar( array(
    'name' => esc_html__( 'Footer 3', 'seodo' ),
    'id' => 'footer-widget-3',
    'before_widget' => '<div class="widget footer-widget">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="widget-title">',
    'after_title' => '</h6>',
  ) );

  register_sidebar( array(
    'name' => esc_html__( 'Footer 4', 'seodo' ),
    'id' => 'footer-widget-4',
    'before_widget' => '<div class="widget footer-widget">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="widget-title">',
    'after_title' => '</h6>',
  ) );
	
	register_sidebar( array(
    'name' => esc_html__( 'Footer 5', 'seodo' ),
    'id' => 'footer-widget-5',
    'before_widget' => '<div class="widget footer-widget">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="widget-title">',
    'after_title' => '</h6>',
  ) );

}
add_action( 'widgets_init', 'seodo_widgets_init' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
  require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Enqueue styles and scripts.
 */
require_once get_template_directory() . '/inc/styles-and-scripts.php';

/**
 * Register nav menus
 */
require_once get_template_directory() . '/inc/nav-menus.php';

/**
 * Custom menu walker.
 */
require_once get_template_directory() . '/inc/class.custom-menu-walker.php';
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

require_once get_template_directory() . '/inc/tgm.php';

if ( !function_exists( 'seodo_get_the_post_excerpt' ) ) {
  /**
   * This function makes excerpt for the post.
   *
   * @param integer $limit of charachers
   * @return string
   */
  function seodo_get_the_post_excerpt( $string, $limit = 70, $more = '...', $break_words = false ) {
    if ( $limit == 0 ) return '';

    if ( mb_strlen( $string, 'utf8' ) > $limit ) {
      $limit -= mb_strlen( $more, 'utf8' );

      if ( !$break_words ) {
        $string = preg_replace( '/\s+\S+\s*$/su', '', mb_substr( $string, 0, $limit + 1, 'utf8' ) );
      }

      return '<p>' . mb_substr( $string, 0, $limit, 'utf8' ) . $more . '</p>';
    } else {

      return '<p>' . $string . '</p>';
    }
  }

}

if ( !function_exists( 'seodo_posted_date_with_tags' ) ) {

  function seodo_posted_date_with_tags() {

    echo sprintf( esc_html__( 'Posted %s', 'seodo' ), get_the_date( 'j F Y' ) );

    $tags = get_the_tags();
    if ( false !== $tags ) {
      foreach ( $tags as $tag ) {
        $link = get_tag_link( $tag->term_id );
        $data[] = '<a href="' . $link . '">' . $tag->name . '</a>';
      }

      echo ' | ' . implode( ', ', $data );
    }
  }
}

if ( !function_exists( 'seodo_move_comment_field_to_bottom' ) ) {
  function seodo_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields[ 'comment' ];
    unset( $fields[ 'comment' ] );
    $fields[ 'comment' ] = $comment_field;

    return $fields;
  }

  add_filter( 'comment_form_fields', 'seodo_move_comment_field_to_bottom' );
}

if ( !function_exists( 'seodo_bootstrap_comment' ) ) {
  /**
   * Custom callback for comment output
   *
   */
  function seodo_bootstrap_comment( $comment, $args, $depth ) {
    $GLOBALS[ 'comment' ] = $comment;

    $comment_link_args = array(
      'add_below' => 'comment',
      'respond_id' => 'respond',
      'reply_text' => esc_html__( 'Reply', 'seodo' ),
      'login_text' => esc_html__( 'Log in to Reply', 'seodo' ),
      'depth' => 1,
      'before' => '',
      'after' => '',
      'max_depth' => 5
    );
    ?>
<?php if ( $comment->comment_approved == '1' ): ?>
<li class="comment">
  <figure class="comment-avatar"><?php echo get_avatar( $comment ); ?></figure>
  <div class="comment-content">
    <h4>
      <?php comment_author_link() ?>
    </h4>
    <p>
      <?php comment_text() ?>
    </p>
    <small>
    <?php comment_date() ?>
    </small>
    <?php
    comment_reply_link( $comment_link_args );
    ?>
  </div>
</li>
<?php
endif;
}

}

if ( !function_exists( 'seodo_get_option' ) ) {

  function seodo_get_option( $slug ) {
    if ( function_exists( 'get_field' ) ) {
      return get_field( $slug, 'option' );
    }

    return false;
  }
}

if ( !function_exists( 'seodo_get_field' ) ) {

  function seodo_get_field( $slug, $post_id = 0 ) {
    if ( function_exists( 'get_field' ) ) {
      return get_field( $slug, $post_id );
    }

    return false;
  }
}


if ( !function_exists( 'seodo_pagination' ) ) {
  function seodo_pagination() {
    global $wp_query;
    echo paginate_links();
  }
}


if ( !function_exists( 'seodo_get_post_thumbnail_url' ) ) {
  /**
   * Get Post Thumbnail URL
   */
  function seodo_get_post_thumbnail_url() {
    if ( get_the_post_thumbnail_url() ) {
      return get_the_post_thumbnail_url( get_the_ID(), 'seodo-post-thumb-small' );
    }

    return false;
  }
}

if ( !function_exists( 'seodo_get_page_title' ) ) {

  function seodo_get_page_title() {
    $title = '';

    if ( is_category() ) {
      $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
      $title = single_term_title( "", false ) . esc_html__( 'Tag', 'seodo' );
    } elseif ( is_date() ) {
      $title = get_the_time( 'F Y' );
    } elseif ( is_author() ) {
      $title = esc_html__( 'Author:', 'seodo' ) . ' ' . esc_html( get_the_author() );
    } elseif ( is_search() ) {
      $title = esc_html__( 'Search Result', 'seodo' );
    } elseif ( is_404() ) {
      $title = esc_html__( 'Page not found', 'seodo' );
    } elseif ( is_archive() ) {
      $title = esc_html__( 'Archive', 'seodo' );
    } elseif ( is_home() || is_front_page() ) {
      if ( is_home() && !is_front_page() ) {
        $title = esc_html( single_post_title( '', false ) );
      } else {
        $title = ( seodo_get_option( 'archive_blog_title' ) ) ? esc_html( seodo_get_option( 'archive_blog_title' ) ) : esc_html__( 'Blog', 'seodo' );
      }
    } else {
      global $post;
      if ( !empty( $post ) ) {
        if ( $post->post_type == 'post' ) {
          $title = ( seodo_get_option( 'archive_blog_title' ) ) ? esc_html( seodo_get_option( 'archive_blog_title' ) ) : esc_html__( 'Blog', 'seodo' );
        } else {
          $id = $post->ID;
          $title = esc_html( get_the_title( $id ) );
        }
      } else {
        $title = esc_html__( 'Post not found.', 'seodo' );
      }
    }

    return $title;
  }

}

if ( !function_exists( 'seodo_get_archive_description' ) ) {
  function seodo_get_archive_description() {
    $description = '';

    if ( is_home() || is_front_page() ) {
      $description = ( seodo_get_option( 'archive_blog_description' ) ) ? esc_html( seodo_get_option( 'archive_blog_description' ) ) : '';
    } elseif ( is_category() || is_tag() || is_author() || is_post_type_archive() || is_archive() ) {
      $description = get_the_archive_description();
    }

    return $description;
  }
}
if ( !function_exists( 'seodo_render_page_header' ) ) {

  function seodo_render_page_header( $type ) {

    $show_header = true;
    $header_style = '';
    $header_title = '';
    $header_description = '';
    $enable_social_icons = true;
    $header_bg_video = '';
    $header_bg_image = '';

    switch ( $type ) {
      case 'page':
        $show_header = false;
        if ( seodo_get_field( 'show_page_header' ) !== 'no' ) {
          $show_header = true;

          if ( seodo_get_field( 'header_title_type' ) === 'custom' ) {
            $header_title = seodo_get_field( 'header_title' );
          } else {
            $header_title = get_the_title();
          }

          $header_bg_type = seodo_get_field( 'header_bg_type' ) ? seodo_get_field( 'header_bg_type' ) : 'image';
          $header_bg_color = seodo_get_field( 'header_bg_color' ) ? seodo_get_field( 'header_bg_color' ) : '#5513a0';
          $header_bg_image = seodo_get_field( 'header_bg_image' ) ? seodo_get_field( 'header_bg_image' ) : '';

          if ( $header_bg_image && $header_bg_type == 'image' ) {
            $header_style = 'background-image: url(' . esc_url( $header_bg_image ) . ')';
          } else {
            $header_style = 'background-color: ' . $header_bg_color . ';';
          }

          if ( $header_bg_type == 'video' ) {
            $header_bg_video = seodo_get_field( 'header_bg_video' ) ? seodo_get_field( 'header_bg_video' ) : '';
          }

          $header_description = seodo_get_field( 'description' );
          $enable_social_icons = ( seodo_get_field( 'disable_social_icons' ) ) ? false : true;
        }

        break;
      case 'work':

        $show_header = true;

        if ( seodo_get_field( 'header_title_type' ) === 'custom' ) {
          $header_title = seodo_get_field( 'header_title' );
        } else {
          $header_title = get_the_title();
        }

        $header_bg_type = seodo_get_field( 'header_bg_type' ) ? seodo_get_field( 'header_bg_type' ) : 'image';
        $header_bg_color = seodo_get_field( 'header_bg_color' ) ? seodo_get_field( 'header_bg_color' ) : '#5513a0';
        $header_bg_image = seodo_get_field( 'header_bg_image' ) ? seodo_get_field( 'header_bg_image' ) : '';

        if ( $header_bg_image && $header_bg_type == 'image' ) {
          $header_style = 'background-image: url(' . esc_url( $header_bg_image ) . ') ';
        } else {
          $header_style = 'background-color: ' . $header_bg_color . ';';
        }

        

        $header_description = seodo_get_field( 'description' );
        $enable_social_icons = ( seodo_get_field( 'disable_social_icons' ) ) ? false : true;
        break;
      case 'archive':
      case 'single':
      case 'frontpage':
        $header_description = seodo_get_archive_description();
        $header_title = seodo_get_page_title();
        $header_bg_type = seodo_get_option( 'archive_header_bg_type' ) ? seodo_get_option( 'archive_header_bg_type' ) : 'image';
        $header_bg_color = seodo_get_option( 'archive_header_bg_color' ) ? seodo_get_option( 'archive_header_bg_color' ) : '#5513a0';
        $header_bg_image = seodo_get_option( 'archive_header_bg_image' ) ? seodo_get_option( 'archive_header_bg_image' ) : '';

        if ( $header_bg_image && $header_bg_type == 'image' ) {
          $header_style = 'background-image: url(' . esc_url( $header_bg_image ) . ') ';
        } else {
          $header_style = 'background-color: ' . $header_bg_color . ';';
        }
        if ( $header_bg_type == 'video' ) {
          $header_bg_video = seodo_get_option( 'archive_header_bg_video' ) ? seodo_get_option( 'archive_header_bg_video' ) : '';
        }

        break;
      case '404':
        $header_title = seodo_get_page_title();

        $header_bg_type = seodo_get_option( 'page_404_header_bg_type' ) ? seodo_get_option( 'page_404_header_bg_type' ) : 'image';
        $header_bg_color = seodo_get_option( 'page_404_header_bg_color' ) ? seodo_get_option( 'page_404_header_bg_color' ) : '#5513a0';
        $header_bg_image = seodo_get_option( 'page_404_header_bg_image' ) ? seodo_get_option( 'page_404_header_bg_image' ) : '';

        if ( $header_bg_image && $header_bg_type == 'image' ) {
          $header_style = 'background-image: url(' . esc_url( $header_bg_image ) . ') ';
        } else {
          $header_style = 'background-color: ' . $header_bg_color . ';';
        }

        if ( $header_bg_type == 'video' ) {
          $header_bg_video = seodo_get_option( 'page_404_header_bg_video' ) ? seodo_get_option( 'page_404_header_bg_video' ) : '';
        }

        break;
      case 'search':
        $header_title = seodo_get_page_title();
        $header_description = sprintf( __( 'Search result for: %s ', 'seodo' ), '' . get_search_query() . '' );

        $header_bg_type = seodo_get_option( 'search_header_bg_type' ) ? seodo_get_option( 'search_header_bg_type' ) : 'image';
        $header_bg_color = seodo_get_option( 'search_header_bg_color' ) ? seodo_get_option( 'search_header_bg_color' ) : '#5513a0';
        $header_bg_image = seodo_get_option( 'search_header_bg_image' ) ? seodo_get_option( 'search_header_bg_image' ) : '';

        if ( $header_bg_image && $header_bg_type == 'image' ) {
          $header_style = 'background-image: url(' . esc_url( $header_bg_image ) . ') ';
        } else {
          $header_style = 'background-color: ' . $header_bg_color . ';';
        }

        if ( $header_bg_type == 'video' ) {
          $header_bg_video = seodo_get_option( 'search_header_bg_video' ) ? seodo_get_option( 'search_header_bg_video' ) : '';
        }
        break;
    }

    if ( $show_header ) {

      ?>
<header class="page-header" data-stellar-background-ratio="0.7" <?php if ( $header_style !== '' ) { echo 'style="' . esc_attr( $header_style ) . '"'; } ?>>
 
  <div class="container">
    <h2><?php echo esc_html( $header_title ); ?></h2>
    <?php if( $header_description ) { ?>
    <p><?php echo esc_html( $header_description ); ?></p>
    <?php } ?>
  </div>
  
</header>
<!-- end page-header -->
<?php
}

}
}


if ( !function_exists( 'seodo_post_tags' ) ) {

  function seodo_post_tags() {

    $tags = get_the_tags();
    if ( false !== $tags ) {
      ?>
<ul class="post-categories">
  <?php
  foreach ( $tags as $tag ) {
    $link = get_tag_link( $tag->term_id );
    ?>
  <li><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $tag->name ); ?></a></li>
  <?php
  }
  ?>
</ul>
<?php
}
}
}

if ( !function_exists( 'seodo_get_wpml_langs' ) ) {

  function seodo_get_wpml_langs() {

    if ( function_exists( 'icl_get_languages' ) ) {
      $langs = icl_get_languages( 'skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str' );
      if ( $langs ) {
        ?>
<ul class="languages">
  <?php foreach ( $langs as $lang ) { ?>
  <li <?php if( $lang['active'] === 1 ) { ?> class="active" <?php } ?>> <a href="<?php echo esc_url( $lang['url'] ); ?>" title="<?php echo esc_attr__( $lang['native_name'],  'seodo' ); ?>"><?php echo esc_html( strtoupper( $lang['language_code'] ) ); ?></a> </li>
  <?php } ?>
</ul>
<?php
}
}

}
}

if ( !function_exists( 'wp_body_open' ) ) {
  function wp_body_open() {
    do_action( 'wp_body_open' );
  }
}

function seodo_import_files() {
  return array(
    array(
      'import_file_name' => 'Seodo Demo Import',
      'import_file_url' => 'http://seodo.themezinho.net/import/demo-data.xml',
      'import_widget_file_url' => 'http://seodo.themezinho.net/import/widgets.wie',
      'import_notice' => esc_html__( 'With one click import demo content.', 'seodo' ),
    ),
  );

}
add_filter( 'pt-ocdi/import_files', 'seodo_import_files' );

function seodo_after_import_setup() {
  // Assign menus to their locations.
  $main_menu = get_term_by( 'name', esc_html__( 'Main Menu', 'seodo' ), 'nav_menu' );
  set_theme_mod( 'nav_menu_locations', array(
    'header' => $main_menu->term_id,
  ) );

  // Assign front page and posts page (blog page).
  $front_page_id = get_page_by_title( 'Home' );
  $blog_page_id = get_page_by_title( 'News' );

  update_option( 'show_on_front', 'page' );
  update_option( 'page_on_front', $front_page_id->ID );
  update_option( 'page_for_posts', $blog_page_id->ID );

  if ( function_exists( 'seodo_after_import' ) ) {
    seodo_after_import();
  }
}


add_action( 'pt-ocdi/after_import', 'seodo_after_import_setup' );
add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );
add_action( 'pt-ocdi/disable_pt_branding', '__return_true' );
