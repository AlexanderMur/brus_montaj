<!DOCTYPE html>
<html lang="ru">

<head>

	<meta charset="utf-8">

	<title>Title</title>
	<meta name="description" content="">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<meta property="og:image" content="path/to/image.jpg">
	<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="img/favicon/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png">

	<!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="#000">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#000">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#000">

	<style>body { opacity: 0; overflow-x: hidden; } html { background-color: #f4f0ef; }</style>
	<?php wp_head() ?>
</head>
<body>
	<div id="page">
		<header class="nav" id="nav" style="background-image: url('<?php echo get_template_directory_uri() . '/' ?>img/bg.jpg')">
			<a href="#my-menu" id="my-menu-button" class="hamburger hamburger--3dx" type="button">
				<span class="hamburger-box">
				<span href="#my-menu" class="hamburger-inner"></span>
				</span>
			</a>
			<div class="container ">
				<div class="row">
					<div class="col-xs-12 col-sm-4  ">
						<a href="#" class="logo"><img src="<?php echo get_template_directory_uri() . '/' ?>img/logo.png" alt=""></a>
					</div>
					<div class="col-xs-12 col-sm-8 contact-info">
						<div class="row">
							<div class="col-xs-12 col-sm-4  ml-0 mail ">
							<span id="contact_email_edit_button">
									<a href="#" class="brown">
										<i class="red fa fa-envelope"></i>
										<?php echo get_theme_mod('contact_email') ?>
									</a>
							</span>
							</div>
							<div class="col-xs-12 col-sm-4 phone">							
								<i class="red fa fa-phone"></i>
								<div><?php echo get_theme_mod('contact_phone') ?><br><?php echo get_theme_mod('contact_phone_second') ?></div>
							</div>
							<div class="col-xs-12 col-sm-4 call">
								<a href="#" class="button spu-open-622"">Заказать звонок</a>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 pl-0">
								<nav id="my-menu">
									
									<?php
									wp_nav_menu( array(
										'theme_location'  => 'menu_in_head',
										'menu'            => 'menu_in_head',
										'container'       => '',
										'container_class' => '',
										'container_id'    => '',
										'menu_class'      => 'nav-menu',
										'menu_id'         => '',
										'echo'            => true,
										'before'          => '',
										'after'           => '',
										'link_before'     => '',
										'link_after'      => '',
										'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
										'depth'           => 0,
										'walker'          => '',
									) ); 
									?>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>