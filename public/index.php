<?php
//8-9-2015, Houston Giles
//Bovine Tracker

require '../vendor/autoload.php';
\Bovinetracker\Config::setDirectory('../config');

$route = null;
if (isset($_SERVER['PATH_INFO'])) {
    $route = $_SERVER['PATH_INFO'];
}

$router = new \Bovinetracker\Router();
$router->start($route);

?>
