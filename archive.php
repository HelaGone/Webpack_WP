<?php get_header(); global $wp_query; ?>
<section class="archive_section">
	<div class="inner_wrapper">
		<h1 class="main_heading"><?php echo get_the_archive_title(); ?></h1>
		<div class="posts_pool">
			<?php 
				if(have_posts()):
					while(have_posts()):
						the_post(); 
						$categories = get_the_category($post->ID);
						$cat = is_array($categories) ? $categories[0] : "Noticias";
						?>
						<figure class="generic_fig">
							<div class="generic_cat">
								<span>
									<a href="<?php echo get_category_link($cat->term_id); ?>" title="<?php echo esc_attr($cat->name); ?>">
										<?php echo esc_html($cat->name); ?>
									</a>
								</span>
							</div>
							<div class="image_frame">
								<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr($post->post_title); ?>">
									<?php echo has_post_thumbnail() ? the_post_thumbnail('generic_fig') : '<img src="'.THEMEPATH.'screenshot.png" width="420" height="236" alt="default_thumb">'; ?>
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

<?php get_footer(); ?>