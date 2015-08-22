<?php
namespace Bovinetracker;

class Db {
    static protected $instance = null;

    protected $connection = null;

    protected function __construct(){

        if($_SERVER['SERVER_NAME'] == 'localhost'){
            $config = \Bovinetracker\Config::get('database_test');
        } else{
            $config = \Bovinetracker\Config::get('database_prod');
        }

        $this->connection = new \PDO($config['dsn'], $config['username'], $config['password']);
    }

    public function getConnection(){
        return $this->connection;
    }

    static public function getInstance(){
        if (!(static::$instance instanceof static)) {
            static::$instance = new static();
        }

        return static::$instance->getConnection();
    }
}
?>