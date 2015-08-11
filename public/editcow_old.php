<?php

    // require '../vendor/autoload.php';
    // \Bovinetracker\Config::setDirectory('../config');

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $data = new \Bovinetracker\CowData();
        if ($data->update($_POST)) {
            header("Location: /index.php");
            exit;
        } else {
            echo "An update error occurred.";
            exit;
        }
    }

    if (!isset($_GET['id']) || empty($_GET['id'])) {
        echo "You did not pass in an ID.";
        exit;
    }

    $data = new \Bovinetracker\CowData();
    $cow = $data->getCow($_GET['id']);

    if ($cow === false) {
        echo "Cow not found!";
        exit;
    }

    $template = new \Bovinetracker\Template("../views/base.phtml");
    $template->render("../views/index/editcow.phtml", ['cow' => $cow]);

?>