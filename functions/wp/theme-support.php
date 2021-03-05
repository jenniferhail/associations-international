<?php
    //======================================================================
    // REMOVING SUPPORT FOR BLOCKS
    //======================================================================
    function mightily_enabled_block_types( $allowed_block_types ) {
        return array(
            'gravityforms/form',

            'acf/hero',
            'acf/accordion',
            'acf/card-set',
            'acf/single-card',
            'acf/listing',

            // 'core/media-text',
            'core/group',
            'core/spacer',
            'core/shortcode',
            'core/image',
            'core/gallery',
            'core/heading',
            'core/quote',
            'core/embed',
            'core/list',
            'core/separator',
            'core/more',
            'core/buttons',
            'core/pullquote',
            'core/table',
            'core/preformatted',
            'core/code',
            'core/html',
            'core/freeform',
            //'core/latest-posts'
            //'core/categories',
            'core/cover',
            'core/columns',
            'core/verse',
            'core/video',
            'core/audio',
            'core/block',
            'core/paragraph',

            'core-embed/twitter',
            'core-embed/youtube',
            'core-embed/facebook',
            'core-embed/instagram',
            'core-embed/wordpress',
            'core-embed/soundcloud',
            'core-embed/spotify',
            'core-embed/flickr',
            'core-embed/vimeo',
            'core-embed/animoto',
            'core-embed/cloudup',
            'core-embed/collegehumor',
            'core-embed/dailymotion',
            'core-embed/funnyordie',
            'core-embed/hulu',
            'core-embed/imgur',
            'core-embed/issuu',
            'core-embed/kickstarter',
            'core-embed/meetup-com',
            'core-embed/mixcloud',
            'core-embed/photobucket',
            'core-embed/polldaddy',
            'core-embed/reddit',
            'core-embed/reverbnation',
            'core-embed/screencast',
            'core-embed/scribd',
            'core-embed/slideshare',
            'core-embed/smugmug',
            'core-embed/speaker',
            'core-embed/ted',
            'core-embed/tumblr',
            'core-embed/videopress',
            'core-embed/wordpress-tv',

            'gravityforms/form'
        );
    }
    // Allowing all block types for now.
    // add_filter( 'allowed_block_types', 'mightily_enabled_block_types' );


    //======================================================================
    // ADDING SUBMIT BUTTON TO FACETWP
    //======================================================================
    add_action('wp_footer', 'add_facetwp_submit', 100);

    function add_facetwp_submit() {
    ?>
    <script>(function($) {
    $(document).on('facetwp-loaded', function() {
        $('.facetwp-search-wrap').each(function() {
            if ($(this).find('.facetwp-search-submit').length < 1) {
                $(this).find('.facetwp-search').after('<button onclick="FWP.reset()">Reset</button>');
                $(this).find('.facetwp-search').after('<button class="facetwp-search-submit" onclick="FWP.refresh()">Submit</button>');
            }
        });
    });
    })(jQuery);
    </script>
    <?php
    }

    //======================================================================
    // ADDING LABELS TO FACETWP
    //======================================================================
    function fwp_add_facet_labels() {
        ?>
        <script>
        (function($) {
            $(document).on('facetwp-loaded', function() {
                $('.facetwp-facet').each(function() {
                    var $facet = $(this);
                    var facet_name = $facet.attr('data-name');
                    var facet_label = FWP.settings.labels[facet_name];
        
                    if ($facet.closest('.facet-wrap').length < 1 && $facet.closest('.facetwp-flyout').length < 1) {
                        $facet.wrap('<div class="facet-wrap"></div>');
                        $facet.before('<h3 class="h6 facet-label">' + facet_label + '</h3>');
                    }
                });
            });
        })(jQuery);
        </script>
        <?php
        }
    add_action( 'wp_footer', 'fwp_add_facet_labels', 100 );

    // =========================================================================
    // ADDING SUPPORT FOR FACETWP
    // =========================================================================
    add_filter( 'facetwp_is_main_query', function( $bool, $query ) {
        return ( true === $query->get( 'facetwp' ) ) ? true : $bool;
    }, 10, 2 );

    // =========================================================================
    // ADD RSS LINKS TO HEAD SECTION
    // =========================================================================
    add_theme_support('automatic-feed-links');

    // =========================================================================
    // ENABLES FEATURED IMAGES FOR PAGES AND POSTS
    // =========================================================================
    // This enables post thumbnails for all post types,
    // if you want to enable this feature for specific post types,
    // use the array to include the type of post
    ## add_theme_support('post-thumbnails', array('post', 'page'));
    add_theme_support('post-thumbnails');

    // =========================================================================
    // TITLE TAG - RECOMMENDED
    // =========================================================================
    // Since Version 4.1, themes should use add_theme_support() in the functions.php
    // file in order to support title tag
    function theme_slug_setup() {
        add_theme_support('title-tag');
    }

    // =========================================================================
    // REGISTER MENUS
    // =========================================================================
    function mightily_register_nav_menu(){
        register_nav_menus( array(
            'main-menu' => __( 'Main Menu', 'text_domain' ),
            'footer-menu'  => __( 'Footer Menu', 'text_domain' ),
        ) );
    }
