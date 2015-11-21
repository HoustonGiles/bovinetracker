<?php
//8-9-2015, Houston Giles
//Bovine Tracker

require '../vendor/autoload.php';
print_r(get_declared_classes());
exit();
\Bovinetracker\Config::setDirectory('../config');

$route = null;
if (isset($_SERVER['REQUEST_URI'])) {
    $route = $_SERVER['REQUEST_URI'];
}

//Include the following to see what server variables are available.
// include 'indices.php';
// exit;

$router = new \Bovinetracker\Router();
$router->start($route);

?>
