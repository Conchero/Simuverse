<?php


$cleanPath = preg_replace('/\?.*/', '', $path);

print_r($cleanPath);
switch ($cleanPath) {
    case '/':
        include './templates/home.php';
        break;
    case '/system-collection':
        include './backend/Controllers/SystemController.php';
        break;
    default:
        echo 'Page introuvable - 404 ';
        break;
}
