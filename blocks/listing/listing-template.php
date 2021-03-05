<?php 
    // Category Settings
    $post_type = get_field('post_type');
    $enable_filter = get_field('enable_filter');
    $cat = '';
    $post__in = '';
    $meta_key = '';
    $meta_value = '';
    $post_type = get_field('post_type');
    $orderby = get_field('orderby');
    if($post_type == 'post' && $enable_filter) {
        $cat = get_field('category_filter');
    } 
    if($post_type == 'custom') {
        $post__in = get_field('custom');
        $orderby = 'post__in';
        $post_type = array('post', 'people');
    }
    if($post_type == 'people') {
        $info = get_field('info');
        $meta_key = 'info_last_name';
        $meta_value = $info['last_name'];
        $post__in = '';
        $orderby = 'meta_value';
    }


    // FacetWP Settings
    $facetwp = false;
    $front_end_filter = get_field('enable_front_end_filter');
    if($front_end_filter) {
        $facetwp = true;
    }


    // Query
    $args = array(
        'post_type'         => $post_type,
        'posts_per_page'    => get_field('posts_per_page'),
        'order'             => get_field('order'),
        'orderby'           => $orderby,
        'facetwp'           => $facetwp,
        'cat'               => $cat,
        'post__in'          => $post__in,
        'meta_key'          => $meta_key,
        'meta_value'        => $meta_value,
    );

    $the_query = new WP_Query( $args );
    // var_dump($the_query->query_vars);
?>

<section id="block-<?php echo $block['id']; ?>" class="layout listing card-set grid">
    <?php // include(locate_template('blocks/components/component-intro.php')); ?> 
        <?php if($front_end_filter) : ?>
            <div class="facet-filter">
                <?php if($cat == '') : ?>
                    <?php echo facetwp_display( 'facet', 'filter_by_post_category' ); ?>
                <?php endif; ?>
                <?php if($cat == 10) : ?>
                    <?php echo facetwp_display( 'facet', 'filter_by_case_study_category' ); ?>
                <?php endif; ?>
            </div>
        <?php endif;?>
        <div class="deck-of-cards">
            <?php if ( $the_query->have_posts() ) : ?>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="block-single-card <?php echo get_post_type(); ?>">
                        <?php include(locate_template('blocks/items/list-item.php')); ?> 
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            
            <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
        </div>
        <?php if(get_field('enable_pagination')) : ?>
            <div class="pagination">
                <?php echo facetwp_display( 'pager' ); ?>
            </div>
        <?php endif; ?>
        <?php // include(locate_template('blocks/components/component-buttons.php')); ?> 
</section>