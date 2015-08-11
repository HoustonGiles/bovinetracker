<?php

    // require '../vendor/autoload.php';
    // \Bovinetracker\Config::setDirectory('../config');

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

    if ($data->deleteCow($_GET['id'])) {
        header("Location: /listcows");
        exit;
    } else {
        echo "A delete error occurred.";
    }
?>