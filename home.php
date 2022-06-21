<?php get_header(); ?>

	<section class="home_section">
		<div class="inner_wrapper">
			<h1 class="main_heading">Home Main Section</h1>
			<div class="posts_pool">
				<?php 
					if(have_posts()):
						while(have_posts()):
							the_post(); ?>
							<figure class="generic_fig">
								<div class="image_frame">
									<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr($post->post_title); ?>">
										<?php echo has_post_thumbnail() ? the_post_thumbnail() : '<img src="https://unsplash.it/220/124/" width="220" height="124" alt="default_thumb">'; ?>
									</a>
								</div>
								<figcaption class="generic_figcaption">
									<h2 class="generic_fig_heading">
										<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr($post->post_title); ?>">
											<?php the_title(); ?>
										</a>
									</h2>
								</figcaption>
							</figure>
				<?php 
						endwhile;
					endif; ?>
			</div>
		</div>
	</section>
	
<?php // get_template_part('templates/barra', 'a'); ?>


<?php get_sidebar(); ?>

<?php get_footer(); ?>