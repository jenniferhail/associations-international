<?php get_header(); ?>
<?php
    $info = get_field('info');
    $image_url = 'https://via.placeholder.com/380x360.png';
    $image_alt = 'placeholder image';
    if (get_field('image')) {
        $image = get_field('image');
        $image_url = $image['url'];
        $image_alt = $image['alt'];
    }

    $creds = '';
    if($info['credentials']) {
        $creds = ', ' . $info['credentials'];
    }
?>
<section class="layout profile content-right">
	<div class="wrapper">
		<div class="row">
			<div class="col">
                <?php if ($image_url) : ?>
                    <div class="image" style="background-image: url(<?php echo $image_url; ?>)">
                        <img class="visually-hidden" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
                    </div>
                <?php endif; ?>
            </div>
            <div class="col">
                <div class="content">
                    <div class="titles">
                        <h2 class="h3 title"><?php the_title(); ?><?php echo $creds; ?></h2>
                        <p class="subtitle"><?php echo $info['position']; ?></p>
                    </div>
                    <p><a href="tel:<?php echo $info['telephone']; ?>"><?php echo $info['telephone']; ?></a></p>
                    <p><a href="mailto:<?php echo $info['email']; ?>"><?php echo $info['email']; ?></a></p>
				</div>
            </div>
		</div>
	</div>
</section>

<section id="hero-style-2-center" class="layout hero style-2 content-center" style="background-color: #F6F6F6;" data-menutitle="Hero - Style 2 - Center">
	<div class="wrapper">
		<div class="row">
			<div class="col">
				<div class="content">
					<h2 class="h2 title">Bio</h2>
					<?php the_field('bio'); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="layout listing card-set grid">
	<div class="wrapper">
        <div class="component intro text-align-center">
            <h2 class="title">Knowing your business <br>is our business.</h2>
        </div>
		<div class="row">
			<div class="col">
				<div class="deck-of-cards">

                <?php 
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => '3',
                );

                $the_query = new WP_Query( $args ); ?>
                
                <?php if ( $the_query->have_posts() ) : ?>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <?php
                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
                        // if(!$featured_img_url) {
                        //     $featured_img_url = 'https://via.placeholder.com/250';
                        // }
                    ?>
                        <div class="block-single-card post">
                            <?php if ( $featured_img_url ) : ?>
                                <figure class="wp-block-image">	
                                    <img src="<?php echo $featured_img_url; ?>" alt="<?php echo get_post_meta(get_the_id(), '_wp_attachment_image_alt', true); ?>">
                                </figure>
                            <?php endif; ?>
                            <div class="text">
                                <p class="category">
                                    <span>Category: </span>
                                    <?php $terms = get_the_terms(get_the_ID(), 'category'); ?>
                                    <?php if($terms) : ?>
                                        <?php foreach ($terms as $value) : ?>
                                            <span class="cat-<?php echo $value->term_id; ?>"><?php echo $value->name; ?> </span>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </p>
                                <p class="author">Author: <?php the_author(); ?></p>
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
			</div>
        </div>
        
        <div class="buttons align-center">
            <a href="/blog" target="_self" class="btn">Blog</a>
        </div>
	</div>
</section>
 
<?php get_footer(); ?>