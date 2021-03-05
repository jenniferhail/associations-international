<?php if ( get_field( 'enable_intro' ) == 1 ) : ?>
    <?php if ( have_rows( 'intro' ) ) : ?>
        <?php while ( have_rows( 'intro' ) ) : the_row(); ?>
            <div class="component intro <?php the_sub_field('text_align'); ?>">
                <div class="wrapper">
                    <?php if(get_sub_field('label')) : ?>
                        <p class="label"><?php the_sub_field( 'label' ); ?></p>
                    <?php endif; ?>
                    <?php if(get_sub_field('title')) : ?>
                        <h2 class="title"><?php the_sub_field( 'title' ); ?></h2>
                    <?php endif; ?>
                    <?php if(get_sub_field('subtitle')) : ?>
                        <p class="subtitle"><?php the_sub_field( 'subtitle' ); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
<?php endif; ?>
