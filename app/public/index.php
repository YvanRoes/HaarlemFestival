<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require __DIR__ . '/../routers/patternRouter.php';
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header("Access-Control-Allow-Headers: *");

$uri = trim($_SERVER['REQUEST_URI'], '/');

$router = new PatternRouter();
$router->route($uri);;
?>