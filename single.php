<?php get_header(); ?>

<?php
	if(have_posts()):
		while(have_posts()):
			the_post(); 
			$category = get_categories()[0];
			$catName = $category->name;
			$catId = $category->term_id;
			$catLink = get_category_link($catId);
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
					<ul class="article_tag_list">
						<?php echo bt_print_the_terms($post->ID, 'post_tag'); ?>
					</ul>
				</div>
			</article>
			<section class="social_networks">
				<ul>
					<li class="social_icon">
						<a href="https://facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" rel="noopener nofollow" title="Share on Facebook">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
						</a>
					</li>
					<li class="social_icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
					</li>
					<li class="social_icon">
						<a href="https://twitter.com/intent/tweet?original_referer=<?php echo get_bloginfo('url'); ?>
							&amp;text=<?php echo esc_attr($post->post_title); ?>
							&amp;url=<?php the_permalink(); ?>" title="Share on Twitter" target="_blank" rel="noopener nofollow">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
						</a>
					</li>
					<li class="social_icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
					</li>
				</ul>
			</section>
<?php
		get_sidebar(null, array("term" => $catName, "not_in" => $post->ID));
		endwhile;
	endif; ?>

<?php get_footer(); ?>