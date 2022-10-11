<?php get_header(); ?>

<?php
	if(have_posts()):
		while(have_posts()):
			the_post(); 
			$category = get_the_category();
			if(is_array($category) && !empty($category)){
				$catName = $category[0]->name;
				$catId = $category[0]->term_id;
				$catLink = get_category_link($catId);
			}
			$author = get_the_author_meta("display_name");
			$subtitle = (get_post_meta($post->ID, 'post_subtitle', true)) ? get_post_meta($post->ID, 'post_subtitle', true) : get_the_excerpt($post->ID);
			?>
			<article id="<?php echo esc_attr("article-".$post->ID); ?>" class="single_article">
				<span class="article_cat">
					<a href="<?php echo esc_url($catLink); ?>" title="<?php echo esc_attr($catName); ?>">
						<?php echo esc_html($catName); ?>
					</a>
				</span>
				<h1 class="main_heading">
					<?php the_title(); ?>
				</h1>
				<h2 class="subheading">
					<?php echo $subtitle; ?>
				</h2>
				<p class="article_author"><?php echo $author; ?></p>
				<figure class="article_figure">
					<div class="image_frame">
						<?php has_post_thumbnail() ? the_post_thumbnail("large") : ""; ?>
					</div>
					<figcaption>
						<?php the_post_thumbnail_caption($post->ID); ?>
					</figcaption>
				</figure>
				<time datetime="<?php echo esc_attr($post->post_date); ?>" class="post_date">
					<?php echo get_the_date(); ?>
				</time>
				<div class="article_content">
					<?php the_content(); ?>
					<ul class="article_tag_list">
						<?php echo bt_print_the_terms($post->ID, 'post_tag'); ?>
					</ul>
				</div>
			</article>
<?php
		get_sidebar(null, array("term" => $catName, "not_in" => $post->ID));
		endwhile;
	endif; ?>

<?php get_footer(); ?>