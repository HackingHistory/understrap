<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );

?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'page' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

			<?php get_sidebar( 'right' ); ?>

		<?php endif; ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<div class="card-deck">

	<div class="card">
    <img class="card-img-top" src="http://2.bp.blogspot.com/-Q9wFiQuli2s/TiQ7ekGvhgI/AAAAAAAABqo/noWcMcvvT5E/s400/Mt+kanchenjunga+5.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Card 1</h5>
      <p class="card-text">This is a longer card with additional content. This content is a little bit longer.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>

	<div class="card">
    <img class="card-img-top" src="http://2.bp.blogspot.com/-Q9wFiQuli2s/TiQ7ekGvhgI/AAAAAAAABqo/noWcMcvvT5E/s400/Mt+kanchenjunga+5.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Card 2</h5>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>

	<div class="card">
    <img class="card-img-top" src="http://2.bp.blogspot.com/-Q9wFiQuli2s/TiQ7ekGvhgI/AAAAAAAABqo/noWcMcvvT5E/s400/Mt+kanchenjunga+5.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Card 3</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>

</div>

<?php get_footer(); ?>
