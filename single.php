<?php get_header(); ?>

<?php
	if(have_posts()):
		while(have_posts()):
			the_post(); 
			$category = get_categories()[0];
			$catName = $category->name;
			$catLink = get_category_link($category->term_id);
			// debug($post);
			$author = get_the_author_meta("user_nicename");
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
				<h2 class="subheading">Este es un subheading de la nota o mejor conocido como bajada</h2>
				<p class="article_author"><?php echo $author; ?></p>
				<figure class="article_figure">
					<div class="image_frame">
						<?php has_post_thumbnail() ? the_post_thumbnail("medium") : ""; ?>
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
				</div>
			</article>
<?php
		endwhile;
	endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>