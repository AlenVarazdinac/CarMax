<?php 
include_once '../../config.php'; checkLogin(); checkRole('Admin');

if(isset($_GET['car_make_id'])) {
    $command = $db->prepare("DELETE FROM car_make WHERE car_make_id=:car_make_id;");
    $command->execute(array(':car_make_id'=>$_GET['car_make_id']));
    header('location: car_make.php');       
} 