<?php

    include_once("config.php");
    if(isset($_POST["submit"]))
    {
        $emri = $_POST["emri"];
        $username= $_POST["username"];
        $email = $_POST["email"];

        $tempPass = $_POST["password"];
        $password = password_hash($tempPass, PASSWORD_DEFAULT);



        if(empty($emri)  ||empty($username)  ||empty($email)  ||empty($password)  ||empty($confirm_password) ){
            echo "You have to fill all the fields .";
        }else{
            $sql = "INSERT INTO users(name,username,email,password,confirm_password)  
            Values (:username,:email,:password,:confirm_password)";

            $insertSql = $conn ->prepare($sql);
            $insertSql ->bindParam(":name",$emri);
            $insertSql ->bindParam(":username",$username);
            $insertSql ->bindParam(":email",$email);
            $insertSql ->bindParam(":password",$password);


            $insertSql ->execute();

            header("Location:login.php");


        }

    }

?>