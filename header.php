<!DOCTYPE html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title(); ?></title>
	<link rel="shortcut icon" href="<?php echo THEMEPATH; ?>images/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, height=device-height">
	<meta name="HandheldFriendly" content="true"/>
	<meta http-equiv="cleartype" content="on"/>
	<meta name="theme-color" content="#000"/>
	<?php wp_head(); ?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Kaisei+Opti:wght@400;500;700&display=swap" rel="stylesheet">
	<script>
		WebFontConfig = {
			google:{
				families: [
					'Kaisei+Opti:400,500,700',
					'Manrope:400,500,800',
					// 'Lexend:300,400,500',
				]
			}
		};

		(function(d){
			var wf = d.createElement('script'), s = d.scripts[0];
			wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
			wf.async = true;
			s.parentNode.insertBefore(wf, s);
		})(document);
	</script>
</head>
<body <?php body_class(); ?>>
	<header id="main_site_header">
		<div id="btn_menu" class="flex-item btn_menu_container">
			<svg xmlns="http://www.w3.org/2000/svg" height="48" width="48"><path d="M6 36V33H42V36ZM6 25.5V22.5H42V25.5ZM6 15V12H42V15Z"/></svg>
		</div>
		<div id="logo" class="flex-item">
			<?php 
				if(function_exists( 'the_custom_logo' )){
				    the_custom_logo();
				} ?>
			<a href="<?php echo esc_url(home_url()); ?>"></a>
		</div>
	</header>

	<!-- Navigation -->
	<nav id="main-nav" class="main_navigation">
		<div class="logo_menu">
			<?php 
				if(function_exists( 'the_custom_logo' )){
				    the_custom_logo();
				} ?>
			<div id="btn_close_menu" class="btn_menu_container">
				<svg xmlns="http://www.w3.org/2000/svg" height="48" width="48"><path d="M12.45 37.65 10.35 35.55 21.9 24 10.35 12.45 12.45 10.35 24 21.9 35.55 10.35 37.65 12.45 26.1 24 37.65 35.55 35.55 37.65 24 26.1Z"/></svg>
			</div>
		</div>
		<?php wp_nav_menu( array( 'theme_location' => 'my-custom-menu', 'container_class' => 'custom-menu-class' ) ); ?>
	</nav>
	
	<!-- MAIN -->
	<main class="main_site_wrapper">