<?php
namespace Bovinetracker;

class CowData {
    protected $connection;

    public function __construct() {

        $this->connect();
    }

    public function connect() {

        // $dsn = 'mysql:unix_socket=/cloudsql/bovinetracker:bovinetracker;dbname=bovinetracker';
        // $user = 'root';
        // $password = '';
        // $this->connection = new \PDO($dsn, $user, $password);

        $config = \Bovinetracker\Config::get('database');

        $this->connection = new \PDO("mysql:host=" .$config['hostname']. ";dbname=" .$config['dbname'], $config['username'], $config['password']);
    }

    public function getActiveCows($active) {

        $query = $this->connection->prepare("SELECT * FROM cows WHERE active = :active ORDER BY active DESC, type, newtag, tag");

        $data = [':active' => $active];
        $query->execute($data);

        return $query;
    }

    public function getAllCows() {

        if (isset($_POST['active']) && !empty($_POST['active'])) {

            return $this->getActiveCows("Yes");

        } elseif (isset($_POST['notactive']) && !empty($_POST['notactive'])) {

            return $this->getActiveCows("No");

        } else {

            $query = $this->connection->prepare("SELECT * FROM cows ORDER BY active DESC, type, newtag, tag;");
            $query->execute();

            return $query;
        }
    }

    public function addCow($data) {
        $query = $this->connection->prepare(
            "INSERT INTO cows (
                tag,
                description
            ) VALUES (
                :tag,
                :description
            )"
        );

        $data = [
            ':tag' => $data['tag'],
            ':description' => $data['description']
        ];

        $query->execute($data);
    }

    public function getCow($id) {
        $sql = "SELECT * FROM cows WHERE id = :id LIMIT 1";
        $query = $this->connection->prepare($sql);

        $data = [':id' => $id];
        $query->execute($data);

        return $query->fetch(\PDO::FETCH_ASSOC);
    }

    public function updateCow($data) {
        $query = $this->connection->prepare(
            "UPDATE cows 
                SET 
                    tag = :tag, 
                    description = :description
                WHERE
                    id = :id"
        );

        $data = [
            ':id' => $data['id'],
            ':tag' => $data['tag'],
            ':description' => $data['description']
        ];

        return $query->execute($data);
    }

    public function deleteCow($id) {
        $query = $this->connection->prepare(
            "DELETE FROM cows
                WHERE
                    id = :id"
        );

        $data = [
            ':id' => $id,
        ];

        return $query->execute($data);
    }
}

?>