<?php


$cleanPath = preg_replace('/\?.*/', '', $path);

include './templates/header.php';

switch ($cleanPath) {
    case '/':
        include './templates/home.php';
        break;
    case '/system-creation':
        include './templates/create_system.php';
        break;
    case '/system-collection':
        include './templates/system_management.php';
        break;
    default:
        echo 'Page introuvable - 505 ';
        break;
}
