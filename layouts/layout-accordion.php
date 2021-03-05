<?php
	$content = get_sub_field('content');
    $view = get_sub_field('view');

    $classes = '';

    if($view == 'list') {
        $classes .= ' list-view';
    } else {
        $classes .= ' tab-view';
    }
?>
<section id="<?php echo $layout_index; ?>" class="layout accordion <?php echo $classes; ?>">
    <?php include(locate_template('layouts/component-intro.php')); ?>
	<?php if ($content): ?>
		<div class="description">
			<div class="wrapper">
				<?php echo $content; ?>
			</div>
		</div>
	<?php endif; ?>
	<div class="wrapper">
        <div class="row">
            <div class="col">
                <div class="accordion-menus">
                    <?php if (have_rows('accordion_set')) : ?>

                            <?php while (have_rows('accordion_set')) : the_row(); ?>
                                <a class="accordion-title h6 <?php if(get_row_index() == 1){echo 'active';} ?>" data-tab="<?php echo get_row_index(); ?>" href="javascript:void(0)"><?php the_sub_field('title'); ?></a>
                                <div class="accordion-menu <?php if(get_row_index() == 1){echo 'active';} ?>" data-tab="<?php echo get_row_index(); ?>">

                                    <?php while (have_rows('accordion')) : the_row(); ?>
                                        <div class="accordion-nav-item <?php if(get_row_index() == 1){echo 'active';} ?>" data-accordion="<?php echo get_row_index(); ?>">
                                            <a href="javascript:void(0)"><?php the_sub_field('title'); ?></a>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>

			<div class="col">
				<div class="accordion-groups">
					<?php if (have_rows('accordion_set')) : ?>
                            <?php while (have_rows('accordion_set')) : the_row(); ?>

                                <div class="accordion-group <?php if(get_row_index() == 1){echo 'active';} ?>" data-tab="<?php echo get_row_index(); ?>">

                                    <?php if($view == 'list'): ?>
                                        <h3 class="h4"><?php the_sub_field('title'); ?></h3>
                                    <?php endif; ?>

                                    <?php while (have_rows('accordion')) : the_row(); ?>
                                        <details class="accordion-item <?php if(get_row_index() == 1 && $view == 'tabs'){echo 'active';} ?>" <?php if(get_row_index() == 1){echo 'open';} ?> open data-accordion="<?php echo get_row_index(); ?>">
                                            <summary><?php the_sub_field('title'); ?></summary>
											<div class="accordion-content">
												<?php the_sub_field('copy'); ?>
	                                            <?php include(locate_template('layouts/component-button.php'));?>
											</div>
                                        </details>
                                    <?php endwhile; ?>
                                </div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
        </div>
    </div>
</section>
