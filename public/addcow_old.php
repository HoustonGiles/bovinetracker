<?php

    // require '../vendor/autoload.php';
    // \Bovinetracker\Config::setDirectory('../config');

    if (isset($_POST) && sizeof($_POST) > 0) {
        $data = new \Bovinetracker\CowData();
        $data->addCow($_POST);

        header("Location: /listcows");
        exit;
    }

    $template = new \Bovinetracker\Template("../views/base.phtml");
    $template->render("../views/index/addcow.phtml", ['cows' => $cows]);
?>