<?php
//8-9-2015, Houston Giles
//Bovine Tracker

require '../vendor/autoload.php';
\Bovinetracker\Config::setDirectory('../config');

// if (!isset($_SERVER['PATH_INFO']) || empty($_SERVER['PATH_INFO']) || $_SERVER['PATH_INFO'] == '/') {
//     $route = 'list';
// } else {
//     $route = $_SERVER['PATH_INFO'];
// }

$route = null;
if (isset($_SERVER['PATH_INFO'])) {
    $route = $_SERVER['PATH_INFO'];
}

$router = new \Bovinetracker\Router();
$router->start($route);

?>
