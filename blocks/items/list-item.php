<?php

	// people
	if(get_post_type() == 'people') {
		$info = get_field('info', get_the_ID());
		$image_url = 'https://via.placeholder.com/380x360.png';
		$image_alt = 'placeholder image';
		if (get_field('image', get_the_ID())) {
			$image = get_field('image', get_the_ID());
			$image_url = $image['url'];
			$image_alt = $image['alt'];
		}
		$creds = '';
		if($info['credentials']) {
			$creds = ', ' . $info['credentials'];
		}
	}
	
	// posts
	if(get_post_type() == 'post') {
		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
		// if(!$featured_img_url) {
		// 	$featured_img_url = 'https://via.placeholder.com/250';
		// }
		$author = '';
		$internal_author = get_field('internal_author', get_the_ID());
		if($internal_author) {
			foreach($internal_author as $value) {
				$author = $value->post_title;
			}
		} else {
			$author = get_field('external_author', get_the_ID());
		}
		$categories = '';
		$counter = 0;
		$the_categories = get_the_category();
		if($the_categories) {
			foreach($the_categories as $category) {
				if($counter == count($the_categories) - 1) {
					$categories .= $category->name;
				} else {
					$categories .= $category->name . ', ';
				}
				$counter ++;
			}
		}
	}
	
	
?>
<!-- Posts -->
<?php if(get_post_type() == 'post') : ?>
	<?php if ($featured_img_url) : ?>
		<figure class="wp-block-image">	
			<img src="<?php echo $featured_img_url; ?>" alt="<?php echo get_post_meta(get_the_id(), '_wp_attachment_image_alt', true); ?>">
		</figure>
	<?php endif; ?>
	<div class="text">
		<?php if($the_categories) : ?>
			<p class="category"><?php echo $categories; ?></p>
		<?php endif; ?>
		<?php if($author !== '') : ?>
			<p class="author"><?php echo $author; ?></p>
		<?php endif; ?>
		<h3 class="title">
			<a class="link" href="<?php the_permalink(); ?>" target="_self"><?php the_title(); ?></a>
		</h3>
		<p class="excerpt"><?php echo wp_trim_words(get_the_excerpt(), $num_words = 20, $more = null); ?></p>
	</div>
<?php endif; ?>

<!-- People -->
<?php if(get_post_type() == 'people') : ?>
	<figure class="wp-block-image">	
		<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
	</figure>
	<div class="text">
		<h3 class="title">
			<a class="link" href="<?php the_permalink(); ?>" target="_self"><?php the_title(); ?><?php echo $creds; ?></a>
		</h3>
		<p class="excerpt"><?php echo $info['position']; ?></p>
	</div>
<?php endif; ?>