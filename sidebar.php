<aside class="sidebar">
	<h2 class="sidebar_heading">Recomendado para ti</h2>
	<div class="sidebar_posts_pool">
		<?php 
			if(have_posts()):
				while(have_posts()):
					the_post();
					$category = get_categories()[0];
					$catName = $category->name;
					$catLink = get_category_link($category->term_id);
					?>
					<div class="sidebar_fig">
						<span class="article_cat">
							<a href="<?php echo esc_url($catLink); ?>" title="<?php echo esc_attr($catName); ?>">
								<?php echo esc_html($catName); ?>
							</a>
						</span>
						<h3><?php the_title(); ?></h3>
						<?php the_excerpt(); ?>
				</div>
		<?php 
				endwhile;
			endif; ?>
	</div>
</aside>