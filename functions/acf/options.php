<?php
    //======================================================================
    // SPEED UP ACF
    //======================================================================
	add_filter('acf/settings/remove_wp_meta_box', '__return_true');

	//======================================================================
    // ADD OPTIONS PAGE
    //======================================================================
	if ( function_exists( 'acf_add_options_page' ) ) {

		acf_add_options_page( array(
			'page_title'	=> 'Site Options',
			'menu_title'	=> 'Site Options',
			'menu_slug' 	=> 'acf-site-options',
			'capability'	=> 'edit_posts',
			'redirect'		=> false,
		));
	
	}
	
	//======================================================================
    // CHANGE SAVE POINT FOR JSON FOLDER
    //======================================================================
	function acf_json_save_point( $path ) {
		// update path
		$path = get_stylesheet_directory() . '/functions/acf/json';
		
		// return
		return $path;
	}

	add_filter('acf/settings/save_json', 'acf_json_save_point');

	//======================================================================
    // CHANGE LOAD POINT FOR JSON FOLDER
    //======================================================================
	function acf_json_load_point( $paths ) {
		// remove original path (optional)
		unset($paths[0]);
		
		// append path
		$paths[] = get_stylesheet_directory() . '/functions/acf/json';
		
		// return
		return $paths;
	}

	add_filter('acf/settings/load_json', 'acf_json_load_point');

	//======================================================================
    // REGISTER ACF BLOCKS
    //======================================================================
    /**
	 * Register the ACF Block.
	 *
	 * @since    1.0.0
	 */
	function register_acf_block_types() {
		// register hero block.
		acf_register_block_type(array(
			'name'              => 'hero',
			'title'             => __('Hero'),
			'description'       => __('Layout hero block.'),
			'render_template'   => 'blocks/hero/hero-template.php',
			'category'          => 'layout',
			'mode' 				=> 'preview',
			'supports' 			=> array( 
				'align' => false,
				'mode' => false,
				'__experimental_jsx' => true
			),
			'icon'              => 'align-center',
			'keywords'          => array( 'layout', 'hero' ),
		));

		// register Single Card block.
		acf_register_block_type(array(
			'name'              => 'single-card',
			'title'             => __('Single Card'),
			'description'       => __('Single card block.'),
			'render_template'   => 'blocks/single-card/single-card-template.php',
			'category'          => 'layout',
			'mode' 				=> 'preview',
			'supports' 			=> array( 
				'align' => false,
				'mode' => false,
				'__experimental_jsx' => true
			),
			'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="list" class="svg-inline--fa fa-list fa-w-16" role="img" viewBox="0 0 512 512"><path fill="currentColor" d="M80 368H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16zm0-320H16A16 16 0 0 0 0 64v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16V64a16 16 0 0 0-16-16zm0 160H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16zm416 176H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-320H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16zm0 160H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z"/></svg>',
			'keywords'          => array( 'layout', 'single card' ),
		));

		// register cards set block.
		acf_register_block_type(array(
			'name'              => 'card-set',
			'title'             => __('Card Set'),
			'description'       => __('Card set block.'),
			'render_template'   => 'blocks/card-set/card-set-template.php',
			'category'          => 'layout',
			'icon'              => 'screenoptions',
			'supports' 			=> array( 
				'align' => false,
				'mode' => false,
				'__experimental_jsx' => true
			),
			'keywords'          => array( 'layout', 'cards', 'card set' ),
		));	

		// register slider block.
		acf_register_block_type(array(
			'name'              => 'slider',
			'title'             => __('Slider'),
			'description'       => __('Layout slider block.'),
			'render_template'   => 'blocks/slider/slider-template.php',
			'enqueue_script'    => get_template_directory_uri() . '/blocks/slider/slider.js',
			'category'          => 'layout',
			'supports' 			=> array( 
				'align' => false,
				'mode' => false,
			),
			'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="images" class="svg-inline--fa fa-images fa-w-18" role="img" viewBox="0 0 576 512"><path fill="currentColor" d="M480 416v16c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48V176c0-26.51 21.49-48 48-48h16v208c0 44.112 35.888 80 80 80h336zm96-80V80c0-26.51-21.49-48-48-48H144c-26.51 0-48 21.49-48 48v256c0 26.51 21.49 48 48 48h384c26.51 0 48-21.49 48-48zM256 128c0 26.51-21.49 48-48 48s-48-21.49-48-48 21.49-48 48-48 48 21.49 48 48zm-96 144l55.515-55.515c4.686-4.686 12.284-4.686 16.971 0L272 256l135.515-135.515c4.686-4.686 12.284-4.686 16.971 0L512 208v112H160v-48z"/></svg>',
			'keywords'          => array( 'layout', 'slider', 'images' ),
		));	

		// register listing block.
		acf_register_block_type(array(
			'name'              => 'listing',
			'title'             => __('Listing'),
			'description'       => __('Layout listing block.'),
			'render_template'   => 'blocks/listing/listing-template.php',
			'category'          => 'layout',
			'mode' 				=> 'preview',
			'supports' 			=> array( 
				'align' => false,
				'mode' => false,
			),
			'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="far" data-icon="list-alt" class="svg-inline--fa fa-list-alt fa-w-16" role="img" viewBox="0 0 512 512"><path fill="currentColor" d="M464 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V80c0-26.51-21.49-48-48-48zm-6 400H54a6 6 0 0 1-6-6V86a6 6 0 0 1 6-6h404a6 6 0 0 1 6 6v340a6 6 0 0 1-6 6zm-42-92v24c0 6.627-5.373 12-12 12H204c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h200c6.627 0 12 5.373 12 12zm0-96v24c0 6.627-5.373 12-12 12H204c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h200c6.627 0 12 5.373 12 12zm0-96v24c0 6.627-5.373 12-12 12H204c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h200c6.627 0 12 5.373 12 12zm-252 12c0 19.882-16.118 36-36 36s-36-16.118-36-36 16.118-36 36-36 36 16.118 36 36zm0 96c0 19.882-16.118 36-36 36s-36-16.118-36-36 16.118-36 36-36 36 16.118 36 36zm0 96c0 19.882-16.118 36-36 36s-36-16.118-36-36 16.118-36 36-36 36 16.118 36 36z"/></svg>',
			'keywords'          => array( 'layout', 'listing' ),
		));

		// register Accordion block.
		acf_register_block_type(array(
			'name'              => 'accordion',
			'title'             => __('Accordion'),
			'description'       => __('Layout Accordion block.'),
			'render_template'   => 'blocks/accordion/accordion-template.php',
			'enqueue_script'    => get_template_directory_uri() . '/blocks/accordion/accordion.js',
			'category'          => 'layout',
			'mode' 				=> 'preview',
			'supports' 			=> array( 
				'align' => false,
				'mode' => false,
				'__experimental_jsx' => true
			),
			'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="list" class="svg-inline--fa fa-list fa-w-16" role="img" viewBox="0 0 512 512"><path fill="currentColor" d="M80 368H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16zm0-320H16A16 16 0 0 0 0 64v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16V64a16 16 0 0 0-16-16zm0 160H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16zm416 176H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-320H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16zm0 160H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z"/></svg>',
			'keywords'          => array( 'layout', 'accordion', 'list' ),
		));

		

    }

    // Check if function exists and hook into setup.
    if( function_exists('acf_register_block_type') ) {
		add_action( 'acf/init', 'register_acf_block_types' );
	}
	

	function acf_load_post_type_field( $field ) {
		$args = array(
			'public' => 'true',
		);
		$post_types = get_post_types($args);



		foreach ($post_types as $key => $value) {
			if ($value !== 'attachment' && $value !== 'page') {
				$field['choices'][$key] = $value;
			}
		}

		return $field;
	}
	
	// Apply to all fields.
	add_filter('acf/load_field/name=post_type', 'acf_load_post_type_field');



	function acf_load_taxonomy_field( $field ) {
		$args = array(
			'public' => 'true',
		);
		$taxonomies = get_taxonomies($args);

		foreach ($taxonomies as $key => $value) {
			$field['choices'][$key] = $value;
		}

		return $field;
	}
	
	// Apply to all fields.
	add_filter('acf/load_field/name=taxonomy', 'acf_load_taxonomy_field');