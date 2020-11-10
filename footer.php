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

<footer class = "container-fluid">
		<div class="row">
			<div class="col-sm-12 text-center">
				<div class = "d-inline-flex mb-3">
					<a class = "social-link facebook mr-2" rel="noreferrer" target = "_blank" href="<?php the_field('facebook_url', 'options') ?>"><i class="fa fa-facebook" aria-hidden="true"></i><span class = "sr-only sr-only-focusable">Facebook</span></a>
					<a class = "social-link twitter mr-2" rel="noreferrer" target = "_blank" href="<?php the_field('twitter_url', 'options') ?>"><i class="fa fa-twitter" aria-hidden="true"></i><span class = "sr-only sr-only-focusable">Twitter</span></a>
					<a class = "social-link linkedin" rel="noreferrer" target = "_blank" href="<?php the_field('linkedin_url', 'options') ?>"><i class="fa fa-linkedin" aria-hidden="true"></i><span class = "sr-only sr-only-focusable">Linked In</span></a>	
				</div>
				<p class = "mb-0">&copy <?php echo bloginfo('name'); ?></p>
				<p class = "mb-0">Website designed and developed by <a rel="noreferrer" target = "_blank" href = "https://designs4theweb.com" alt = "Designs 4 The Web WordPress Website Builders">Designs 4 The Web</a></p>
			</div><!--col-md-12 -->
		</div><!-- row -->
	</footer>

<?php wp_footer(); ?>

</body>

</html>