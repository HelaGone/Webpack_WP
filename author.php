<?php get_header(); ?>
<section id="author_section">
	<h1 class="main_heading">This is author template</h1>
</section>
<?php
	if(have_posts()):
		while(have_posts()):
			the_post(); ?>
			<h2><?php the_title(); ?></h2>
<?php
		endwhile;
	endif; ?>
<?php get_footer(); ?>