<?php


$path = $_SERVER['REQUEST_URI'];
$cleanPath = preg_replace('/\?.*/', '', $path);
preg_match('#^/(\d+)/(\S+)/?$#', $cleanPath, $m);

var_dump($m);

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
        case '/'.$m[1].'/system-view':
        include './templates/system_management.php';
        break;
    default:
        echo 'Page introuvable - 505 ';
        break;
}
