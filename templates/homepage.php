<?php /* Template Name: Homepage */ 

//Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

 get_header(); ?>

<div id="content" class = "page-wrapper" tabindex="-1">
	<main id="main" class="site-main">
		<div id="homepage">
			
			<?php $hero = get_field('hero'); ?>
			<div id="hero" style = "background: url('<?php echo $hero['background_image']['url']; ?>');">
				<div id="contentContainer">
					<div class="container">
						<div class="row mb-3">
							<div class="col-sm-4 text-md-right">
								<img src="<?php echo $hero['logo']['url']; ?>" alt="<?php echo $logo['alt']; ?>">
							</div><!-- .col-sm-4 -->
							<div class="col-sm-8">
								<h1><?php echo $hero['header']; ?></h1>
							</div><!-- .col-sm-8 -->
						</div><!-- .row -->
						<div class="row mb-3">
							<div class="col-sm-12">
								<p class = "subheader text-center"><?php echo $hero['subheader']; ?></p>
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
						<div id = "buttons" class="row">
							<div class="col-sm-12">
								<a target = "_blank" href = "<?php echo the_field('roku_url', 'option'); ?>"><button role = "button" class = "roboto btn purple-button">Watch Now on <img src="<?php echo get_stylesheet_directory_uri() . '/img/roku.png'; ?>" alt="Roku"></button></a>
								<a target = "_blank" href = "<?php echo the_field('youtube_url', 'option'); ?>"><button role = "button" class = "roboto btn red-button">Watch Now on <img src="<?php echo get_stylesheet_directory_uri() . '/img/youtube.png'; ?>" alt="YouTube"></button></a>
							</div><!-- .col-sm-12 -->	
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- #contentContainer -->
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
							<a href = "<?php echo $brewers['page_link']; ?>"><button role = "button" class = "btn outline-button">Learn More</button></a>	
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
							<a href = "<?php echo $advertisers['page_link']; ?>"><button role = "button" class = "btn outline-button">Learn More</button></a>	
						</div><!-- .content-wrapper -->
					</div><!-- .left -->
					<div class="right">
						<?php $img = $advertisers['advertiser_image']; ?>
						<img src="<?php echo $img['url']; ?>" alt="Advertise with American Craft Beer Channel">
					</div><!-- .right -->
				</div><!-- #three -->
			</div><!-- #callouts.container-fluid -->

			<div id="featuredVideos" class = "py-5">
				<div class="container">
					<div class="row mb-3">
						<div class="col-sm-12 text-center">
							<h3 class = "text-white">Recently Added</h3>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
					<div class="row">
						<?php 
							$args = array(
								'numberposts'	=> 4,
								'post_type'		=> 'video',
							);

						$videoQuery = new WP_Query( $args ); ?>

						<?php while ( $videoQuery->have_posts() ) : $videoQuery->the_post(); ?>
							<div class="col-md-6">
								
									<div class="embed-responsive embed-responsive-16by9">
										<?php the_field('video_link'); ?>
									</div><!-- .embed-responsive -->
									<div class="video-content-wrapper p-3">
										<h5 class = "mb-3"><?php the_title(); ?></h5>
										<p class = "small"><?php the_field('description'); ?></p>	
								</div><!-- .video-content-wrapper -->
							</div><!-- .col-md-6 -->
						<?php endwhile; ?>
					</div><!-- .row -->
				</div><!-- .container -->
				<?php //get the most recent four videos ?>

			</div><!-- #featuredVideos -->
		</div><!-- #homepage -->
	</main><!-- #main -->
</div><!-- #content -->

<?php get_footer(); ?>