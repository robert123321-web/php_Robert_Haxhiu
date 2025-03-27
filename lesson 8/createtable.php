<?php

$host = 'localhost';
$db= "db-robert";
$user="root";
$pass="";


try{
    $pdo = new PDO("mysql:host;=$host;dbname=$db", $user, $pass);
    $sql = "CREATE TABLE users(
      id TNT(6) NOT NULL PRIMARY KEY,
      username VARCHAR(30) NOT NULL,
      password varchar(50) Not null)";

       $pdo->exec($sql);
       echo "Table created successfully";
}catch(Expetion $e){
    echo "Error: " . $e->getMessage();
}

?>