<?php

include_once '../../config.php';

if(isset($_POST['carMakeName'])) {
    $command = $db->prepare("UPDATE car_make SET car_make_name=:car_make_name WHERE car_make_id=:car_make_id;");
    $command->execute(array(':car_make_name'=>$_POST['carMakeName'], ':car_make_id'=>$_POST['carMakeId']));
    
    if(isset($_FILES['file2'])) {
       move_uploaded_file($_FILES['file2']['tmp_name'], "../../img/car_make/" . $_POST['carMakeId'] . ".jpg"); 
    } 
    
    echo $_POST['carMakeId'];
    echo "<br/>";
    echo $_POST['carMakeName'];
    
    
    header('location: car_make.php');
    
} else {
    echo 'not set';
}



?>
