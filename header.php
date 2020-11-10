<?php
/**
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- OPTIONAL GOOGLE TRACKING ID SET WITH CUSTOM FIELD -->
	<?php if( get_field('tracking_code', 'option') ): $tracking_code = get_field('tracking_code', 'option'); ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $tracking_code; ?>"></script>
	<script>
	  	window.dataLayer = window.dataLayer || [];
	  	function gtag(){dataLayer.push(arguments);}
	  	gtag('js', new Date());

		gtag('config', '<?php echo $tracking_code; ?>');
	</script>
	<?php endif; ?>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<!-- STOPS GOOGLE FROM INDEXING SITE ON STAGING -->
	<!-- NEED TO REMOVE ON PRODUCTION -->
	<meta name="robots" content="noindex">
	<!-- NEED TO REMOVE ON PRODUCTION -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav class="navbar navbar-expand-md">
			<div class="container">
				<a id = "logoLink" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url">
				<?php $logo = get_field('logo', 'options'); ?>
				<img id = "headerLogo" class = "img-fluid" src="<?php echo $logo['url']; ?>" alt="<?php echo get_bloginfo( 'name'); ?>"></a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
					<i class="fa fa-2x fa-bars" aria-hidden="true"></i>
				</button>

				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>
			</div><!-- .container -->

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->