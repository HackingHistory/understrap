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

				  <?php understrap_show_cards(); ?>
					<!-- // If comments are open or we have at least one comment, load up the comment template.
					// if ( comments_open() || get_comments_number() ) :
					// 	comments_template();
					// endif; -->


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

	<?php

	$args = array(
   'post_type' => 'post',
   'orderby'   => 'rand',
   'posts_per_page' => 3,
   );

	 $the_query = new WP_Query( $args );

	 if ($the_query->have_posts() ) {
		 while ($the_query->have_posts() ) {
		          $the_query->the_post();

			?>

	<div class="card">
    <?php the_post_thumbnail('medium', ['class' => 'card-img-top'])?>
    <div class="card-body">
      <h5 class="card-title"><?php the_title()?></h5>
      <p class="card-text"><?php the_excerpt()?></p>
    </div>
  </div>


	<?php

		}
	} else {print("no posts oops");}
	?>

</div>


<?php get_footer(); ?>
