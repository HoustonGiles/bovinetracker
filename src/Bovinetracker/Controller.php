<?php
namespace Bovinetracker;

class Controller {
    protected $config;
    protected $template;

    public function __construct()
    {
        $this->config = \Bovinetracker\Config::get('site');
        $this->template = new \Bovinetracker\Template($this->config['view_path'] . "/base.phtml");
    }


    protected function render($template, $data = array())
    {
        $this->template->render($this->config['view_path'] . "/" . $template, $data);
    }
}