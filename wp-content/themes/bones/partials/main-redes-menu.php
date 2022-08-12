<?php 
    $menu_name = 'main-redes';
    $locations = get_nav_menu_locations();
    $menu      = wp_get_nav_menu_object($locations[ $menu_name ]);
    $redes     = wp_get_nav_menu_items($menu->term_id, array('order' => 'DESC')); ?>

    <?php foreach ($redes as $menu): ?>

        <li class="c-menu-redes__item">
            <a href="<?= $menu->url; ?>">
                <svg width="28" height="28">
                    <title><?= $menu->title; ?></title>
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#<?= $menu->title; ?>" />
                </svg> 
            </a>
        </li>

    <?php endforeach; ?>