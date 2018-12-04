<section>
	<?php 
		global $post; 
		$args = array(
			'post_type'=>'post',
			'posts_per_page'=>3,
			'post_status'=>'publish',
			'orderby'=>'date',
			'order'=>'DESC'
		);
		$posts_a = new WP_Query($args); 
		if($posts_a->have_posts()):
			while($posts_a->have_posts()):
				$posts_a->the_post();
				setup_postdata($post); ?>

				<h2>
					<a href="<?php the_permalink(); ?>">
						<?php echo esc_html($post->post_title); ?>
					</a>
				</h2>

	<?php				
			endwhile; 
			wp_reset_postdata();
		endif;	
		?>
</section>