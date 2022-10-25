<?php

// DEFINIR LOS PATHS A LOS DIRECTORIOS DE JAVASCRIPT Y CSS ///////////////////////////

	define( 'JSPATH', get_template_directory_uri() . '/js/' );
	define( 'CSSPATH', get_template_directory_uri() . '/css/' );
	define( 'THEMEPATH', get_template_directory_uri() . '/' );
	define( 'SITEURL', site_url('/') );

// FRONT END SCRIPTS AND STYLES //////////////////////////////////////////////////////

	add_action( 'wp_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script( 'plugins', JSPATH.'plugins.js', array('jquery'), null, false );
		wp_enqueue_script( 'functions', JSPATH.'functions.js', array('jquery'), null, false );

		// localize scripts
		wp_localize_script( 'functions', 'ajax_url', array('ajax_url' => admin_url('admin-ajax.php')));

		// styles
		wp_enqueue_style( 'styles', get_stylesheet_directory_uri() );

		//webpack styles
		// wp_enqueue_style('webpack_styles', get_template_directory_uri().'/dist/main.css', array(), '1.0.0');

		//Webpack scripts & styles (Selective enqueue)
		wp_register_script('base-theme-main', get_template_directory_uri().'/dist/main.js', array(), '1.0.5', true);
		wp_register_script('base-theme-home', get_template_directory_uri().'/dist/home.js', array(), '1.0.5', true);
		// wp_register_script('base-theme-category', get_template_directory_uri().'/dist/category.js', array(), '1.0.5', true);
		wp_register_script('base-theme-author', get_template_directory_uri().'/dist/author.js', array(), '1.0.5', true);
		// wp_register_script('base-theme-tag', get_template_directory_uri().'/dist/tag.js', array(), '1.0.5', true);
		wp_register_script('base-theme-archive', get_template_directory_uri().'/dist/archive.js', array(), '1.0.5', true);
		wp_register_script('base-theme-single', get_template_directory_uri().'/dist/single.js', array(), '1.0.5', true);

		if(is_front_page()||is_home()){
			wp_enqueue_style('base-theme-home-style', get_template_directory_uri().'/dist/home.css', array(), '1.0.5' );
			wp_enqueue_script('base-theme-home');
		}elseif(is_author()){
			wp_enqueue_style('base-theme-author-style', get_template_directory_uri().'/dist/author.css', array(), '1.0.5' );
			wp_enqueue_script('base-theme-author');
		}elseif(is_archive()){
			wp_enqueue_style('base-theme-archive-style', get_template_directory_uri().'/dist/archive.css', array(), '1.0.5' );
			wp_enqueue_script('base-theme-archive');
		}elseif(is_single()){
			wp_enqueue_style('base-theme-single-style', get_template_directory_uri().'/dist/single.css', array(), '1.0.5' );
			wp_enqueue_script('base-theme-single');
		}elseif(is_404()){
			wp_enqueue_style('base-theme-single-style', get_template_directory_uri().'/dist/not_found.css', array(), '1.0.5' );
		}else{
			wp_enqueue_style( 'base-theme-style', get_template_directory_uri() . '/dist/main.css', array(), '1.0.5');
			wp_enqueue_script('base-theme-main');
		}

	});

	function include_custom_jquery() {
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wp-block-library-theme' );
		wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS

		wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://code.jquery.com/jquery-3.6.1.min.js', array(), null, true);
		wp_enqueue_script('jquery');

	}

	add_action('wp_enqueue_scripts', 'include_custom_jquery');


// ADMIN SCRIPTS AND STYLES //////////////////////////////////////////////////////////

	add_action( 'admin_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script( 'admin-js', JSPATH.'admin.js', array('jquery'), '1.0', true );

		// localize scripts
		wp_localize_script( 'admin-js', 'ajax_url', array('ajax_url' => admin_url('admin-ajax.php')) );

		// styles
		wp_enqueue_style( 'admin-css', CSSPATH.'admin.css' );

	});

	/**
	 * Menu Widget
	*/
	function bt_custom_new_menu() {
	  register_nav_menu('bt-custom-menu', 'Menú principal');
	}
	add_action( 'init', 'bt_custom_new_menu' );

// CAMBIAR EL CONTENIDO DEL FOOTER EN EL DASHBOARD ///////////////////////////////////

	add_filter( 'admin_footer_text', function() {
		echo 'Creado por <a href="http://lisa.com.mx">TLJ</a>. ';
		echo 'Powered by <a href="http://www.wordpress.org">WordPress</a>';
	});

// POST THUMBNAILS SUPPORT ///////////////////////////////////////////////////////////


	function bt_setup_theme_supported_features() {
		if ( function_exists('add_theme_support') ){
			add_theme_support('post-thumbnails');
			add_theme_support( 'align-wide' );
			add_theme_support('editor-styles');
			add_theme_support( 'wp-block-styles' );
			add_theme_support( 'title-tag' );

			$defults = array(
				'height'=>64,
				'width'=>64,
				'flex-height'=>true,
				'flex-width'=>true,
				'unlink-homepage-logo'=>true
			);
			add_theme_support( 'custom-logo', $defults);
			add_editor_style( 'style-editor.css' );

	    /*add_theme_support( 'editor-color-palette', 
	    	array(
	        array(
	            'name' => __( 'strong magenta', 'themeLangDomain' ),
	            'slug' => 'strong-magenta',
	            'color' => '#a156b4',
	        ),
	        array(
	            'name' => __( 'light grayish magenta', 'themeLangDomain' ),
	            'slug' => 'light-grayish-magenta',
	            'color' => '#d0a5db',
	        ),
	        array(
	            'name' => __( 'very light gray', 'themeLangDomain' ),
	            'slug' => 'very-light-gray',
	            'color' => '#eee',
	        ),
	        array(
	            'name' => __( 'very dark gray', 'themeLangDomain' ),
	            'slug' => 'very-dark-gray',
	            'color' => '#444',
	      	)
	      )
	    );*/
		}
	}
	add_action( 'after_setup_theme', 'bt_setup_theme_supported_features' );

	/**
	 * [add_image_size] 
	 * Define custom image sizes for wordpress media images
	*/
	if ( function_exists('add_image_size') ){
		add_image_size( 'generic_fig', 420, 236, true );
		add_image_size( 'square_ad', 300, 250, true );
	}

// POST TYPES, METABOXES, TAXONOMIES AND CUSTOM PAGES ////////////////////////////////

	if(!validate_file('inc/post-types.php')){
		require_once('inc/post-types.php');
	}
	if(!validate_file('inc/metaboxes.php')){
		require_once('inc/metaboxes.php');
	}
	if(!validate_file('inc/taxonomies.php')){
		require_once('inc/taxonomies.php');
	}
	if(!validate_file('inc/pages.php')){
		require_once('inc/pages.php');
	}
	
// MODIFICAR EL MAIN QUERY ///////////////////////////////////////////////////////////

	add_action( 'pre_get_posts', function($query){
		if ( $query->is_main_query() and ! is_admin() ) {
			$query->set( 'posts_per_page', 12);
		}
		return $query;
	});

// THE EXECRPT FORMAT AND LENGTH /////////////////////////////////////////////////////

	add_filter('excerpt_length', function($length){
		return 13;
	});

	add_filter('excerpt_more', function(){
		return ' ...';
	});

// REMOVE ACCENTS AND THE LETTER Ñ FROM FILE NAMES ///////////////////////////////////

	add_filter( 'sanitize_file_name', function ($filename) {
		$filename = str_replace('ñ', 'n', $filename);
		return remove_accents($filename);
	});

// HELPER METHODS AND FUNCTIONS //////////////////////////////////////////////////////

	/**
	 * Imprime una lista separada por commas de todos los terms asociados al post id especificado
	 * los terms pertenecen a la taxonomia especificada. Default: Category
	 *
	 * @param  int     $post_id
	 * @param  string  $taxonomy
	 * @return string
	 */
	function bt_print_the_terms($post_id, $taxonomy = 'category'){
		$terms = get_the_terms( $post_id, $taxonomy );

		if ( $terms and ! is_wp_error($terms) ){
			$names = wp_list_pluck($terms ,'name');
			foreach($terms as $key => $value){
				$link = get_term_link($value->term_id);
				echo '<li><a href="'.$link.'" title="'.$value->name.'">'.$value->name.'</a></li>';
			}
		}
	}

	/**
	 * 
	 */
	function bt_theme_archive_title( $title ) {
		if ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$title = single_tag_title( '', false );
		} elseif ( is_author() ) {
			$title = '<span class="vcard">' . get_the_author() . '</span>';
		} elseif ( is_post_type_archive() ) {
			$title = post_type_archive_title( '', false );
		} elseif ( is_tax() ) {
			$title = single_term_title( '', false );
		}
		return ucfirst($title);
	}
	
	add_filter( 'get_the_archive_title', 'bt_theme_archive_title' );

	/**
	 * Regresa la url del attachment especificado
	 * @param  int     $post_id
	 * @param  string  $size
	 * @return string  url de la imagen
	 */
	function bt_attachment_image_url($post_id, $size){
		$image_id   = get_post_thumbnail_id($post_id);
		$image_data = wp_get_attachment_image_src($image_id, $size, true);
		echo isset($image_data[0]) ? $image_data[0] : '';
	}

	/*
	 *	Get attachment data
	 *	alt, caption, description, href, src, title
	 *	usage:
	 *	$attachment_meta = bt_get_attachment(your_attachment_id);
	*/
	function bt_get_attachment( $attachment_id ) {
		$attachment = get_post( $attachment_id );
		return array(
		    'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		    'caption' => $attachment->post_excerpt,
		    'description' => $attachment->post_content,
		    'href' => get_permalink( $attachment->ID ),
		    'src' => $attachment->guid,
		    'title' => $attachment->post_title
		);
	}

	// --------- CUSTOMIZATION OPTIONS --------------

 function bt_customization($wp_customize){

 	// Header & Footer Background Color.
 	$wp_customize->add_setting(
 		'theme_color',
 		array(
 			'default'           => '#ffffff',
 			'sanitize_callback' => 'sanitize_hex_color',
 			'transport'         => 'postMessage',
 		)
 	);
	 $wp_customize->add_setting(
		'category_color',
		array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);

 	$wp_customize->add_control(
 		new WP_Customize_Color_Control(
 			$wp_customize,
 			'theme_color',
 			array(
 				'label'   => 'Theme main color',
 				'section' => 'colors',
 				'settings' => 'theme_color'
 			)
 		)
 	);
	 $wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'category_color',
			array(
				'label'   => 'Category text color',
				'section' => 'colors',
				'settings' => 'category_color'
			)
		)
	);

 }
 add_action('customize_register', 'bt_customization');

	function bt_customize_css(){ 
		$themeColor = get_theme_mod('theme_color', '#000000');
		$categoryColor = get_theme_mod('category_color', '#000000');
		?>
 		<style>
			footer{background-color:<?php echo $themeColor; ?>;}
			#btn_menu svg path, 
			#btn_close_menu svg path{fill:<?php echo $themeColor; ?>;}
			.generic_cat span, .article_cat{background-color:<?php echo $themeColor; ?>;color:<?php echo $categoryColor; ?>;}
			.social_icon path, .social_icon svg{stroke:<?php echo $themeColor; ?>;}
		</style>
<?php 
	} //END FUNCTION CUSTOMIZE CSS

	/**
	 * [bt_custom_pagination]
	 * @param [Int] $numpages
	 * @param [Int] $pagerange
	 * @param [Int] $paged
	 *
	 */
	function bt_custom_pagination($numpages = '', $pagerange = '', $paged='') {
	  if (empty($pagerange)) {
	    $pagerange = 1;
	  }
	  /**
	   * This first part of our function is a fallback
	   * for custom pagination inside a regular loop that
	   * uses the global $paged and global $wp_query variables.
	   *
	   * It's good because we can now override default pagination
	   * in our theme, and use this function in default quries
	   * and custom queries.
	   */
		global $paged;

	  	if (empty($paged)) {
	    	$paged = 1;
	  	}

	  	if ($numpages == '') {
	    	global $wp_query;
	    	$numpages = $wp_query->max_num_pages;

	    	if(!$numpages) {
	        	$numpages = 1;
	    	}
	  	}
		$big = 999999999;
		$pagination_args = array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format'          => 'page/%#%',
		'total'           => $numpages,
		'current'         => $paged,
		'show_all'        => false,
		'end_size'        => 0,
		'mid_size'        => $pagerange,
		'prev_next'       => false,
		'prev_text'				=> '&lt;',
		'next_text'				=> '&gt;',
		'type'            => 'list',
		'add_args'        => false,
		'add_fragment'    => ''
		);

		$paginate_links = paginate_links($pagination_args);

		if ($paginate_links) {
			echo "<nav class='custom-pagination'>";
				echo $paginate_links;
			echo "</nav>";
		}

	}//custom pagination

	add_action('wp_head', 'bt_customize_css');

	function debug($var){
		echo '<pre style="color:tomato;">';
			print_r($var);
		echo '</pre>';
	}