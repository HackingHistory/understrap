<?php
  /**
   * Custom template tags for this theme.
   *
   * Eventually, some of the functionality here could be replaced by core features.
   *
   * @package understrap
   */


  if ( ! function_exists( 'understrap_show_cards' ) ) :
  /**
   * Returns a series of posts as a set of Bootstrap cards.
   */
  function understrap_show_cards() {
    /**
     *  Note that the function version of this code is somewhat more complex
     *  because we have to assemble the html as a string and then echo it,
     * rather than using the `the_title` type functions.
     */

    /* set up the query */
    $args = array(
      'post_type' => 'page',
      'orderby'   => 'rand',
      'posts_per_page' => 3,
    );

    $the_query = new WP_Query( $args );
    /* a variable to hold the output */
    $html_out = "";
    $card_open = '    <div class="card">' . "\n";
    $card_close = '    </div>' . "\n";

    if ($the_query->have_posts() ) {
      $html_out .= '<div class="card-deck">';
      while ($the_query->have_posts() ) {
        $the_query->the_post();
        $linkopen = '<a href="' . get_page_link()  . '">';
        $html_out .=   $card_open;
        $html_out .= "      " . get_the_post_thumbnail(null, 'medium', ['class' => 'card-img']);
        $html_out .= '     ' . $linkopen . '<div class="card-img-overlay">' . "\n         " . '<h5 class="card-title">' ;
        $html_out .= get_the_title() . "</h5>\n";
        $html_out .= '<p class="card-test">' . wp_trim_words(get_the_excerpt(), "15") . "</p>\n     </div></a>";
        $html_out .= $card_close . '</a>';
      }
      $html_out .= "</div>\n";
    }
    echo $html_out;
  }
  endif;

  if ( ! function_exists( 'themename_custom_logo_setup' ) ) :

  function themename_custom_logo_setup() {
    $defaults = array(
      'height'      => 50,
      'width'       => 100,
      'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
  }
  endif;

  add_action( 'after_setup_theme', 'themename_custom_logo_setup' );
