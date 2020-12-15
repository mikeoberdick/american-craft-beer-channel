<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<div id="js-heightControl" style="height: 0;">&nbsp;</div>

<footer>
	<img src="<?php echo get_stylesheet_directory_uri() . '/img/footer_top.png'; ?>">
	<div class="container py-3">
		<div class="row">
			<div class="col-sm-12 d-flex justify-content-center align-items-center">
				<?php $logo = get_field('logo', 'options'); ?>
				<img class = "mr-3" src="<?php echo $logo['url']; ?>" alt="<?php echo get_bloginfo( 'name'); ?>">
				<div class = "text-left">
					<h6 class = "roboto watch-now">Watch Now on</h6>
					<a target = "_blank" href = "<?php the_field('roku_url', 'option'); ?>"><img src="<?php echo get_stylesheet_directory_uri() . '/img/roku.png'; ?>" alt="Roku"></a>
				<p class = "mb-0 small mt-3">&copy <?php echo date('Y'). ' ' . get_bloginfo('name') . '. ' . 'All rights reserved.'; ?></p>
				<p class = "mb-0 small">Website designed and developed by <a rel="noreferrer" target = "_blank" href = "https://designs4theweb.com" alt = "Designs 4 The Web WordPress Website Builders">Designs 4 The Web</a></p>
				</div>
			</div><!--col-md-12 -->
		</div><!-- row -->
	</div><!-- .container -->
	</footer>

<?php wp_footer(); ?>

</body>

</html>