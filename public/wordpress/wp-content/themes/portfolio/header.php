<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script src="https://use.fontawesome.com/d79f7aa0cb.js"></script>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<header class="header clear" role="banner">
				<div class="headcontainer clear">
					<!-- logo -->
					<div class="logo clear">
						<h1>
							<a class='headlink' href="<?php echo home_url(); ?>">
								<?php echo bloginfo('name'); ?>
							<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
							<!-- <img src="<?php 
							//echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" class="logo-img"> -->
							</a>
						</h1>
					</div>
					<!-- /logo -->

					<!-- menu icon -->
					<div class='clear' id='menu-icon'>
						<span><i class="fa fa-bars fa-3x" aria-hidden="true"></i></span>
					</div>
				</div>

			</header>
			<!-- /header -->

			<!-- nav -->
			<nav class="nav" id="main-nav" role="navigation">
				<?php html5blank_nav(); ?>
			</nav>
			<!-- /nav -->
