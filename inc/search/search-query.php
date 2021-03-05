<?php
    $args = array(
        'post_type' => get_post_types(),
        'posts_per_page' => 10,
        'facetwp' => true,
    );
    $query = new WP_Query( $args );
?>

<?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>
    <article id="post-<?php the_ID(); ?>" class="<?php echo get_post_type(); ?>">
        <h2><?php the_title(); ?></h2>
        <p><?php echo wp_trim_words(get_the_excerpt(), $num_words = 20, $more = null); ?></p>
    </article>
<?php endwhile; endif; ?>