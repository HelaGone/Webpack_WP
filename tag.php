<?php get_header(); ?>

<section id="section_tag">
	<h2>This is tag tamplate</h2>
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

<?php get_footer(); ?>