<?php get_header(); 
	$catID = get_option( 'default_category' );
	$catName = ($catID) ? get_the_category_by_ID($catID) : ''; ?>
	<section class="notfound_section">
		<div class="inner_wrapper">
			<h1 class="main_heading">Error 404</h1>
			<p class="notfound_message">No encontramos lo que estás buscando</p>
			<?php get_sidebar(null, array("term" => $catName, "not_in" => 0)); ?>
		</div>
	</section>
<?php get_footer(); ?>