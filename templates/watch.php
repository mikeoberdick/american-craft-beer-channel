<?php /* Template Name: Watch */ 

//Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

 get_header(); ?>

<div id="content" class = "page-wrapper" tabindex="-1">
	<main id="main" class="site-main">
		<div id="watch">
			
			<?php $hero = get_field('hero_image'); ?>
			<div id="hero" style = "background: url('<?php echo $hero['url']; ?>');">
				<div id="contentContainer">
					<div class="container">
						<div class="row mb-3">
							<div id = "logo" class="col-lg-4 offset-lg-1 col-xl-3 offset-xl-3">
								<?php $logo = get_field('logo', 'option'); ?>
								<img class = "mb-3 mb-lg-0" src="<?php echo $logo['url'];; ?>" alt="<?php echo $logo['alt']; ?>">
							</div><!-- .col-xl-3 -->
							<div id = "buttons" class="col-lg-6 col-xl-3">
								<a target = "_blank" href = "<?php echo the_field('roku_url', 'option'); ?>"><button role = "button" class = "w-100 roboto btn purple-button">Watch Now on <img src="<?php echo get_stylesheet_directory_uri() . '/img/roku.png'; ?>" alt="Roku"></button></a>
								<a target = "_blank" href = "<?php echo the_field('youtube_url', 'option'); ?>"><button role = "button" class = "w-100 roboto btn red-button">Watch Now on <img src="<?php echo get_stylesheet_directory_uri() . '/img/youtube_small.png'; ?>" alt="YouTube"></button></a>
							</div><!-- .col-xl-3 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- #contentContainer -->
			</div><!-- #hero -->

			<div id="featuredVideos" class = "py-5">
				<div class="container">
					<div class="row mb-3">
						<div class="col-sm-12 text-center">
							<h3 class = "text-white">Watch Now</h3>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
					<div class="row">
						<?php $videos = get_field('featured_videos'); ?>
						<?php foreach( $videos as $post ) : setup_postdata($post); ?>
							<div class="col-md-6">
								<div class="video-wrapper h-100">
									<div class="embed-responsive embed-responsive-16by9">
										<?php the_field('video_link'); ?>
									</div><!-- .embed-responsive -->
									<div class="video-content-wrapper p-3">
										<h5 class = "mb-3"><?php the_title(); ?></h5>
										<p class = "small"><?php the_field('description'); ?></p>	
									</div><!-- .video-content-wrapper -->
								</div><!-- .video-wrapper -->
							</div><!-- .col-md-6 -->
						<?php endforeach; wp_reset_postdata(); ?>
					</div><!-- .row -->
				</div><!-- .container -->
			</div><!-- #featuredVideos -->
		</div><!-- #watch -->
	</main><!-- #main -->
</div><!-- #content -->

<?php get_footer(); ?>