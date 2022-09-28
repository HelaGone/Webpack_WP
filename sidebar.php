<?php 
	debug($args);
	$args = array(
		"post_type"=>"post",
		"posts_per_page" => 4,
		"post_status"=>"publish",
		"orderby"=>"date",
		"order"=>"DESC",
		"tax_query"=>array(
			"taxonomy"=>"category",
			"field"=>"slug",
			"terms" => array($args['term'])
		));
	$related = new WP_Query($args);
?>
<aside class="sidebar">
	<h2 class="sidebar_heading">Recomendado para ti</h2>
	<div class="sidebar_posts_pool">
		<?php 
			if($related->have_posts()):
				while($related->have_posts()):
					$related->the_post();
					setup_postdata($post);
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
				wp_reset_postdata();
				endwhile;
			endif; ?>
	</div>
</aside>