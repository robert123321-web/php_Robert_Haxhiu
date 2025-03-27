<?php

$host = 'localhost';
$db= "db-robert";
$user="root";
$pass="";


try{
    $pdo = new PDO("mysql:host;=$host;dbname=$db", $user, $pass);


    $username ="robe";
    $password = "robe123";

    $sql ="INSERT INTO users (id,username,password) Values(1,'$username','$password')";

       $pdo->exec($sql);
       echo "user is added";
}catch(Expetion $e){
    echo "Error: " . $e->getMessage();
}

?>