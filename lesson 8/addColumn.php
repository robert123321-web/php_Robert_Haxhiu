<?php

$host = 'localhost';
$db= "db-robert";
$user="root";
$pass="";


try{
    $pdo = new PDO("mysql:host;=$host;dbname=$db", $user, $pass);
    $sql = "ALERT TABLE products ADD email Varchar(255)" ;

    
      

       $pdo->exec($sql);
       echo "Table created successfully";
}catch(Expetion $e){
    echo "Error: " . $e->getMessage();
}

?>