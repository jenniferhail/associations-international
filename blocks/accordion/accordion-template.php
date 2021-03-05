<?php
/**
 * Block template file: blocks/accordion/accordion-template.php
 *
 * Accordion Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'accordion-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'layout accordion list-view';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}

?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="wrapper">
        <?php if ( have_rows( 'items' ) ) : ?>
            <div class="col accordion-groups">
				<div class="accordion-group active" data-tab="1">
                    <?php while ( have_rows( 'items' ) ) : the_row(); ?>
                        <details class="accordion-item" open="open" data-accordion="<?php echo get_row_index(); ?>">
                            <summary class="accordion-title"><?php the_sub_field( 'title' ); ?></summary>
                            <div class="accordion-content">
                                <?php the_sub_field( 'content' ); ?>
                                <?php if ( get_sub_field( 'enable_buttons' ) == 1 ) : ?>
                                    <div class="buttons <?php the_sub_field( 'button_alignment' ); ?>">
                                        <?php if ( have_rows( 'buttons' ) ) : ?>
                                            <?php while ( have_rows( 'buttons' ) ) : the_row(); ?>
                                                <?php $link = get_sub_field( 'link' ); ?>
                                                <?php if ( $link ) : ?>
                                                    <a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>" class="btn"><?php echo esc_html( $link['title'] ); ?></a>
                                                <?php endif; ?>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </details>
                    <?php endwhile; ?>
				</div>
			</div>
        <?php endif; ?>
    </div>
</section>

