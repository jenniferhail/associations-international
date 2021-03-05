<?php
/**
 * Block template file: blocks/gallery/gallery-template.php
 *
 * Gallery Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'gallery-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'layout gallery logos';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}

include(locate_template('blocks/global-settings.php'));
?>
<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>" style="<?php echo rtrim($global_style_settings); ?>">
    <?php // include(locate_template('blocks/components/component-intro.php')); ?> 
	<div class="wrapper">
        <?php $images_images = get_field( 'images' ); ?>
        <?php if ( $images_images ) :  ?>
            <div class="items">
                <?php foreach ( $images_images as $images_image ): ?>
                    <div class="item">
                        <a href="#lightbox">
                            <img src="<?php echo esc_url( $images_image['sizes']['thumbnail'] ); ?>" alt="<?php echo esc_attr( $images_image['alt'] ); ?>" />
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php // include(locate_template('blocks/components/component-buttons.php')); ?> 
    </div>
</section>