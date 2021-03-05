<?php

    //======================================================================
    // ADD AN ADMIN SCRIPT TO MANAGE JS
    //======================================================================
    function admin_resources() {
        wp_register_script('admin_script', get_stylesheet_directory_uri() . '/app/assets/js/admin-scripts.min.js');
        wp_enqueue_script('admin_script');
    }
    // this was causing a console error in the admin screen because the file could not be found.
    // add_action('admin_enqueue_scripts', 'admin_resources');

    //======================================================================
    // Add responsive container to embeds
    //======================================================================
    function video_embed_wrapper($html) {
        return '<div class="video-wrapper">' . $html . '</div>';
    }

    //======================================================================
    // REPLACE EXCERPT
    //======================================================================
    // Replaces the excerpt "Read More" text with a link
    function new_excerpt_more($more) {
        global $post;
        return '...';
        // return '<a class="moretag" href="'. get_permalink($post->ID) . '"> ...read more.</a>';
    }

    //======================================================================
    // CUSTOM EXCERPT
    //======================================================================
    function custom_excerpt($limit) {
        $excerpt = explode(' ', get_the_excerpt(), $limit);
        if (count($excerpt)>=$limit) {
            array_pop($excerpt);
            $excerpt = implode(' ', $excerpt) . '...';
        } else {
            $excerpt = implode(' ', $excerpt);
        }
        $excerpt = preg_replace('`[[^]]*]`', '', $excerpt);
        return $excerpt;
    }

    function custom_excerpt_length( $length ) {
        return 20;
    }
    add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

    // =========================================================================
    // REGISTERING SIDEBAR
    // =========================================================================
    if (function_exists('register_sidebar')) {
        register_sidebar([
            'name' => 'Sidebar Widgets',
            'id'   => 'sidebar-widgets',
            'description'   => 'These are widgets for the sidebar.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>'
        ]);
    }

    // =========================================================================
    // ENABLES 100% JPEG QUALITY
    // =========================================================================
    // Wordpress will compress uploads to 90% of their original size
    function high_jpg_quality() {
        return 100;
    }

    //======================================================================
    // ADD USERSNAP TO FRONT END AND BACK END
    //======================================================================
    function mightily_add_usersnap() {
        if( is_user_logged_in()) :
        ?>
        <script type="text/javascript">
            (function() {
                var s = document.createElement("script");
                s.type = "text/javascript";
                s.async = true;
                s.src = '//api.usersnap.com/load/13b557a2-7b6b-4169-a0ad-66a9383ee272.js';
                var x = document.getElementsByTagName('script')[0];
                x.parentNode.insertBefore(s, x);
            })();
        </script>
        <?php endif;
    }


