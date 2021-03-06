<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package seodo
 */

if ( !function_exists( 'seodo_posted_on' ) ):
  /**
   * Prints HTML with meta information for the current post-date/time.
   */
  function seodo_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
      $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf( $time_string,
      esc_attr( get_the_date( DATE_W3C ) ),
      esc_html( get_the_date() ),
      esc_attr( get_the_modified_date( DATE_W3C ) ),
      esc_html( get_the_modified_date() )
    );

    $posted_on = sprintf(
      /* translators: %s: post date. */
      esc_html_x( 'Posted on %s', 'post date', 'seodo' ),
      '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
    );

    echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

  }
endif;

if ( !function_exists( 'seodo_posted_by' ) ):
  /**
   * Prints HTML with meta information for the current author.
   */
  function seodo_posted_by() {

    $author_detail = sprintf(
      /* translators: %s: post author. */
      esc_html_x( '%s %s %s', 'post author', 'seodo' ),
      '<img src="' . get_avatar_url( get_the_author_meta( "user_email" ) ) . '" alt="' . esc_attr( get_the_author() ) . '">', '<span>', ' by <b>' . esc_html( get_the_author() ) . '</b></span>'
    );

    echo '<div class="author post-author">' . $author_detail . '</div>';

  }
endif;

if ( !function_exists( 'seodo_entry_footer' ) ):
  /**
   * Prints HTML with meta information for the categories, tags and comments.
   */
  function seodo_entry_footer() {
    // Hide category and tag text for pages.
    if ( 'post' === get_post_type() ) {
      /* translators: used between list items, there is a space after the comma */
      $categories_list = get_the_category_list( esc_html__( ', ', 'seodo' ) );
      if ( $categories_list ) {
        /* translators: 1: list of categories. */
        printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'seodo' ) . '</span>', $categories_list ); // WPCS: XSS OK.
      }

      /* translators: used between list items, there is a space after the comma */
      $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'seodo' ) );
      if ( $tags_list ) {
        /* translators: 1: list of tags. */
        printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'seodo' ) . '</span>', $tags_list ); // WPCS: XSS OK.
      }
    }

    if ( !is_single() && !post_password_required() && ( comments_open() || get_comments_number() ) ) {
      echo '<span class="comments-link">';
      comments_popup_link(
        sprintf(
          wp_kses(
            /* translators: %s: post title */
			wp_specialchars_decode(esc_html__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'seodo' )),  
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          ),
          get_the_title()
        )
      );
      echo '</span>';
    }

    edit_post_link(
      sprintf(
        wp_kses(
          /* translators: %s: Name of current post. Only visible to screen readers */
			wp_specialchars_decode(esc_html__( 'Edit <span class="screen-reader-text">%s</span>', 'seodo' )),
          array(
            'span' => array(
              'class' => array(),
            ),
          )
        ),
        get_the_title()
      ),
      '<span class="edit-link">',
      '</span>'
    );
  }
endif;

if ( !function_exists( 'seodo_post_thumbnail' ) ):
  /**
   * Displays an optional post thumbnail.
   *
   * Wraps the post thumbnail in an anchor element on index views, or a div
   * element when on single views.
   */
  function seodo_post_thumbnail() {
    if ( post_password_required() || is_attachment() || !has_post_thumbnail() ) {
      return;
    }


    if ( is_singular() ):
      if ( seodo_get_post_thumbnail_url() ):
        ?>
<figure class="post-image"> <img src="<?php echo esc_url( seodo_get_post_thumbnail_url() ); ?>" alt="<?php the_title_attribute(); ?>"> </figure>
<?php
endif;
else :?>
<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
<?php
the_post_thumbnail( 'post-thumbnail', array(
  'alt' => the_title_attribute( array(
    'echo' => false,
  ) ),
) );
?>
</a>
<?php
endif; // End is_singular().
}
endif;
