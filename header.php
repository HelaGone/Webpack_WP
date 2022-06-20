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
	<script>
		WebFontConfig = {
			google:{
				families: [
					'Roboto:300,400,500,700',
					'Roboto+Condensed',
					'Teko:300,400,500,600,700',
					'Source+Sans+Pro:300,400,600,700,900'
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
		<div id="logo" class="flex-item">
			<?php 
				if(function_exists( 'the_custom_logo' )){
				    the_custom_logo();
				} ?>
			<a href="<?php echo esc_url(home_url()); ?>"></a>
		</div>

		<div id="btn_menu" class="flex-item btn_menu_container">
			<svg xmlns="http://www.w3.org/2000/svg" height="48" width="48"><path d="M6 36V33H42V36ZM6 25.5V22.5H42V25.5ZM6 15V12H42V15Z"/></svg>
		</div>
	</header>
	<!-- <nav class="main_navigation">
		<?php //wp_nav_menu( array( 'theme_location' => 'my-custom-menu', 'container_class' => 'custom-menu-class' ) ); ?>
	</nav> -->
		
	<main class="main_site_wrapper">