<?php
    // =========================================================================
    // REGISTER & ENQUEUE
    // =========================================================================
    function mightyResources() {
        wp_enqueue_style('typekit', '//use.typekit.net/cou3nyl.css'); 
        $bundleCss = get_stylesheet_directory() . '/dist/assets/css/style.min.css';
        wp_enqueue_style('mightily-styles', get_stylesheet_directory_uri() . '/dist/assets/css/style.min.css', '', $bundleCss);

        // we have deprecated using jquery in this manner, it is now compile with our JS
        // wp_deregister_script('jquery');
        // wp_register_script('jquery', ('//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'), '', '2.2.4', true);
        // wp_enqueue_script('jquery');

        wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/15caa5e93e.js');
        
        $bundleJs = get_stylesheet_directory() . '/dist/assets/js/bundle.js';
        wp_enqueue_script('mightily-scripts', get_stylesheet_directory_uri() . '/dist/assets/js/bundle.js', ['jquery'], filemtime($bundleJs) , true);

    }

    // =========================================================================
    // ENQUEUE ADMIN STYLES
    // =========================================================================
    function admin_style() {
        wp_enqueue_style('admin-styles', get_template_directory_uri() . '/dist/assets/css/admin.min.css');
        wp_enqueue_style('typekit', '//use.typekit.net/cou3nyl.css');
        wp_enqueue_script('slick', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js');

    }
    add_action('enqueue_block_editor_assets', 'admin_style');

    // =========================================================================
    // REGISTERS SUPPORT FOR VARIOUS WP FEATURES.
    // =========================================================================
    function theme_setup() {
        // Add support for editor styles.
        add_theme_support( 'editor-styles' );

        // Enqueue editor styles.
	    add_editor_style('/dist/assets/css/style.min.css');
    }
    add_action( 'after_setup_theme', 'theme_setup' );

    //======================================================================
    // META TAGS
    //======================================================================
    // Adding meta so that we can load it in non Wordpress pages i.e. Netforum
    function add_meta_tags() {
        echo '<meta name="viewport" content="width=device-width,initial-scale=1" />' . "\n";
    }
