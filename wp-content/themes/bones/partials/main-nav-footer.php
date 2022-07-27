<div class="c-menu-footer">
    <?php 
        wp_nav_menu(
            array(
                'menu' => 'Footer Links',
                'theme_location' => 'footer-links', 
                'menu_class' => 'c-menu-footer__list',
                'container' => false,
                'li_class' => 'c-menu-footer__item',
                'before' => '', 
                'after' => '',
                'depth' => 0,
            )
        );
    ?>
</div>