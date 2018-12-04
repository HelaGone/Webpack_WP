<?php get_header(); ?>

<section id="single_section">
	<h2>This is single template</h2>
</section>

<?php
	if(have_posts()):
		while(have_posts()):
			the_post(); ?>
			<h2>
				<?php the_title(); ?>
			</h2>
<?php
		endwhile;
	endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>