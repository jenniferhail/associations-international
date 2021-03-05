<?php
/**
 * Block template file: blocks/basic-content/basic_content-template.php
 *
 * Basic Content Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'basic-content-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'layout basic-content';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}

include(locate_template('blocks/global-settings.php'));

?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>" style="<?php echo rtrim($global_style_settings); ?>">
    <div class="wrapper">
        <div class="row">
            <div class="col">
                <div class="content">
                    <?php the_field( 'content' ); ?>
                </div>
                <?php include(locate_template('blocks/components/component-buttons.php')); ?>
            </div>
        </div>
    </div>
</section>