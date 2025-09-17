<?php


$path = $_SERVER['REQUEST_URI'];
$cleanPath = preg_replace('/\?.*/', '', $path);
preg_match('#^/(\d+)/(\S+)/?$#', $cleanPath, $m);


// Vérifier d'abord si c'est une route dynamique
if (preg_match('#^/(\d+)/system-view/?$#', $cleanPath, $m)) {
    $id = (int)$m[1];
    include './templates/header.php';
    include './templates/system_view.php';
    exit;
}

$id = $m[1];

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
        case '/'.$id.'/system-view':
        include './templates/system_view.php';
        break;
    default:
        echo 'Page introuvable - 505 ';
        break;
}
