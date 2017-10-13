<?php 
include_once '../../config.php';

if(isset($_GET['car_make_id'])) {
    $command = $db->prepare("DELETE FROM car_make WHERE car_make_id=:car_make_id;");
    $command->execute(array(':car_make_id'=>$_GET['car_make_id']));
    header('location: car_make.php');       
} 

# To do
/* When deleted car make delete it's image,
   Disable remove button if it isn't possible to delete that car make
*/