<?php /* Template Name: Submit */ 

//Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

 get_header(); ?>

<div id="content" class = "page-wrapper" tabindex="-1">
	<main id="main" class="site-main">
		<div id="submit">
			<div class="title container pt-5">
				<div class="row">
					<div class="col-sm-12">
						<?php $formOne = get_field('video_submission_form'); ?>
						<?php if( $formOne['title'] ) { 
							$title = $formOne['title'];
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
						<div id = "formWrapperOne" class="form-wrapper mb-5">
							<div class = "mb-3"><?php echo $formOne['intro_text']; ?></div>
							<?php echo do_shortcode('[ninja_form id=1]'); ?>
						</div><!-- .form-wrapper -->
						
					</div><!-- .col-sm-12 -->
				</div><!-- .row -->
			</div><!-- .container -->

			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div id = "formWrapperTwo" class="form-wrapper mb-5">
							<?php $formTwo = get_field('interview_form'); ?>
							<div class = "mb-3"><?php echo $formTwo['intro_text']; ?></div>
							<?php echo do_shortcode('[ninja_form id=2]'); ?>
						</div><!-- .form-wrapper -->
						
					</div><!-- .col-sm-12 -->
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- #submit -->
	</main><!-- #main -->
</div><!-- #content -->

<?php get_footer(); ?>