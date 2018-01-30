<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

    <div class="<?php echo esc_attr( $container ); ?>">

	<div class="row">

	    <div class="col-md-12">

		<footer class="site-footer" id="colophon">

		    <div class="site-info">

			<?php printf ('Powered by KCC') ?>

      <span class="sep">  </span>


		    </div><!-- .site-info -->

		</footer><!-- #colophon -->

	    </div><!--col end -->

	</div><!-- row end -->

    </div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>
<script id="__bs_script__">//<![CDATA[
 document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.18.13'><\/script>".replace("HOST", location.hostname));
 //]]></script>
</body>

</html>
