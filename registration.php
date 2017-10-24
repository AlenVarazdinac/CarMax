<?php

include_once 'config.php';

// Assign variables from login form
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];



if ($username && $email && $password !== '') {
    // Database request
    $command = $db->prepare("INSERT INTO user (user_name, user_email, user_password) VALUES('$username', '$email', md5('$password'))");
    $command->execute();   
    
    header('location: public/register.php?registered');
} else {
    header('location: public/register.php?notset');
}  

?>
