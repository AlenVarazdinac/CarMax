<?php 
include_once '../../config.php';

if(isset($_GET['car_model_id'])) {
    $command = $db->prepare("DELETE FROM car_model WHERE car_model_id=:car_model_id;");
    $command->execute(array(':car_model_id'=>$_GET['car_model_id']));
    header('location: car_model.php');       
} 

# To do
/* When deleted car make delete it's image,
   Disable remove button if it isn't possible to delete that car make
*/