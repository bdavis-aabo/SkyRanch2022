<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php //seo plugin grabs page title ?>

  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="shortcut icon" href="<?php bloginfo('template_directory') ?>/assets/images/favicon.png" type="image/x-icon" />

  <?php /* Load CSS in functions.php */ ?>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <?php wp_head() ?>
</head>
<body <?php body_class(); ?>>

	<header class="header">
		<div class="header-identity">
			<a href="<?php bloginfo('url') ?>" title="<?php bloginfo('name') ?>" class="header-logo">
				<?php echo file_get_contents(get_template_directory_uri() . '/assets/images/skyranch-logo_gray.svg') ?>
			</a>
		</div>
		<div class="header-right">
			<nav class="navigation" role="navigation">
				<?php
					wp_nav_menu(array(
						'menu'						=>	'main-menu',
						'depth'						=>	1,
						'container'				=>	'div',
						'container_class'	=>	'',
						'container_id'		=>	'main-menu-navbar',
						'menu_class'			=>	'main-menu'
					));
				?>
				<button class="ltblue-btn btn contactBtn" data-target="contactBox">Contact</button>
			</nav>
		</div>
	</header>
