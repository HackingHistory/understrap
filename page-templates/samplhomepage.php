<?php
/**
 * Template Name: Empty Page Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */

get_header();

while ( have_posts() ) : the_post();
	get_template_part( 'loop-templates/content', 'empty' );
endwhile;

<?php
/**
 * Template Name: Dual Column Landing Page
 *
 * Dual column page template. The left side image is the post's featured image.
 * Uses Bootstrap's 4 flexbox utilities.
 *
 * @package understrap
 */
global $wp_query;
$id           = $wp_query->post->ID;
$page_content = get_post($id);
$page_content = apply_filters('the_content', $post->post_content);
$the_theme    = wp_get_theme();
get_header();
if ((have_posts())) {
    while ((have_posts())) {
        the_post();
        if (has_post_thumbnail($post->ID)) {
            $featured_image = get_the_post_thumbnail_url(get_the_id(), 'full');
        }
    }
}
?>
  <div class="container-fluid">
    <div class="row" style="height: calc(100vh - 56px);">
      <div class="col-md-6"
           style="background: url(<?php echo $featured_image; ?>);no-repeat center center fixed; background-size: cover;"></div>
      <div class="col-md-6 d-flex">
        <div class="row">
          <div class="align-self-center p-2">
              <?php echo $page_content; ?>
          </div>
          <div class="col-12 align-self-end">
            <!--          our footer info and copyright-->
            <footer class="site-footer text-center" id="colophon">

              <div class="site-info">

                <a href="<?php echo esc_url(__('http://wordpress.org/', 'understrap')); ?>"><?php printf(
                    /* translators:*/
                        esc_html__('Proudly powered by %s', 'understrap'), 'WordPress'); ?></a>
                <span class="sep"> | </span>

                  <?php printf( // WPCS: XSS ok.
                  /* translators:*/
                      esc_html__('Theme: %1$s by %2$s.', 'understrap'), $the_theme->get('Name'),
                      '<a href="' . esc_url(__('http://understrap.com', 'understrap')) . '">understrap.com</a>'); ?>

                (<?php printf( // WPCS: XSS ok.
                  /* translators:*/
                      esc_html__('Version: %1$s', 'understrap'), $the_theme->get('Version')); ?>)
              </div><!-- .site-info -->

            </footer><!-- #colophon -->
          </div>
        </div>
      </div>
    </div>
  </div>

<?php wp_footer(); ?>

</body>

</html>

get_footer();
