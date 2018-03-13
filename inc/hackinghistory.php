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
        'post_type' => 'post',
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
            $html_out .= $card_open;
            $html_out .= "      " .  get_the_post_thumbnail(null, 'medium', ['class' => 'card-img-top']);
            $html_out .= '     <div class="card-body">' . "\n         " . '<h5 class="card-title">' ;
            $html_out .= get_the_title() . "/</h5>\n";
            $html_out .= '<p class="card-test">' . get_the_excerpt() . "</p>\n     </div>";
            $html_out .= $card_close;
        }
        $html_out .= "</div>\n";
    }
    echo $html_out;
}
endif;
