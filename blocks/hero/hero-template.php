<?php 
    $icon = '';
    $icon_img = '';
    if(get_field('enable_icon') && get_field('style') == 'style-1') {
        $icon = ' icon';
        $icon_img = '<img src="' . get_template_directory_uri() .'/dist/assets/img/icon-' . get_field('icon_color') . '.svg" class="svg" alt="">
        ';
    }

    // Hero Style 3 Headline Settings
    $desktop_size = '';
    $mobile_size = '';
    if(have_rows('headline_font_size')) {
        while(have_rows('headline_font_size')) {
            the_row();
            $desktop_size = get_sub_field( 'desktop' );
            $mobile_size = get_sub_field('mobile');
        }
    }
    $desktop_scale = '';
    $mobile_scale = '';
    if(have_rows('headline_scale')) {
        while(have_rows('headline_scale')) {
            the_row();
            $desktop_scale = get_sub_field( 'desktop' );
            $mobile_scale = get_sub_field('mobile');
        }
    }
    $headline_style = '
    <style>
        #layout-' . $block['id'] . ' h2 {
            font-size: ' . $desktop_size . 'vw;
            transform: scale(' . $desktop_scale . ');
        }
        @media only screen and (max-width: 768px) {
            #layout-' . $block['id'] . ' h2 {
                font-size: ' . $mobile_size . 'vw;
                transform: scale(' . $mobile_scale . ');
            }
        }
    </style>
    ';

    // Margin Bottom Settings
    $style_tag = '';
    if( get_field('margin_bottom') || get_field('mobile_margin_bottom') ) {
        $style_tag = '
            <style>
                #layout-' . $block['id'] .' {
                    margin-bottom: ' . get_field('margin_bottom') . 'px;
                }
                @media only screen and (max-width: 680px) {
                    #layout-' . $block['id'] .' {
                        margin-bottom: ' . get_field('mobile_margin_bottom') . 'px;
                    }
                }
            </style>';
    }

    //  Innerblock variables
    $template = array(
        array( 'core/heading', array(
            'placeholder' => 'Add your headline.',
        ) ),
        array( 'core/paragraph', array(
            'placeholder' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
        ) )
    );
    $allowed_blocks = array( 'core/heading', 'core/paragraph', 'core/buttons', 'core/list' );
 ?>

<section id="layout-<?php echo $block['id']; ?>" class="layout hero <?php the_field('style'); ?> <?php the_field('content_position'); ?>">
    <?php echo $style_tag; ?>
	<div class="wrapper">
        <?php if ( get_field('style') == 'style-3' ) : ?>
            <div class="circle front">
                <div class="red">
                    <div class="inner-circle">
                        <?php echo $headline_style; ?>
                        <h2><?php the_field('headline'); ?></h2>
                        <?php if ( get_field( 'enable_buttons' ) == 1 ) : ?>
                            <div class="buttons">
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
                </div>
            </div>
            <div class="image-wrapper">

                <?php 
                    $image_url = 'https://picsum.photos/400/600';
                    $image_alt = 'placeholder image';
                    if(get_field('image')) {
                        $image = get_field('image');
                        $image_url = $image['sizes']['large'];
                        $image_alt = $image['alt'];
                    }
                ?>

                <div class="image" style="background-image: url(<?php echo $image_url; ?>);">
                    <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" class="visually-hidden">
                </div>

                <?php
                    // Client requested that we remove the animation and use a flat image instead
                    // Animation was not support in IE 17-18
                ?>
                <?php //$animation = get_field('animation'); ?>
                <?php //echo do_shortcode($animation); ?>
            </div>
            <div class="circle back">
                <div class="blue">
                    <div class="svg-circle">
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/icon-teal.svg" class="svg" alt="">
                    </div>
                    <div class="green">
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="row">

                <div class="col<?php echo $icon; ?>">

                    <?php if (get_field('media') == 'video') : ?>
                        <div class="video">
                            <div class="embed-container">
                                <?php the_field( 'video' ); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (get_field('media') == 'image') : ?>

                        <?php 
                            $image_url = 'https://picsum.photos/400/600';
                            $image_alt = 'placeholder image';
                            if(get_field('image')) {
                                $image = get_field('image');
                                $image_url = $image['sizes']['large'];
                                $image_alt = $image['alt'];
                            }
                        ?>

                        <div class="image" style="background-image: url(<?php echo $image_url; ?>);">
                            <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" class="visually-hidden">
                        </div>

                    <?php endif; ?>

                    <?php echo $icon_img; ?>

                </div>

                <div class="col">
                    <div class="content">
                        <?php
                            echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '" templateLock="all" />';
                        ?>
                    </div>
                </div>

            </div>
        <?php endif; ?>

	</div>
</section>



