<?php
//8-9-2015, Houston Giles
//Bovine Tracker
$dsn = 'mysql:unix_socket=/cloudsql/bovinetracker:bovinetracker;dbname=bovinetracker';
$user = 'root';
$password = '';

try{
   $db = new pdo($dsn, $user, $password);
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo 'Connection failed:  ' . $e->getMessage();
    exit();
}

try {
    // Show existing cattle     
    $sql = "SELECT * FROM cows ORDER BY active DESC, type, newtag, tag;";
    $pdo = $db->prepare($sql);
    $pdo->execute();
    $cows = $pdo->fetchAll();
} catch (PDOException $e) {
    echo 'An error occurred in reading the database:  ' . $e->getMessage();
}

include('template.php')

?>
