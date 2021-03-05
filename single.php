<?php 
    get_header(); 

    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
    // if(!$featured_img_url) {
    //     $featured_img_url = 'https://via.placeholder.com/600';
	// }
    $terms = get_the_terms(get_the_ID(), 'category');
    $term_array = array();
    $term_list = '';
    if($terms) {
        foreach($terms as $value) {
            array_push($term_array, $value->term_id);
        }
        $term_list = implode(', ', $term_array);
    }
    $author = '';
    $internal_author = get_field('internal_author', get_the_ID());
    if($internal_author) {
        foreach($internal_author as $value) {
            $author = $value->post_title;
        }
    } else {
        $author = get_field('external_author', get_the_ID());
    }
?>

<section id="single-post" class="layout single post">
    <div class="wrapper">
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
                <?php if ( $featured_img_url ) : ?>
                    <div class="image" style="background-image: url('<?php echo $featured_img_url; ?>');">
                        <img class="visually-hidden" src="<?php echo $featured_img_url; ?>" alt="<?php echo get_post_meta(get_the_id(), '_wp_attachment_image_alt', true); ?>">
                    </div>
                <?php endif; ?>
                <div class="text">
                    <p class="category">
                        <?php if($terms) : ?>
                            <?php foreach ($terms as $value) : ?>
                                <span class="cat-<?php echo $value->term_id; ?>"><?php echo $value->name; ?> </span>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </p>
                    <?php if($author !== '') : ?>
                        <p class="author"><?php echo $author; ?></p>
                    <?php endif; ?>
                    <p class="date"><?php the_date(); ?></p>
                    <h1 class="title"><?php the_title(); ?></h1>
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                    <div class="social share">
                        <span class="label">Share:</span>
                        <ul class="social-menu">
                            <li class="menu-item"><a href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><span class="visually-hide-text">Facebook</span><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                            <li class="menu-item"><a href="https://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>" target="_blank"><span class="visually-hide-text">Twitter</span><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                            <li class="menu-item"><a href="https://www.linkedin.com/shareArticle?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" target="_blank"><span class="visually-hide-text">LinkedIn</span><i class="fab fa-linkedin-in" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </article>
        <?php endwhile; endif; ?>
    </div>
</section>


<section class="layout listing card-set grid">
	<div class="wrapper">
        <div class="component intro text-align-center">
            <h2 class="title">View Related Articles.</h2>
        </div>
        <div class="deck-of-cards">

            <?php 
            $args = array(
                'post_type'         => 'post',
                'posts_per_page'    => '3',
                'cat'               => $term_list,
            );

            $the_query = new WP_Query( $args ); ?>
            <?php // var_dump($the_query->query_vars); ?>
            
            <?php if ( $the_query->have_posts() ) : ?>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <?php
                    $featured_img = get_the_post_thumbnail_url(get_the_ID(),'medium');
                    // if(!$featured_img) {
                    //     $featured_img = 'https://via.placeholder.com/300';
                    // }
                    $internal_author = get_field('internal_author', get_the_ID());
                    if($internal_author) {
                        foreach($internal_author as $value) {
                            $author = $value->post_title;
                        }
                    } else {
                        $author = get_field('external_author', get_the_ID());
                    }
                ?>
                    <div class="block-single-card post">
                        <?php if ( $featured_img_url ) : ?>
                            <figure class="wp-block-image">                            
                                <img src="<?php echo $featured_img; ?>" alt="<?php echo get_post_meta(get_the_id(), '_wp_attachment_image_alt', true); ?>">
                            </figure>
                        <?php endif; ?>
                        <div class="text">
                            <p class="category">
                                <?php $terms = get_the_terms(get_the_ID(), 'category'); ?>
                                <?php foreach ($terms as $value) : ?>
                                    <span class="cat-<?php echo $value->term_id; ?>"><?php echo $value->name; ?> </span>
                                <?php endforeach; ?>
                            </p>
                            <?php if($author !== '') : ?>
                                <p class="author"><?php echo $author; ?></p>
                            <?php endif; ?>
                            <h3 class="title">
                                <a class="link" href="<?php the_permalink(); ?>" target="_self"><?php the_title(); ?></a>
                            </h3>
                            <p class="excerpt"><?php echo wp_trim_words(get_the_excerpt(), $num_words = 20, $more = null); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            
            <?php else : ?>
                <p><?php _e( 'Sorry, no related posts.' ); ?></p>
            <?php endif; ?>

        </div>
			
        <div class="buttons align-center">
            <a href="/blog" target="_self" class="btn">Blog</a>
        </div>
	</div>
</section>
 
<?php get_footer(); ?>