<?php include_once '../../config.php'; checkLogin(); checkRole('Admin');

if(isset($_GET['car_model_id'])) {
    $command = $db->prepare("DELETE FROM car_model WHERE car_model_id=:car_model_id;");
    $command->execute(array(':car_model_id'=>$_GET['car_model_id']));
    header('location: car_model.php');       
} else {
    header('location: car_model.php');       
}
