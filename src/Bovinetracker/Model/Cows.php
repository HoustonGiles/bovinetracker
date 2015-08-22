<?php
namespace Bovinetracker\Model;

class Cows {

    public function getActiveCows($active) {

        $query = \Bovinetracker\Db::getInstance()->prepare("SELECT * FROM cows WHERE active = :active ORDER BY active DESC, type, newtag, tag");

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

            $query = \Bovinetracker\Db::getInstance()->prepare("SELECT * FROM cows ORDER BY active DESC, type, newtag, tag;");
            $query->execute();

            return $query;
        }
    }

    public function addCow($data) {
        $query = \Bovinetracker\Db::getInstance()->prepare(
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
        $query = \Bovinetracker\Db::getInstance()->prepare($sql);

        $data = [':id' => $id];
        $query->execute($data);

        return $query->fetch(\PDO::FETCH_ASSOC);
    }

    public function updateCow($data) {
        $query = \Bovinetracker\Db::getInstance()->prepare(
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
        $query = \Bovinetracker\Db::getInstance()->prepare(
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