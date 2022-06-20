<aside class="sidebar">
	<h2 class="sidebar_heading">This is sidebar section</h2>
	<ul>
		<?php 
			if(have_posts()):
				while(have_posts()):
					the_post();
					setup_postdata($post); ?>
					<li>
						<figure class="sidebar_fig">
							<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr($post->post_title); ?>">
								<?php echo has_post_thumbnail() ? get_the_post_thumbnail($post->ID) : '<img src="https://unsplash.it/300/250" alt="One Figure" width="300" height="250">'; ?>
							</a>
							<figcaption class="sidebar_figcaption">
								<h3 class="sidebar_caption_title"><?php the_title(); ?></h3>
							</figcaption>
						</figure>
					</li>
		<?php 
				endwhile;
			endif; ?>
	</ul>
</aside>