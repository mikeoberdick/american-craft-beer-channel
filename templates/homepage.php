<?php /* Template Name: Homepage */ 

//Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

 get_header(); ?>

<div id="content" class = "page-wrapper" tabindex="-1">
	<main id="main" class="site-main">
		<div id="homepage">
			<div id="hero">
				
			</div><!-- #hero -->
			<div id="callouts">
				<?php $brewers = get_field('brewers_section'); ?>
				<div id="one" class = "d-flex flex-wrap">
					<div class = "left">
						<?php $img = $brewers['brewer_image']; ?>
						<img src="<?php echo $img['url']; ?>" alt="Submit your beer to American Craft Beer Channel">
					</div><!-- .left-->
					<div class = "right">
						<div class="content-wrapper">
							<h5>BREWERS</h5>
							<p><?php echo $brewers['copy']; ?></p>
							<a href = "<?php echo $brewers['page_link']; ?>"><button role = "button" class = "btn">Learn More</button></a>	
						</div><!-- .wrapper -->
					</div><!-- .right -->
				</div><!-- #one -->
				<div id="two" class = "d-none d-lg-flex">
					<?php $images = get_field('horizontal_images'); ?>
					<?php foreach( $images as $image ): ?>
						<img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					<?php endforeach; ?>
				</div><!-- #two -->
				<?php $advertisers = get_field('advertisers_section'); ?>
				<div id="three" class = "d-flex flex-wrap">
					<div class = "left">
						<div class="content-wrapper">
							<h5>ADVERTISERS</h5>
							<p><?php echo $advertisers['copy']; ?></p>
							<a href = "<?php echo $advertisers['page_link']; ?>"><button role = "button" class = "btn">Learn More</button></a>	
						</div><!-- .content-wrapper -->
					</div><!-- .left -->
					<div class="right">
						<?php $img = $advertisers['advertiser_image']; ?>
						<img src="<?php echo $img['url']; ?>" alt="Advertise with American Craft Beer Channel">
					</div><!-- .right -->
				</div><!-- #three -->
			</div><!-- #callouts.container-fluid -->
		</div><!-- #homepage -->
	</main><!-- #main -->
</div><!-- #content -->

<?php get_footer(); ?>