<?php

$user ="root";
$pass ="";  
$server = "localhost";
$dbname="db-robert";



    try {
        $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass );

        echo "Connected to database";
        } catch(PDOException $e) {
            echo "Error connecting to database: " . $e->getMessage();
    }
?>