<?php

try{
   $db = new pdo('mysql:unix_socket=/cloudsql/bovinetracker:bovinetracker;dbname=bovinetracker', 'root', '');
}catch(PDOException $ex){
    die(json_encode(
        array('outcome' => false, 'message' => 'Unable to connect.')
        )
    );
}

try {
    // Show existing cattle
    foreach($db->query('SELECT * from cows') as $row) {
            echo "<div><strong>" . $row['tag'] . "</strong> " . $row['breed'] . "</div>";
     }
} catch (PDOException $ex) {
    echo "An error occurred in reading or writing to guestbook.";
}

$db = null;

?>
