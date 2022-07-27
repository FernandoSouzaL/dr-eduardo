<?php 
    wp_nav_menu(
        array(
            'menu' => 'Main Menu',
            'theme_location' => 'main-nav', 
            'menu_class' => 'c-menu__list',
            'container' => 'div',
            'container_class' => 'c-menu__container',
            'li_class' => 'c-menu__item',
            'before' => '', 
            'after' => '',
            'depth' => 0,
        )
    );
?>