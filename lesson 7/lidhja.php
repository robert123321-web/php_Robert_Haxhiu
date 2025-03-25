<?php

$host="localhost";
$user="root";
$pass="";


try{
    $conn = new PDO("mysql:host=$host",$user,$past);
    echo "Not connected";

}catch(Expetion $e){

    echo"not connected"
}    

?>