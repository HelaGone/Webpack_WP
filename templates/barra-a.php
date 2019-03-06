<section>
	<?php 
		global $post; 
		if(have_posts()): ?>
			<section class="barra_a_section">
			<?php		
					while(have_posts()):
						the_post();
						setup_postdata($post); ?>
						<figure class="barra_a_figure">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail(); ?>
							</a>
							<figcaption class="barra_a_caption">
								<h2 class="barra_a_h2">
									<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr($post->post_title); ?>">
										<?php the_title(); ?>
									</a>
								</h2>
								<p><?php the_excerpt(); ?></p>
							</figcaption>
						</figure>
			<?php				
					endwhile; 
					wp_reset_postdata(); ?>
			</section>
	<?php		
		endif;	
		?>
</section>