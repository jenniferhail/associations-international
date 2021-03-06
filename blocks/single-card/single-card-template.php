<?php
/**
 * Block template file: blocks/card-set/card-set-template.php
 *
 * Card Set Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'card-set-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-single-card';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<style type="text/css">
	<?php echo '#' . $id; ?> {
		/* Add styles that use ACF values here */
	}
</style>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <?php 
        $template = array(
            array( 'core/image', array(
                'placeholder' => 'Add image.',
            ) ),
            array( 'core/heading', array(
                'placeholder' => 'Add your title.',
            ) ),
            array( 'core/paragraph', array(
                'placeholder' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            ) )
        );
        $allowed_blocks = array( 'core/heading', 'core/paragraph', 'core/button' );
    ?>

    <?php echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '" templateLock="all" />'; ?>
</div>