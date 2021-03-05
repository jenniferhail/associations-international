</main>
<footer class="footer">
    <div class="wrapper">
        <div class="social">
            <?php if( have_rows('social', 'option') ) : ?>
                <ul class="social-menu">
                    <?php while(have_rows('social', 'option')) : the_row(); ?>
                    <?php
                        $network = get_sub_field('network');
                        $link = get_sub_field('link');
                        if ($link) {
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'];
                            if ($link_target == NULL) {
                                $link_target = '_self';
                            }
                        }
                    ?>
                        <li class="menu-item">
                            <?php if ($network == 'facebook' && $link): ?>
                                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-facebook-f icon"></i></a>
                            <?php elseif ($network == 'twitter' && $link): ?>
                                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-twitter icon"></i></a>
                            <?php elseif ($network == 'instagram' && $link): ?>
                                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-instagram icon"></i></a>
                            <?php elseif ($network == 'snapchat' && $link): ?>
                                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-snapchat icon"></i></a>
                            <?php elseif ($network == 'pinterest' && $link): ?>
                                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-pinterest icon"></i></a>
                            <?php elseif ($network == 'googleplus' && $link): ?>
                                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-googleplus icon"></i></a>
                            <?php elseif ($network == 'linkedin' && $link): ?>
                                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-linkedin-in icon"></i></a>
                            <?php elseif ($network == 'youtube' && $link): ?>
                                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-youtube icon"></i></a>
                            <?php elseif ($network == 'vimeo' && $link): ?>
                                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-vimeo icon"></i></a>
                            <?php endif; ?>
                        </li>
                    <?php endwhile;?>
                </ul>
            <?php endif; ?>
        </div>

        

        <nav>
            <ul class="footer-menu">
                <?php
                    $args = array(
                        'theme_location' => 'footer-menu',
                        'menu' => 'footer-menu',
                        'container' => 'false',
                        'items_wrap' => '%3$s'
                    );
                ?>
                <?php wp_nav_menu($args); ?>
            </ul>
        </nav>

    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
