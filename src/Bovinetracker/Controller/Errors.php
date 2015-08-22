<?php
namespace Bovinetracker\Controller;

class Errors extends \Bovinetracker\Controller {

    public function __construct() {
        parent::__construct();
    }

    public function indexAction($options)
    {
        header("HTTP/1.0 404 Not Found");
        $this->render("errors/index.phtml", ['message' => $options['message'] ]);
    }
}
?>