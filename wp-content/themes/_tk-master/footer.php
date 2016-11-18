<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package _tk
 */
?>
</div><!-- close .main-content  -->


<footer id="colophon" class="site-footer" role="contentinfo">
    <style>
        .site-footer:after {
            content: "";
            background-image: url('<?php the_field('footer_image'); ?>');
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'depth' => 2,
                        'container' => 'div',
                        'container_id' => 'navbar-collapse',
                        'container_class' => 'collapse navbar-collapse',
                        'menu_class' => 'nav navbar-nav',
                        'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                        'menu_id' => 'main-menu',
                        'walker' => new wp_bootstrap_navwalker()
                    )
                );
                ?>
            </div>
            <div class="col-md-2">
                <?php
                if ( get_field('phones', 'option') ) { ?>
                    <ul class="phones">
                        <?php
                        $all_phones = get_field('phones', 'option');
                        foreach ( $all_phones as $phone ) {
                            $vowels = array('(', ')', ' ', '-');
                            $formated_phone = str_replace($vowels, '', $phone["phone_number"]);
                            ?>
                            <li class="phone">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <a href="tel:<?php echo $formated_phone ?>"><?php echo $phone["phone_number"]?></a>
                            </li>
                        <?php } ?>
                    </ul>
                <?php }
                ?>
            </div>
            <div class="col-sm-12">
                <h3 class="footer-title">
                    <?php the_field('footer_title'); ?>
                </h3>
            </div>
        </div>
    </div>

</footer><!-- close #colophon -->

<?php wp_footer(); ?>

</body>
</html>
