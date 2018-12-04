<?php get_header(); ?>
	<section id="category_section">
		<h2>This is category template</h2>
	</section>
<?php
	if(have_posts()):
		while(have_posts()):
			the_post(); ?>
			<h2>
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h2>
<?php
		endwhile;
	endif; ?>

<?php get_footer(); ?>