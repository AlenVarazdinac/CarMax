<?php

include_once '../../config.php';

if(isset($_POST['carMakeName'])) {
    $command = $db->prepare("INSERT INTO car_make (car_make_name) VALUES (:car_make_name)");
    $command->execute(array(':car_make_name'=>$_POST['carMakeName']));
    
    // Get last id
    $lastId = $db->lastInsertId();
    
    if(isset($_FILES['file2'])) {
        move_uploaded_file($_FILES['file2']['tmp_name'], "../../img/car_make/" . $lastId . ".jpg");
    }
    
    header('location: car_make.php');
    
}



?>
