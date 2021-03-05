<!doctype html>
<?php $site_url = site_url(); ?>
<?php $template_directory = get_template_directory_uri() . '/favicon.ico'; ?>

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-P4JNQMC');</script>
<!-- End Google Tag Manager -->
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-P4JNQMC');</script>
<!-- End Google Tag Manager -->
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $template_directory; ?>/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $template_directory; ?>/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $template_directory; ?>/favicon-16x16.png">
<link rel="manifest" href="<?php echo $template_directory; ?>/site.webmanifest">
	<?php if (is_search()) { ?>
		<meta name="robots" content="noindex, nofollow">
	<?php } ?>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_head(); ?>

</head>

<body <?php body_class('front-end'); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P4JNQMC"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<?php do_action('wp_body_open'); ?>	
	<nav class="skip-nav">
		<ul class="skip-menu">
			<a href="#nav-toggle" class="menu-item">Skip to main menu</a>
			<a href="#main" class="menu-item">Skip to main content</a>
		</ul>
	</nav>

	<header class="header">
		<div class="wrapper">
			<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_self">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/img/logo.svg" alt="Associations International">
			</a>
			<button class="nav-toggle">Menu</button>
			<nav class="header-nav">
				<ul class="main-menu">
					<?php
						$args = array(
							'theme_location' => 'main-menu',
							'menu' => 'main-menu',
							'container' => 'false',
							'items_wrap' => '%3$s'
						);
					?>
					<?php wp_nav_menu($args); ?>
				</ul>
				<?php if( have_rows('social', 'option') ) : ?>
					<ul class="social-menu">
						<?php while(have_rows('social', 'option')) : the_row(); ?>
						<?php
							$network = get_sub_field('network');
							$link = get_sub_field('link');
							if ($link) {
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'];
								if ($link_target == NULL) {
									$link_target = '_self';
								}
							}
						?>
							<li class="menu-item">
								<?php if ($network == 'facebook' && $link): ?>
									<a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-facebook-f icon"></i></a>
								<?php elseif ($network == 'twitter' && $link): ?>
									<a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-twitter icon"></i></a>
								<?php elseif ($network == 'instagram' && $link): ?>
									<a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-instagram icon"></i></a>
								<?php elseif ($network == 'snapchat' && $link): ?>
									<a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-snapchat icon"></i></a>
								<?php elseif ($network == 'pinterest' && $link): ?>
									<a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-pinterest icon"></i></a>
								<?php elseif ($network == 'googleplus' && $link): ?>
									<a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-googleplus icon"></i></a>
								<?php elseif ($network == 'linkedin' && $link): ?>
									<a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-linkedin-in icon"></i></a>
								<?php elseif ($network == 'youtube' && $link): ?>
									<a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-youtube icon"></i></a>
								<?php elseif ($network == 'vimeo' && $link): ?>
									<a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-vimeo icon"></i></a>
								<?php endif; ?>
							</li>
						<?php endwhile;?>
					</ul>
				<?php endif; ?>
			</nav>
		</div>
	</header>

	<main id="main">