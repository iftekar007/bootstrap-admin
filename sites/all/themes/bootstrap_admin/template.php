<?php

function bootstrap_admin_menu_tree__secondary(&$variables) {
    echo 456456;
    exit;
    return '<ul class="menu nav navbar-nav secondary">meu' . $variables['tree'] . '</ul>';
}

function bootstrap_admin_menu_tree_alter($variables) {
    echo 89;
}

function phptemplate_menu_item($link, $has_children, $menu = '', $in_active_trail = FALSE, $extra_class = NULL) {
    echo 345;
    exit;

    $class = ($menu ? 'expanded' : ($has_children ? 'collapsed' : 'leaf'));

    if (!empty($extra_class))
        $class .= ' '. $extra_class;

    if ($in_active_trail)
        $class .= ' active-trail';

    $class .= ' ' . preg_replace('/[^a-zA-Z0-9]/', '', strtolower(strip_tags($link)));

    return '<li class="'. $class .'">'. $link . $menu ."</li>\n";
}

function boostrap_admin_links__system_MENUNAME_menu($variables) {
    exit;
    $output = '';
    foreach ($variables['links'] as $link) {
        $output .= l($link['title'], $link['href'], $link);
    }
    return $output;
}