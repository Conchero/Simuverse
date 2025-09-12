
<?php

$path = $_SERVER['REQUEST_URI'];

$cleanPath = preg_replace('/\?.*/', '', $path);


switch ($cleanPath) {
    case '/':
        include './templates/home.php';
        break;
    default:
        echo 'Page introuvable - 404 ';
        break;
}
