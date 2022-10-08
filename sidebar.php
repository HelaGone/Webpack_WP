<?php 
	$pArgs = array(
		"post_type"=>"post",
		"posts_per_page" => 4,
		"post_status"=>"publish",
		"orderby"=>"date",
		"order"=>"DESC",
		"post__not_in"=>[$args['not_in']],
		"tax_query"=>array(
			"taxonomy"=>"category",
			"field"=>"slug",
			"terms" => array($args['term'])
		));
	$related = new WP_Query($pArgs);
?>
<aside class="sidebar">
	<h2 class="sidebar_heading">Recomendado para ti</h2>
	<div class="sidebar_posts_pool">
		<?php 
			if($related->have_posts()):
				while($related->have_posts()):
					$related->the_post();
					setup_postdata($post);
					$category = get_the_category();
					if(is_array($category) && !empty($category)){
						$catName = $category[0]->name;
						$catId = $category[0]->term_id;
						$catLink = get_category_link($catId);
					} ?>
					<div class="sidebar_fig">
						<span class="article_cat">
							<a href="<?php echo esc_url($catLink); ?>" title="<?php echo esc_attr($catName); ?>">
								<?php echo esc_html($catName); ?>
							</a>
						</span>
						<h3>
							<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr($post->post_title); ?>">
								<?php the_title(); ?>
							</a>
						</h3>
						<?php the_excerpt(); ?>
				</div>
		<?php 
				wp_reset_postdata();
				endwhile;
			endif; ?>
	</div>
</aside>