<?php /* Template Name: Advertise */ 

//Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

 get_header(); ?>

<div id="content" class = "page-wrapper" tabindex="-1">
	<main id="main" class="site-main">
		<div id="advertise">
			<div class="title container pt-5">
				<div class="row">
					<div class="col-sm-12">
						<?php $form = get_field('advertiser_form'); ?>
						<?php if( $form['title'] ) { 
							$title = $form['title'];
						} else {
							$title = get_the_title();
						} ?>
						<h1 class = "h3 opacity-bg text-white text-center py-3 mb-3"><?php echo $title; ?></h1>
					</div><!-- .col-sm-12 -->
				</div><!-- .row -->
			</div><!-- .title container -->
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="form-wrapper mb-5">
							<div class = "mb-3"><?php echo $form['intro_text']; ?></div>
							<?php echo do_shortcode('[ninja_form id=3]'); ?>
						</div><!-- .form-wrapper -->
						
					</div><!-- .col-sm-12 -->
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- #advertise -->
	</main><!-- #main -->
</div><!-- #content -->

<?php get_footer(); ?>