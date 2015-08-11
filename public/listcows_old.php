<?php
//8-9-2015, Houston Giles
//Bovine Tracker

// require '../vendor/autoload.php';
// \Bovinetracker\Config::setDirectory('../config');

$data = new \Bovinetracker\CowData();

$cows = $data->getAllCows();

$template = new \Bovinetracker\Template("../views/base.phtml");
$template->render("../views/index/listcows.phtml", ['cows' => $cows]);

?>
