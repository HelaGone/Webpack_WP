<!DOCTYPE html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title(); ?></title>
	<link rel="shortcut icon" href="<?php echo THEMEPATH; ?>images/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1, minimum-scale=1, height=device-height">
	<meta name="HandheldFriendly" content="true"/>
	<meta http-equiv="cleartype" content="on"/>
	<meta name="theme-color" content="#000"/>
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
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
		<div id="btn_menu" class="btn_menu_container">
			<div class="bar1"></div>
			<div class="bar2"></div>
			<div class="bar3"></div>
		</div>
		<div id="logo">
			<a href="<?php echo esc_url(home_url()); ?>"></a>
		</div>
		<div class="social_network">
			<ul>
				<li>
					<a href="">
						<div id="facebook" class="social_logos"></div>
					</a>
				</li>
				<li>
					<a href="">
						<div id="twitter" class="social_logos"></div>
					</a>
				</li>
				<li>
					<a href="">
						<div id="youtube" class="social_logos"></div>
					</a>
				</li>
				<li>
					<a href="">
						<div id="instagram" class="social_logos"></div>
					</a>
				</li>
			</ul>
		</div>
	</header>
	<!-- <nav class="main_navigation">
		<?php //wp_nav_menu( array( 'theme_location' => 'my-custom-menu', 'container_class' => 'custom-menu-class' ) ); ?>
	</nav> -->
		
			
