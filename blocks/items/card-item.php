<?php $image = get_sub_field( 'image' ); ?>
<?php if ( $image ) : ?>
    <div class="image" style="background-image: url('<?php echo esc_url( $image['url'] ); ?>')">
        <img class="visually-hidden" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
    </div>
<?php endif; ?>
<div class="text">
    <?php $title_link = get_sub_field( 'title_link' ); ?>
    <?php if ( $title_link ) : ?>
        <h3 class="title">
            <a href="<?php echo esc_url( $title_link['url'] ); ?>" target="<?php echo esc_attr( $title_link['target'] ); ?>"><?php the_sub_field( 'title' ); ?></a>
        </h3>
    <?php else : ?>
        <h3 class="title"><?php the_sub_field( 'title' ); ?></h3>
    <?php endif; ?>
    <?php if($cards_style == 'style-4' && get_sub_field('subtitle')) : ?>
        <p><?php the_sub_field('subtitle'); ?></p>
    <?php endif; ?>
    <?php if(get_sub_field('copy') && $cards_style !== 'style-4') : ?>
        <p><?php the_sub_field( 'copy' ); ?></p>
    <?php endif; ?>
    <?php $card_button = get_sub_field('card_button'); ?>
    <?php if($cards_style == 'style-4' && $card_button) : ?>
        <div class="buttons">
            <a class="btn" href="<?php echo esc_url( $card_button['url'] ); ?>" target="<?php echo esc_attr( $card_button['target'] ); ?>"><?php echo esc_html( $card_button['title'] ); ?></a>
        </div>
    <?php endif; ?>
    
</div>