<?php


$cleanPath = preg_replace('/\?.*/', '', $path);

print_r($cleanPath);
switch ($cleanPath) {
    case '/':
        include './backend/Controllers/SystemController.php';
        break;
        case '/system-collection':
            include './templates/home.php';
        break;
    default:
        echo 'Page introuvable - 404 ';
        break;
}
