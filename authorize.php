<?php

include_once 'config.php';

// Assign variables from login form
$username = $_POST["username"];
$password = $_POST["password"];

// Database request
$command = $db->prepare('SELECT * FROM user WHERE user_name=:user_name and user_password=md5(:user_password)');
$command->execute(array('user_name'=>$username, 'user_password'=>$password));
$user = $command->fetch(PDO::FETCH_OBJ);

if($user!=null) {
    // If logged in
    $_SESSION['logged']=$user;
    header('location: index.php');
} else {
    // If not logged in
    header('location: public/login.php?wrong&username=' . $username);
}


?>
