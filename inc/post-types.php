<?php

// CUSTOM POST TYPES /////////////////////////////////////////////////////////////////

	add_action('init', function(){

		// Especiales
		$labels = array(
			'name'          => 'Especiales',
			'singular_name' => 'Especial',
			'add_new'       => 'Nuevo Especial',
			'add_new_item'  => 'Nuevo Especial',
			'edit_item'     => 'Editar Especial',
			'new_item'      => 'Nuevo Especial',
			'all_items'     => 'Todas',
			'view_item'     => 'Ver Especial',
			'search_items'  => 'Buscar Especial',
			'not_found'     => 'No se encontro',
			'menu_name'     => 'Especiales'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'		 => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'especiales' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'noticia', $args );

	});