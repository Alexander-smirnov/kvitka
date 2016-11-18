<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package _tk
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/flower.ico" type="image/x-icon">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-87418987-1', 'auto');
		ga('send', 'pageview');

	</script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php do_action( 'before' ); ?>

<header id="masthead" class="site-header" role="banner">
<?php // substitute the class "container-fluid" below if you want a wider content area ?>
	<div class="container">
		<div class="row">
			<div class="site-header-inner col-sm-12">

				<?php $header_image = get_header_image();
				if ( ! empty( $header_image ) ) { ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
					</a>
				<?php } // end if ( ! empty( $header_image ) ) ?>
				<div class="row">
					<div class="col-md-2 col-xs-8">
					<?php $header_image = get_field('logo', 'option');
					if ($header_image) { ?>
						<a href="<?php echo get_home_url(); ?>"><img src="<?php the_field('logo', 'option') ?>" class="logo" alt="Logo"></a>
					<?php } else { ?>
					<h1 class="site-title"><a href="<?php echo get_home_url(); ?>"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a></h1>
					<?php }?>
					</div>
					<div class="col-md-8 col-xs-12">
						<nav class="site-navigation">
							<?php // substitute the class "container-fluid" below if you want a wider content area ?>
								<div class="site-navigation-inner">
									<div class="navbar navbar-default">
										<div class="navbar-header">
											<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
												<span class="sr-only"><?php _e('Toggle navigation','_tk') ?> </span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
											</button>

											<!-- Your site title as branding in the menu -->
										</div>

										<!-- The WordPress Menu goes here -->
										<?php wp_nav_menu(
											array(
												'theme_location' 	=> 'primary',
												'depth'             => 2,
												'container'         => 'div',
												'container_id'      => 'navbar-collapse',
												'container_class'   => 'collapse navbar-collapse',
												'menu_class' 		=> 'nav navbar-nav',
												'fallback_cb' 		=> 'wp_bootstrap_navwalker::fallback',
												'menu_id'			=> 'main-menu',
												'walker' 			=> new wp_bootstrap_navwalker()
											)
										); ?>

									</div><!-- .navbar -->
								</div>
						</nav><!-- .site-navigation -->
					</div>
					<div class="col-md-2 col-xs-12">
						<?php
							if ( get_field('phones', 'option') ) { ?>
								<ul class="phones">
									 <?php
									 $all_phones = get_field('phones', 'option');
									 foreach ( $all_phones as $phone ) {
										 $vowels = array('(', ')', ' ', '-');
										 $formated_phone = str_replace($vowels, '', $phone["phone_number"]);
										 ?>
										 <li class="phone">
											 <i class="fa fa-phone" aria-hidden="true"></i>
											 <a href="tel:<?php echo $formated_phone ?>"><?php echo $phone["phone_number"]?></a>
										 </li>
									 <?php } ?>
								</ul>
							<?php }
						?>
					</div>
				</div>

			</div>
		</div>
	</div><!-- .container -->
</header><!-- #masthead -->



<div class="main-content">
<?php // substitute the class "container-fluid" below if you want a wider content area ?>


	<!-- Yandex.Metrika counter -->
	<script type="text/javascript">
		(function (d, w, c) {
			(w[c] = w[c] || []).push(function() {
				try {
					w.yaCounter40966334 = new Ya.Metrika({
						id:40966334,
						clickmap:true,
						trackLinks:true,
						accurateTrackBounce:true
					});
				} catch(e) { }
			});

			var n = d.getElementsByTagName("script")[0],
				s = d.createElement("script"),
				f = function () { n.parentNode.insertBefore(s, n); };
			s.type = "text/javascript";
			s.async = true;
			s.src = "https://mc.yandex.ru/metrika/watch.js";

			if (w.opera == "[object Opera]") {
				d.addEventListener("DOMContentLoaded", f, false);
			} else { f(); }
		})(document, window, "yandex_metrika_callbacks");
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/40966334" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->