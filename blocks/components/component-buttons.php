<?php if ( get_field( 'enable_buttons' ) == 1 ) : ?>
	<div class="buttons <?php the_field( 'button_alignment' ); ?>">
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
	