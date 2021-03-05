<?php
/**
 * Block template file: blocks/slider/slider-template.php
 *
 * Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'slider-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'layout gallery';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
$slider_style = get_field('slider_style');

$data_slick = '
	"slidesToShow": ' . get_field('slides_to_show') . ',
	"slidesToScroll": ' . get_field('slides_to_scroll') . ',
	"arrows": true,
	"autoplay": true,
	"infinite": true,
	"responsive": [{"breakpoint": 768,"settings": {"slidesToShow": 3, "slidesToScroll": 1}}]
';
if($slider_style == 'images slider-with-nav') {
	$data_slick = '
		"slidesToShow": 1, 
		"slidesToScroll": 1, 
		"asNavFor": ".layout.slider-with-nav .items-nav", 
		"arrows": false, 
		"fade": true,
		"adaptiveHeight": true,
		"responsive": [{"breakpoint": 768,"settings": {"arrows": true}}]
	';
}

?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> <?php echo $slider_style; ?>" style="<?php echo rtrim($global_style_settings); ?>">
	<?php // include(locate_template('blocks/components/component-intro.php')); ?> 
	<div class="wrapper">
		<?php $images_images = get_field( 'images' ); ?>
		<?php if ( $images_images ) :  ?>
			<div class="items" data-id="1" data-slick='{<?php echo $data_slick; ?>}'>
				<?php foreach ( $images_images as $images_image ): ?>
					<div class="item">
						<img src="<?php echo esc_url( $images_image['sizes']['large'] ); ?>" alt="<?php echo esc_attr( $images_image['alt'] ); ?>" />
					</div>
				<?php endforeach; ?>
			</div>
			<?php if($slider_style == 'images slider-with-nav') : ?>
				<div class="items-nav" data-id="1" data-slick='{
					"slidesToShow": <?php the_field('slides_to_show'); ?>, 
					"slidesToScroll": <?php the_field('slides_to_scroll'); ?>, 
					"asNavFor": ".layout.slider-with-nav .items", 
					"arrows": <?php the_field('show_controls'); ?>, 
					"focusOnSelect": true
				}'>
					<?php foreach ( $images_images as $images_image ): ?>
						<div class="item">
							<img src="<?php echo esc_url( $images_image['sizes']['large'] ); ?>" alt="<?php echo esc_attr( $images_image['alt'] ); ?>" />
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif;?>
		<?php endif; ?>
		<?php // include(locate_template('blocks/components/component-buttons.php')); ?> 
	</div>
</section>

