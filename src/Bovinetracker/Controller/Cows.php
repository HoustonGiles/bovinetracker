<?php
namespace Bovinetracker\Controller;

class Cows extends \Bovinetracker\Controller {

    protected $data;

    public function __construct() {
        parent::__construct();
        $this->data = new \Bovinetracker\Model\Cows();
    }

    public function listAction() {

        $cows = $this->data->getAllCows();

        $this->render("index/listcows.phtml", ['cows' => $cows]);

    }

    public function addAction() {

        if (isset($_POST) && sizeof($_POST) > 0) {
            $this->data->addCow($_POST);
            header("Location: /");
            exit;
        }

        $this->render("index/addcow.phtml", ['cows' => $cows]);
    }

    public function editAction($options) {

        if (isset($_POST['id']) && !empty($_POST['id'])) {
            if ($this->data->updateCow($_POST)) {
                header("Location: /");
                exit;
            } else {
                echo "An update error occurred.";
                exit;
            }
        }

        if (!isset($options['id']) || empty($options['id'])) {
            echo "You did not pass in an ID.";
            exit;
        }

        $cow = $this->data->getCow($options['id']);

        if ($cow === false) {
            echo "Cow not found!";
            exit;
        }

        $this->render("index/editcow.phtml", ['cow' => $cow]);

    }

    public function deleteAction($options) {

        if (!isset($options['id']) || empty($options['id'])) {
            echo "You did not pass in an ID.";
            exit;
        }

        $cow = $this->data->getCow($options['id']);

        if ($cow === false) {
            echo "Cow not found!";
            exit;
        }

        if ($this->data->deleteCow($options['id'])) {
            header("Location: /");
            exit;
        } else {
            echo "A delete error occurred.";
        }

    }

}
?>