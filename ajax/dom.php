<?php
$date = new DateTime();

$expo_timestamp = $date->getTimestamp();
$expo_title = $_POST['title'];
$expo_active = $_POST['active'];

 //CHECK IF CONNECTED
 try {
    $pdo = new PDO('mysql:host=localhost;dbname=theacad', 'db-admindt', 'Hukimod-3344'); // ONLINE
    // $pdo = new PDO('mysql:host=localhost;dbname=theacad', 'root', ''); // LOCAL
} catch (PDOException $e) {
    exit('Database error.');
}


//REFACTOR NAME TO AVOID PROBLEMS WITH SPACES
$expo_title_formated = str_replace(' ', '_', $expo_title);


//SEND DATA TO DATABASE
$query = $pdo->prepare('INSERT INTO expos (expo_title, expo_active, expo_timestamp) VALUES ("' . $expo_title_formated . '", ' . $expo_active . ',' . $expo_timestamp . ')');
$query->execute();
?>
