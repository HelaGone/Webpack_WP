<?php get_header(); ?>

<section id="archive_section">
	<h1 class="main_heading">Archive</h1>
</section>
<?php
	if(have_posts()):
		while(have_posts()):
			the_post(); ?>
			<figure class="card_simple">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr($post->post_title); ?>">
					<?php has_post_thumbnail() ? the_post_thumbnail() : ''; ?>
				</a>
				<figcaption class="card_simple_caption">
					<h2 class="card_simtple_heading">
						<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr($post->post_title); ?>">
							<?php the_title(); ?>
						</a>
					</h2>
				</figcaption>
			</figure>
<?php
		endwhile;
	endif; ?>

<?php get_footer(); ?>